<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransaksiTiketFile extends Model
{
    use HasFactory;
    protected $table = 'transaksi_tiket_file';
    protected $fillable = [
        'id_transaksi_tiket', 'image', 'file', 'type'
    ];

    /**
     * Get the tiket that owns the TransaksiTiketFile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiket(): BelongsTo
    {
        return $this->belongsTo(TransaksiTiket::class, 'id_transaksi_tiket', 'id');
    }
}
