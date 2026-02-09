<!DOCTYPE html>
<html lang="id">
<head>
    <title>Halaman Kategori</title>
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
        <h4 class="fw-bold mb-4 px-2">Kategori</h4>
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
        <h2 class="fw-bold mb-4">Daftar Kategori</h2>

        <a href="{{ route('kategori.create') }}" class="btn btn-outline-dark mb-3 fw-bold">Tambah Kategori</a>

        <div class="card shadow-sm p-3" style="max-width: 400px;">
            @if(session('success'))
                <div class="alert alert-success py-1">{{ session('success') }}</div>
            @endif

            <ul class="list-group list-group-flush">
                @forelse($kategori as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $item->nama_kategori }}

                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-primary text-decoration-none p-0">Hapus</button>
                        </form>
                    </li>
                @empty
                    <li class="list-group-item text-muted">Belum ada kategori.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>

</body>
</html>
