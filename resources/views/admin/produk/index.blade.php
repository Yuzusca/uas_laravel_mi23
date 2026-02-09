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
        <h2 class="fw-bold mb-4">Daftar Produk</h2>

        <a href="{{ route('admin.produk.create') }}" class="btn btn-outline-dark mb-3 fw-bold">Tambah Produk</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produk as $item)
                        <tr>
                            <td width="100">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" width="60" height="60" class="rounded object-fit-cover border">
                                @else
                                    <span class="text-muted small">No Image</span>
                                @endif
                            </td>
                            <td class="fw-bold">{{ $item->nama_produk }}</td>
                            <td><span class="badge bg-secondary">{{ $item->kategori->nama_kategori ?? 'Umum' }}</span></td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('admin.produk.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus produk ini?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger text-decoration-none btn-sm fw-bold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Belum ada data produk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
