<!DOCTYPE html>
<html lang="id">
<head>
    <title>Semua Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">Reavictus</a>
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('produk') }}">Produk</a></li>
                    <li class="nav-item"><a class="nav-link active fw-bold" href="{{ route('kategori') }}">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('tentang') }}">Tentang</a></li>
                </ul>
            </div>
            <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm">Login Admin</a>
        </div>
    </nav>

    <div class="container">
        <h2 class="fw-bold mb-4 text-center">Semua Kategori</h2>

        <div class="row">
            @forelse($kategori as $cat)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 text-center p-5 border-2 hover-shadow">
                    <h3 class="fw-bold">{{ $cat->nama_kategori }}</h3>
                    <p class="text-muted">Lihat produk di kategori ini</p>
                    <a href="#" class="btn btn-outline-dark mt-2">Buka</a>
                </div>
            </div>
            @empty
                <div class="col-12 text-center">Belum ada kategori.</div>
            @endforelse
        </div>
    </div>

</body>
</html>
