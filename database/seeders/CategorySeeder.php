<?php

namespace Database\Seeders;

use App\Models\TicketCategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TicketCategory::create([
            'name' => 'Pengadaan Barang dan Jasa',
            'desc' => 'Perencanaan, pelaksanaan, pelaporan. Seluruh jenis pengadaan'
        ]);

        TicketCategory::create([
            'name' => 'Pengelolaan Asset',
            'desc' => 'Perencanaan (RKBMN), Penatausahaan BMN, (Peminjaman, Pemakaian, Penghapusan, Pencatatan)'
        ]);

        TicketCategory::create([
            'name' => 'Tindak Lanjut Hasil Pengawasan',
            'desc' => 'Penyelesaian TLHP Internal dan Eksternal'
        ]);

        TicketCategory::create([
            'name' => 'Pengelolaan Keuangan/Pelaksanaan Anggaran',
            'desc' => 'Perjalanan dinas, Honorarium, SBM'
        ]);

        TicketCategory::create([
            'name' => 'Penganggaran/Kinerja',
            'desc' => 'RKAKL, Renja, Renstra, Revisi Anggaran, SAKTI'
        ]);

        TicketCategory::create([
            'name' => 'Tata Kelola Pemerintahan',
            'desc' => 'RB, SPIP, MR, ZI, SAKIP, LAKIP'
        ]);

        TicketCategory::create([
            'name' => 'Laporan Keuangan',
            'desc' => 'Pencatatan LK, Koreksi LK'
        ]);

        TicketCategory::create([
            'name' => 'PNBP',
            'desc' => 'Pencatatan PNBP, Keringanan PNBP'
        ]);

        TicketCategory::create([
            'name' => 'Lain-lain',
            'desc' => '-'
        ]);

        TicketCategory::create([
            'name' => 'Aplikasi Itjen',
            'desc' => 'Aplikasi yg dikelola itjen (SIMWAS, WBS, MR, EvSAKIP, CACM, E-ZIKO, GIS, Web Itjen, DESWAS), LHKASN, LHKPN'
        ]);
    }
}
