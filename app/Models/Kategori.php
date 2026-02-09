<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Tambahkan ini untuk fitur Soft Delete

class Kategori extends Model
{
    use HasFactory, SoftDeletes;

    // Beritahu Laravel nama tabelnya
    protected $table = 'kategori';

    // Izinkan kolom ini diisi data
    protected $fillable = [
        'nama_kategori'
    ];

    // 2357401007 - Yusuf Hidayat
}

