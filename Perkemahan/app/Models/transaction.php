<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_transaction'; // Tentukan primary key yang benar

    protected $fillable = [
            'id_transaction',
            'tanggal_awal',
            'tanggal_akhir',
            'total_harga',
            'status',
            'jumlah_stok',
            'snap_token',
            'id_users',
            'id_barang',
            'created_at',
    ];

    protected $table = 'transaction';
}
