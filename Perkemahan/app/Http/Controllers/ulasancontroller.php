<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\ulasan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ulasancontroller extends Controller
{
    
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
        
        return view('ulasan', compact('transactions'), ['user' => Auth::user()]);
    }

    public function stored(Request $request){

        $data = $request->all();

        $ulasan = ulasan::create([
            'deskripsi' => $data['deskripsi'],
            'id_transaction' => $data['id_transaction'],
            'created_at' => Carbon::now()->getTimestamp(),  // Menggunakan waktu saat ini
            'updated_at' => Carbon::now()->getTimestamp(),
        ]);
 
        $sql = ulasan::select(
            'ulasan.id_ulasan',
            'ulasan.deskripsi',
            'ulasan.id_transaction',
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
        ->join('transaction', 'transaction.id_transaction', '=', 'ulasan.id_transaction')
        ->join('users', 'users.id', '=', 'transaction.id_users')
        ->join('barang', 'barang.id_barang', '=', 'transaction.id_barang')
        ->where('ulasan.id_ulasan', $ulasan->id_ulasan)
        ->get();


        // return response()->json($sql);
        return view('ulasantampil',  compact('sql'));
    }

    public function show(){
 
        $sql = ulasan::select(
            'ulasan.id_ulasan',
            'ulasan.deskripsi',
            'ulasan.id_transaction',
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
        ->join('transaction', 'transaction.id_transaction', '=', 'ulasan.id_transaction')
        ->join('users', 'users.id', '=', 'transaction.id_users')
        ->join('barang', 'barang.id_barang', '=', 'transaction.id_barang')
        ->get();

        // return response()->json($sql);
        return view('ulasantampil',  compact('sql'));
    }

}
