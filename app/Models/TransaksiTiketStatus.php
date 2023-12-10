<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiTiketStatus extends Model
{
    use HasFactory;

    protected $table = 'transaksi_tiket_status';
    protected $fillable = [
        'id_transaksi_tiket', 'auditor_profile_pic', 'auditor_nama', 'auditor_email', 'auditor_kode_jabatan',
        'auditor_jabatan', 'auditor_nip', 'nama'
    ];
}
