<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategori', function (Blueprint $table) {
            // 1. Kolom id (int, primary key, auto_increment)
            $table->id();

            // 2. Kolom nama_kategori (varchar 50)
            $table->string('nama_kategori', 50);

            // 3. Kolom created_at & updated_at (timestamp)
            $table->timestamps();

            // 4. Kolom deleted_at (timestamp) untuk Soft Delete
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};
