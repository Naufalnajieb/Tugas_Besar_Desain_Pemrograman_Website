<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ulasan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_ulasan'; // Tentukan primary key yang benar

    protected $fillable = [
        'id_ulasan',
        'deskripsi',
        'id_transaction',
        'created_at',
        'updated_at'
    ];
    
    protected $table = 'ulasan';
}
