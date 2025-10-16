<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pengembalian'; // Tentukan primary key yang benar
    protected $fillable = [
        'id_pengembalian',
        'denda_kerusakan',
        'status',
        'snap_token',
        'id_transaction',
        'created_at',
        'updated_at'
    ];
    
    protected $table = 'pengembalian';
}

