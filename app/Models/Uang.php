<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'uang_masuk',
        'uang_keluar',
    ];
}
