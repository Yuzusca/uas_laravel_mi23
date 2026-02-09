<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // Menghitung jumlah data untuk Widget Dashboard (Soal No 6.3 - 6.5)
        $total_produk = Produk::count();
        $total_kategori = Kategori::count();
        $total_user = User::count();

        // Kirim data ke view
        return view('admin.dashboard', compact('total_produk', 'total_kategori', 'total_user'));
    }
}
