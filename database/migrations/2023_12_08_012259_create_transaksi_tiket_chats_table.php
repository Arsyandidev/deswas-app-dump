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
        Schema::create('transaksi_tiket_chat', function (Blueprint $table) {
            $table->id();
            $table->integer('id_transaksi_tiket');
            $table->boolean('read')->default(0);
            $table->enum('sender', ['user', 'auditor'])->nullable();
            $table->string('auditor_profile_pic')->nullable();
            $table->string('auditor_nama')->nullable();
            $table->string('auditor_email')->nullable();
            $table->string('auditor_kode_jabatan')->nullable();
            $table->string('auditor_jabatan')->nullable();
            $table->string('auditor_nip')->nullable();
            $table->text('chat')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_tiket_chats');
    }
};
