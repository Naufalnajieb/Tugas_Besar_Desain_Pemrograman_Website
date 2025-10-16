<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller{
   
    public function procces(Request $request){

        $data = $request->all();
        $hargaall =  $data['price'] * $data['quantity'];
        $transaction = transaction::create([
            'tanggal_awal' => $data['mulai'],
            'tanggal_akhir' => $data['akhir'],
            'total_harga' => $hargaall,
            'jumlah_stok' => $data['quantity'],
            'status' => 'pending',
            'id_users' => Auth::user()->id,
            'id_barang' => $data['id_barang'],
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
            'items' => array(
                array(
                    'id'       => 'item1',
                    'price'    => $data['price'],
                    'quantity' => $data['quantity'],
                    'name'     => $data['nama_barang']
                )
            )
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $transaction->snap_token = $snapToken;
        $transaction->save();

        $sql = transaction::select('*')
        ->join('users', 'users.id', '=', 'transaction.id_users')
        ->join('barang', 'barang.id_barang', '=', 'transaction.id_barang')
        ->where('transaction.id_transaction', $transaction->id_transaction)
        ->get();

        //Ini adalah Cara Langsung buat Nembak
        //Biar Pas masuk ke si page webite yang lainnya lagi bisa langsung pakai variabel ini
        //Gak perlu harus manggil foreach atau mysql_fetch_assoc dulu 
        $sql->snap_token = $snapToken;
        $sql->id_transaction = $transaction->id_transaction;


        // return response()->json($sql);
        return view('Checkout',  compact('sql'));
        // return redirect()->route('checkout-payment', $transaction->id_transaction);
    }

    public function checkout(Request $request){
        $data = $request->all();
        $sql = transaction::select('*')
        ->join('users', 'users.id', '=', 'transaction.id_users')
        ->join('barang', 'barang.id_barang', '=', 'transaction.id_barang')
        ->where('transaction.snap_token', $data['snap_token'])
        ->get();
        
        $sql->snap_token = $data['snap_token'];
        $sql->id_transaction = $data['id_transaction'];
        // return response()->json($sql);
        return view('Checkout',  compact('sql'));
    }

    public function success(transaction $sql){
        
        // Mengisi data ke dalam $input
        $input = ['status' => 'success'];
        $sql->fill($input)->save();
        Session::flash('flash_message', 'Pembayaran Telah Berhasil!');
        
        // $transaction->save();
        return view('success');
    }

    public function failed(transaction $sql){
        
        // Mengisi data ke dalam $input
        $input = ['status' => 'failed'];
        $sql->fill($input)->save();
        Session::flash('flash_message', 'Pembayaran Telah Berhasil!');
        
        // $transaction->save();
        return view('failed');
    }

}
