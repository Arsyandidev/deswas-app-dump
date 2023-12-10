<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransaksiTiketChat extends Model
{
    use HasFactory;

    protected $table = 'transaksi_tiket_chat';
    protected $fillable = [
        'id_transaksi_tiket', 'read', 'sender', 'auditor_profile_pic', 'auditor_nama', 'auditor_email', 'approve',
        'auditor_kode_jabatan', 'auditor_jabatan', 'auditor_nip', 'chat', 'file', 'gambar', 'email', 'publis', 'edited', 'alasan'
    ];

    /**
     * Get the tiket that owns the TransaksiTiketChat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiket(): BelongsTo
    {
        return $this->belongsTo(TransaksiTiket::class, 'id_transaksi_tiket', 'id');
    }
}
