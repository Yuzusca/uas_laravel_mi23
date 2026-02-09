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
        <h4 class="fw-bold mb-4 px-2">Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link active" href="{{ route('dashboard') }}">Beranda</a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="#">Produk</a>
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
        <h2 class="fw-bold mb-4">Selamat Datang, {{ Auth::user()->name }}</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-3 shadow-sm border-2">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Produk</h5>
                        <h1 class="display-4 fw-bold">{{ $total_produk }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm border-2">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">Kategori</h5>
                        <h1 class="display-4 fw-bold">{{ $total_kategori }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm border-2">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">User</h5>
                        <h1 class="display-4 fw-bold">{{ $total_user }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
