<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ParameterKategori extends Model
{
    use HasFactory;

    protected $table = 'parameter_kategori';
    protected $fillable = [
        'name', 'deskripsi', 'is_ses'
    ];
}
