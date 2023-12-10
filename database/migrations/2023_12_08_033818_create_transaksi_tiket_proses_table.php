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
        Schema::create('transaksi_tiket_proses', function (Blueprint $table) {
            $table->id();
            $table->integer('id_transaksi_tiket');
            $table->dateTime('pengajuan')->nullable();
            $table->dateTime('telaah')->nullable();
            $table->dateTime('jawaban')->nullable();
            $table->dateTime('selesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_tiket_proses');
    }
};
