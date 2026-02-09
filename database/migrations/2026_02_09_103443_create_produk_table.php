<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk'); // Sesuai Soal 2
            $table->text('deskripsi');     // Sesuai Soal 2
            $table->integer('harga');      // Wajib ada untuk toko
            $table->string('gambar')->nullable(); // Sesuai wireframe (ada kotak gambar) [cite: 6]

            // Menghubungkan Produk ke Kategori (Relasi)
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
