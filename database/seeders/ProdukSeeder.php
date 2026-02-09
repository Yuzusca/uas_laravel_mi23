<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        // 1. Kosongkan tabel produk dulu biar tidak duplikat
        DB::table('produk')->truncate();

        // 2. Ambil ID Kategori secara otomatis berdasarkan Namanya
        // (Pastikan nama kategori di sini SAMA PERSIS dengan yang kamu ketik di Admin)
        $cat_aksesoris = DB::table('kategori')->where('nama_kategori', 'Aksesoris')->value('id');
        $cat_voucher = DB::table('kategori')->where('nama_kategori', 'Voucher')->value('id');
        $cat_elektronik = DB::table('kategori')->where('nama_kategori', 'Elektronik')->value('id');

        // 3. Masukkan data contoh
        $data = [
            [
                'nama_produk' => 'Casing HP Gaming',
                'deskripsi' => 'Casing kuat tahan banting, model keren.',
                'harga' => 150000,
                'gambar' => null,
                'kategori_id' => $cat_aksesoris, // Pakai ID yang ditemukan otomatis
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Voucher Steam Rp 100rb',
                'deskripsi' => 'Kode voucher otomatis kirim via email.',
                'harga' => 110000,
                'gambar' => null,
                'kategori_id' => $cat_voucher,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Mouse Wireless RGB',
                'deskripsi' => 'Mouse gaming tanpa kabel, delay rendah.',
                'harga' => 350000,
                'gambar' => null,
                'kategori_id' => $cat_elektronik,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Hanya insert jika ID kategorinya ketemu (biar tidak error)
        if ($cat_aksesoris && $cat_voucher && $cat_elektronik) {
            DB::table('produk')->insert($data);
            echo "Data produk berhasil ditambahkan!";
        } else {
            echo "Gagal: Pastikan nama kategori 'Aksesoris', 'Voucher', dan 'Elektronik' sudah ada di Admin.";
        }
    }
}
