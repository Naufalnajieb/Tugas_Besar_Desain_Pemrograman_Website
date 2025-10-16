<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->increments('id_pengembalian');
            $table->integer('denda_kerusakan');
            $table->enum('status', ['pending', 'success', 'failed']);
            $table->string('snap_token')->nullable();
            $table->unsignedBigInteger('id_transaction');
            $table->foreign('id_transaction')->references('id_transaction')->on('transaction');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian');
    }
};
