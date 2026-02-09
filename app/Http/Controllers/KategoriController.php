<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori; // Jangan lupa import Model ini

class KategoriController extends Controller
{
    // 7.3: Halaman kategori menampilkan daftar kategori
    public function index()
    {
        $kategori = Kategori::all(); // Ambil semua data
        return view('admin.kategori.index', compact('kategori'));
    }

    // Menampilkan Form Tambah (Wireframe Halaman 6 bawah)
    public function create()
    {
        return view('admin.kategori.create');
    }

    // 7.4: Tambah kategori baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|max:50',
        ]);

        // Simpan ke database
        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        // Redirect kembali ke halaman daftar
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    // 7.5: Fitur hapus kategori dari database
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
