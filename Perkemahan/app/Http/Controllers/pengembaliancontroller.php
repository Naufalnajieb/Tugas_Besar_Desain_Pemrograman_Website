<?php

namespace App\Http\Controllers;

use App\Models\pengembalian;
use App\Models\transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pengembaliancontroller extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        
        $transactions = transaction::select(
        'transaction.id_transaction',
        'transaction.tanggal_awal',
        'transaction.tanggal_akhir',
        'transaction.total_harga',
        'transaction.status',
        'transaction.jumlah_stok',
        'transaction.snap_token',
        'transaction.id_users',
        'transaction.id_barang',
        'transaction.created_at',
        'barang.nama',
        'barang.foto',
        'barang.stok',
        'barang.harga',
        'users.name',
        'users.email',
        'users.contact'
        )
        ->join('users', 'users.id', '=', 'transaction.id_users')
        ->join('barang', 'barang.id_barang', '=', 'transaction.id_barang')
        ->where('id_users', Auth::user()->id)
        ->where('transaction.status', 'success')
        ->get();

        $pengembalian = pengembalian::all();
        
        return view('pengembalian', compact('transactions', 'pengembalian'));
    }

    public function procces(Request $request){

        $data = $request->all();

        $hargaall =  $data['total'];
        $denda = pengembalian::create([
            'denda_kerusakan' => $hargaall,
            'status' => 'pending',
            'id_transaction' => $data['id_transaction'],
            'created_at' => Carbon::now()->getTimestamp(),  // Menggunakan waktu saat ini
            'updated_at' => Carbon::now()->getTimestamp(),
        ]);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' =>  rand(8808100000, 8808999999),
                'gross_amount' => $hargaall,
            ),
            // Populate customer's info
            'customer_details' => array(
                'first_name'   => Auth::user()->name,
                'email'  => Auth::user()->email,
                'phone'  => Auth::user()->contact,
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $denda->snap_token = $snapToken;
        $denda->save();
 
        $sql = pengembalian::select(
            'pengembalian.id_transaction',
            'pengembalian.id_pengembalian',
            'pengembalian.denda_kerusakan',
            'pengembalian.status',
            'pengembalian.snap_token',
            'transaction.id_users',
            'transaction.id_barang',
            'transaction.created_at',
            'barang.nama',
            'barang.foto',
            'barang.stok',
            'barang.harga',
            'users.name',
            'users.email',
            'users.contact'
        )
        ->join('transaction', 'transaction.id_transaction', '=', 'pengembalian.id_transaction')
        ->join('users', 'users.id', '=', 'transaction.id_users')
        ->join('barang', 'barang.id_barang', '=', 'transaction.id_barang')
        ->where('pengembalian.id_pengembalian', $denda->id_pengembalian)
        ->get();

        //Ini adalah Cara Langsung buat Nembak
        //Biar Pas masuk ke si page webite yang lainnya lagi bisa langsung pakai variabel ini
        //Gak perlu harus manggil foreach atau mysql_fetch_assoc dulu 
        $sql->snap_token = $snapToken;
        $sql->id_pengembalian = $denda->id_pengembalian;


        // return response()->json($sql);
        return view('Checkout_Denda',  compact('sql'));
        // return redirect()->route('checkout-payment', $transaction->id_transaction);
    }

    public function checkout(Request $request){
        $data = $request->all();
        $sql = pengembalian::select(
            'pengembalian.id_transaction',
            'pengembalian.id_pengembalian ',
            'pengembalian.denda_kerusakan ',
            'pengembalian.status ',
            'pengembalian.snap_token ',
            'transaction.id_users',
            'transaction.id_barang',
            'transaction.created_at',
            'barang.nama',
            'barang.foto',
            'barang.stok',
            'barang.harga',
            'users.name',
            'users.email',
            'users.contact'
        )
        ->join('transaction', 'transaction.id_transaction', '=', 'pengembalian.id_transaction')
        ->join('users', 'users.id', '=', 'transaction.id_users')
        ->join('barang', 'barang.id_barang', '=', 'transaction.id_barang')
        ->where('pengembalian.snap_token', $data['snap_token'])
        ->get();

        $sql->snap_token = $data['snap_token'];
        $sql->id_transaction = $data['id_transaction'];
        // return response()->json($sql);
        return view('Checkout',  compact('sql'));
    }

    public function success(pengembalian $sql){
        
        // Mengisi data ke dalam $input
        $input = ['status' => 'success'];
        $sql->fill($input)->save();
        Session::flash('flash_message', 'Pembayaran Telah Berhasil!');
        
        // $transaction->save();
        return view('success_denda');
    }
}
