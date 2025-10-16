<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model {
    
    use HasFactory;
    
    protected $primaryKey = 'id_barang'; // Tentukan primary key yang benar
    protected $fillable = [
        'id_barang',
        'nama',
        'kategori',
        'deskripsi',
        'stok',
        'harga',
        'foto'
    ];
    
    protected $table = 'barang';
}
