<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class transactioncontroller extends Controller
{
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
        ->get();

        return view('Transaction', compact('transactions'));
    }

    /**
     * Display the specified resource.
     */
    public function show_public(){
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
        ->where('transaction.status', 'success')
        ->get();

        return view('RecordS', compact('transactions'));
    }

    /**
     * Display the specified resource.
     */
    public function show_10(){
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
        ->orderBy('transaction.total_harga', 'desc') // Urutkan berdasarkan total_harga secara descending
        ->limit(10) // Batasi hasil ke 10 data
        ->where('transaction.status', 'success')
        ->get();

        return view('Record10', compact('transactions'));
    }
}
