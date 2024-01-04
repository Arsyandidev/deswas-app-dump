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

    public static function getNamaTelaah($id)
    {
        $query = DB::table('transaksi_tiket')
            ->join('users', 'transaksi_tiket.user_telaah', '=', 'users.id')
            ->where('transaksi_tiket.id', '=', $id)
            ->get();
        return $query;
    }

    public static function getNamaInspektur($id)
    {
        $query = DB::table('transaksi_tiket')
            ->join('users', 'transaksi_tiket.user_inspektur', '=', 'users.id')
            ->where('transaksi_tiket.id', '=', $id)
            ->get();
        return $query;
    }

    public static function getFile($id)
    {
        $query = DB::table('transaksi_tiket_file')
            ->join('transaksi_tiket', 'transaksi_tiket_file.id_transaksi_tiket', '=', 'transaksi_tiket.id')
            ->where('transaksi_tiket_file.id_transaksi_tiket', '=', $id)
            ->get();
        return $query;
    }

    public static function getTiketLayer2()
    {
        $query = DB::table('transaksi_tiket')
            ->join('users', 'transaksi_tiket.layers', '=', 'users.layers')
            ->where('transaksi_tiket.layers', '=', 2)
            ->get();
        return $query;
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
    public function getKategori(): BelongsTo
    {
        return $this->belongsTo(ParameterKategori::class, 'kategori', 'id');
    }
}
