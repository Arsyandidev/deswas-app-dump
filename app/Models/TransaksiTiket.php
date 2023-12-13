<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class TransaksiTiket extends Model
{
    use HasFactory;

    protected $table = 'transaksi_tiket';
    protected $fillable = [
        'judul', 'deskripsi', 'kode_jabatan', 'jabatan', 'nip', 'nama', 'email', 'nomor_hp', 'prioritas', 'resiko',
        'kategori', 'read', 'profile_pic', 'publis', 'view', 'survey_nilai', 'survey_masukan', 'layer', 'waktu_habis',
        'setuju_publis', 'setuju_lampiran', 'ref_id', 'pengajuan', 'telaah', 'jawaban', 'selesai', 'user_inspektur', 'setuju',
        'user_id'
    ];

    public static function getNamaTelaah()
    {
        $query = DB::table('transaksi_tiket')
            ->distinct()
            ->join('users', 'transaksi_tiket.user_telaah', '=', 'users.id')
            ->pluck('users.name');
        return $query[0];
    }

    /**
     * Get the user that owns the TransaksiTiket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    /**
     * Get the kategori that owns the TransaksiTiket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(ParameterKategori::class, 'kategori', 'id');
    }
}
