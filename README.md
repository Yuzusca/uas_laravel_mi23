# 🎮 RV Street OG - Game Store Catalog

**RV Street OG** adalah aplikasi web katalog dan penjualan voucher game sederhana yang dibangun menggunakan Framework **Laravel 11**. Proyek ini dibuat untuk memenuhi tugas **UAS Pemrograman Framework**.

Aplikasi ini memiliki dua sisi pengguna:
1. **Frontend (Pengunjung):** Melihat katalog produk, filter kategori, dan detail item.
2. **Backend (Admin):** Mengelola produk (CRUD), kategori, dan melihat statistik dashboard.

![Screenshot Aplikasi](public/storage/screenshot-home.png) 
*(Opsional: Ganti path ini dengan link gambar screenshot jika ada)*

---

## 🚀 Fitur Utama

-   **Halaman Depan Modern:** Menampilkan *Hot Products*, *New Arrivals*, dan Sidebar Kategori.
-   **Katalog Produk:** Daftar produk lengkap dengan harga dan deskripsi.
-   **Admin Dashboard:** Ringkasan jumlah User, Produk, dan Kategori.
-   **Manajemen Produk (CRUD):** Admin bisa menambah, mengedit, menghapus produk, serta **upload gambar**.
-   **Manajemen Kategori:** Mengelompokkan produk berdasarkan game.
-   **Autentikasi:** Sistem Login & Register untuk Admin.

---

## 🛠️ Teknologi yang Digunakan

-   **Backend:** Laravel 11 (PHP 8.2+)
-   **Frontend:** Bootstrap 5, Blade Template
-   **Database:** MySQL
-   **Icons:** FontAwesome 6

---

## ⚙️ Persyaratan Sistem (Prerequisites)

Sebelum menginstall, pastikan komputer Anda sudah terinstall:

-   **PHP** >= 8.2
-   **Composer**
-   **MySQL** (Bisa via XAMPP / Laragon)
-   **Git**

---

## 📥 Cara Install & Menjalankan (Step-by-Step)

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer lokal (localhost):

### 1. Clone Repository
Buka terminal/CMD, lalu jalankan perintah:
```
git clone [[https://github.com/Yuzusca/uas_laravel_mi23.git]](https://github.com/Yuzusca/uas_laravel_mi23.git)
cd uas_laravel_mi23
```

### 2. Install Dependencies
Install semua library Laravel yang dibutuhkan:
```
composer install
```

### 3. Setup File Environment
Salin file .env.example menjadi .env:
```
cp .env.example .env
```

### 4. Konfigurasi Database
Buka file .env dengan text editor.
Cari bagian database dan sesuaikan dengan settingan MySQL kamu (biasanya seperti ini):
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=uas_laravel  <-- Buat database baru dengan nama ini di phpMyAdmin
DB_USERNAME=root
DB_PASSWORD=
```
PENTING: Buat database kosong bernama uas_laravel di PhpMyAdmin

### 5. Generate Key & Migrasi Database
Jalankan perintah ini untuk membuat kunci enkripsi dan tabel database:
```
php artisan key:generate
php artisan migrate
```

### 6. Setup Penyimpanan Gambar (PENTING!)
Agar gambar produk yang di-upload bisa muncul di browser, jalankan:
```
php artisan storage:link
```

### 7. Jalankan Server
Terakhir, jalankan server lokal Laravel:
```
php artisan serve
```
akses website di 127.0.0.1:8000

👤 Cara Login Admin
Karena database masih kosong (fresh), kamu perlu mendaftar akun admin pertama kali:
- Buka http://127.0.0.1:8000/daftar
- Isi Nama, Email, dan Password.
- Setelah daftar, kamu akan otomatis diarahkan ke halaman Login.
- Masuk menggunakan email & password yang baru dibuat.
- Selamat! Kamu sudah masuk ke Dashboard Admin.

👨‍💻 Author
Yusuf Hidayat

NIM: 2357401007
Kelas: MI 23
Kampus: Politeknik Piksi Input Serang
