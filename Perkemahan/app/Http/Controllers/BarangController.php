<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\ulasan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class BarangController extends Controller{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show_public(){
        $Barang = Barang::all();

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

        return view('welcome', compact('Barang', 'sql'));
        // $acc = rand(8808100000, 8808999999);
        // return $acc;
    }

    public function show(){
        $Barang = Barang::all();
 
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

        return view('/dashboard', compact('Barang', 'sql'));
        // $acc = rand(8808100000, 8808999999);
        // return $acc;
    }

    public function show_booking($indeks, Request $request){
        // Misalnya input dari user: 'id' => 1
        $id = $indeks;
        $Barang = Barang::where('id_barang', $id)->get();

        // $sql = Barang::select(DB::raw('*'))->where('id_barang', $id)->get();
        return view('/Booking', compact('Barang'), ['user' => $request->user(),]);
        // return response()->json($sql);
    }

    public function show_list(){
        $Barang = Barang::all();
        return view('/list_Booking', compact('Barang'));
    }
}
