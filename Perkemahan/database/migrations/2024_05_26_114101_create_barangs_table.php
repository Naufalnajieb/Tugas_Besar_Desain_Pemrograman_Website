<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->string('nama');
            $table->string('kategori');
            $table->string('deskripsi');
            $table->integer('stok');
            $table->integer('harga');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
