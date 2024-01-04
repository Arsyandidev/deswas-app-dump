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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable();
            $table->boolean('active')->default(0);
            $table->jsonb('organisasi')->nullable();
            $table->string('nip')->nullable();
            $table->string('pangkat_golongan')->nullable();
            $table->jsonb('jabatan_struktur_organisasi')->nullable();
            $table->jsonb('plt_jabatan_struktural_organisasi')->nullable();
            $table->jsonb('plh_jabatan_struktural_organisasi')->nullable();
            $table->string('nama_jabatan_fungsional_umum')->nullable();
            $table->string('nama_jabatan_fungsional_tertentu')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('jabatan_kelompok_substansi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('active');
            $table->dropColumn('organisasi');
            $table->dropColumn('nip');
            $table->dropColumn('pangkat_golongan');
            $table->dropColumn('jabatan_struktur_organisasi');
            $table->dropColumn('plt_jabatan_struktural_organisasi');
            $table->dropColumn('plh_jabatan_struktural_organisasi');
            $table->dropColumn('nama_jabatan_fungsional_umum');
            $table->dropColumn('nama_jabatan_fungsional_tertentu');
            $table->dropColumn('profile_picture');
            $table->dropColumn('jabatan_kelompok_substansi');
        });
    }
};
