<?php

namespace Database\Seeders;

use App\Models\ParameterKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParameterKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParameterKategori::create([
            'name' => 'Pengadaan Barang dan Jasa',
            'deskripsi' => 'Perencanaan, pelaksanaan, pelaporan. Seluruh jenis pengadaan',
        ]);

        ParameterKategori::create([
            'name' => 'Pengelolaan Asset',
            'deskripsi' => 'Perencanaan (RKBMN), Penatausahaan BMN, (Peminjaman, Pemakaian, Penghapusan, Pencatatan)',
        ]);

        ParameterKategori::create([
            'name' => 'Tindak Lanjut Hasil Pengawasan',
            'deskripsi' => 'Penyelesaian TLHP Internal dan Eksternal',
        ]);

        ParameterKategori::create([
            'name' => 'Pengelolaan Keuangan/Pelaksanaan Anggaran',
            'deskripsi' => 'Perjalanan dinas, Honorarium, SBM',
        ]);

        ParameterKategori::create([
            'name' => 'Penganggaran/Kinerja',
            'deskripsi' => 'RKAKL, Renja, Renstra, Revisi Anggaran, SAKTI',
        ]);

        ParameterKategori::create([
            'name' => 'Tata Kelola Pemerintahan',
            'deskripsi' => 'RB, SPIP, MR, ZI, SAKIP, LAKIP',
        ]);

        ParameterKategori::create([
            'name' => 'Laporan Keuangan',
            'deskripsi' => 'Pencatatan LK, Koreksi LK',
        ]);

        ParameterKategori::create([
            'name' => 'PNBP',
            'deskripsi' => 'Pencatatan PNBP, Keringanan PNBP',
        ]);

        ParameterKategori::create([
            'name' => 'Lain-lain',
            'deskripsi' => '-',
        ]);

        ParameterKategori::create([
            'name' => 'Aplikasi Itjen',
            'deskripsi' => 'Aplikasi yg dikelola itjen (SIMWAS, WBS, MR, EvSAKIP, CACM, E-ZIKO, GIS, Web Itjen, DESWAS), LHKASN, LHKPN',
        ]);
    }
}
