<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { overflow-x: hidden; }
        .sidebar { min-height: 100vh; background-color: #f8f9fa; border-right: 1px solid #dee2e6; }
        .nav-link { color: #333; font-weight: 500; }
        .nav-link:hover, .nav-link.active { background-color: #e9ecef; }
    </style>
</head>
<body>

<div class="row">
    <div class="col-md-2 sidebar p-3">
        <h4 class="fw-bold mb-4 px-2">Tambah Kategori</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a class="nav-link" href="{{ route('dashboard') }}">Beranda</a></li>
            <li class="nav-item mb-2"><a class="nav-link" href="#">Produk</a></li>
            <li class="nav-item mb-2"><a class="nav-link active" href="{{ route('kategori.index') }}">Kategori</a></li>
            <li class="nav-item mb-2"><a class="nav-link" href="#">User</a></li>
            <li class="nav-item mt-4">
                 <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link text-danger text-start w-100">Keluar</button>
                </form>
            </li>
        </ul>
    </div>

    <div class="col-md-10 p-5">
        <div class="card shadow-sm p-4" style="max-width: 600px;">
            <h4 class="fw-bold mb-4">Nama Kategori</h4>

            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <input type="text" name="nama_kategori" class="form-control border-dark" placeholder="Masukkan nama kategori..." required>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('kategori.index') }}" class="btn btn-link text-decoration-none text-dark">Kembali</a>
                    <button type="submit" class="btn btn-outline-dark fw-bold">Simpan Kategori</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
