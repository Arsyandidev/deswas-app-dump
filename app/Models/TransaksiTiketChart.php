<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiTiketChart extends Model
{
    use HasFactory;
    protected $table = 'transaksi_tiket_chart';
    protected $fillable = [
        'tinggi', 'rendah'
    ];
}
