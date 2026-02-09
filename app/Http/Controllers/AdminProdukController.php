<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class AdminProdukController extends Controller
{
    // 1. Tampilkan Daftar Produk
    public function index()
    {
        $produk = Produk::with('kategori')->get(); // Ambil produk beserta kategorinya
        return view('admin.produk.index', compact('produk'));
    }

    // 2. Tampilkan Form Tambah
    public function create()
    {
        $kategori = Kategori::all(); // Kita butuh data kategori untuk dropdown
        return view('admin.produk.create', compact('kategori'));
    }

    // 3. Simpan Produk ke Database
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048' // Validasi file gambar
        ]);

        $data = $request->all();

        // Cek jika ada file gambar yang diupload
        if ($request->hasFile('gambar')) {
            // Simpan ke folder 'storage/app/public/produk'
            $path = $request->file('gambar')->store('produk', 'public');
            $data['gambar'] = $path;
        }

        Produk::create($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // 4. Hapus Produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus gambar lama jika ada
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }
}
