<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id_transaction');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->integer('harga');
            $table->enum('status', ['pending', 'success', 'failed']);
            $table->string('snap_token')->nullable();
            $table->unsignedBigInteger('id_users');
            $table->integer('id_barang');
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_barang')->references('id_barang')->on('barang');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
