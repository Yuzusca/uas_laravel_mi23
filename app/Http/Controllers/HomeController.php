<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class HomeController extends Controller
{
    // 1. Halaman HOME (Landing Page)
    public function index()
    {
        // Ambil 3 produk acak untuk "Hot Products"
        $hotProducts = Produk::inRandomOrder()->limit(3)->get();

        // Ambil 3 produk terbaru untuk "New Products"
        $newProducts = Produk::latest()->limit(3)->get();

        // Ambil 4 kategori untuk "Kategori Terlaris" (Kita ambil random saja dulu)
        $topCategories = Kategori::inRandomOrder()->limit(4)->get();

        return view('home', compact('hotProducts', 'newProducts', 'topCategories'));
    }

    // 2. Halaman SEMUA PRODUK
    public function produk()
    {
        // Ambil semua produk
        $produk = Produk::all();

        // Ambil semua kategori untuk Sidebar
        $kategori = Kategori::all();

        // Kirim keduanya ke view
        return view('produk', compact('produk', 'kategori'));
    }

    // 3. Halaman SEMUA KATEGORI
    public function kategori()
    {
        $kategori = Kategori::all(); // Ambil semua kategori
        return view('kategori', compact('kategori'));
    }

    public function tentang()
    {
        return view('tentang');
    }
}
