<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS Tambahan agar Sidebar Full Height seperti di Wireframe */
        body { overflow-x: hidden; }
        .sidebar { min-height: 100vh; background-color: #f8f9fa; border-right: 1px solid #dee2e6; }
        .nav-link { color: #333; font-weight: 500; }
        .nav-link:hover, .nav-link.active { background-color: #e9ecef; }
    </style>
</head>
<body>

<div class="row">
    <div class="col-md-2 sidebar p-3">
        <h4 class="fw-bold mb-4 px-2">Produk</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('dashboard') }}">Beranda</a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link active" href="{{ route('admin.produk.index') }}">Produk</a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('kategori.index') }}">Kategori</a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="#">User</a>
            </li>
            <li class="nav-item mt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link text-danger text-start w-100">Keluar</button>
                </form>
            </li>
        </ul>
    </div>

    <div class="col-md-10 p-5">
        <div class="card shadow-sm border-0 p-4" style="max-width: 800px;">
            <h4 class="fw-bold mb-4">Tambah Produk Baru</h4>

            <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Contoh: Voucher Steam" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Kategori</label>
                        <select name="kategori_id" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $kat)
                                <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" placeholder="0" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Gambar Produk</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                    <small class="text-muted">Format: jpg, png, jpeg. Maks: 2MB.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi singkat produk..." required></textarea>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('admin.produk.index') }}" class="btn btn-light border">Batal</a>
                    <button type="submit" class="btn btn-dark fw-bold px-4">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
