@extends('layouts.app')

@section('content')
<style>
    .category-list .list-group-item {
        border: none; padding: 12px 20px; font-weight: 500; color: #555;
        transition: 0.2s; border-radius: 10px; margin-bottom: 5px;
    }
    .category-list .list-group-item:hover { background-color: #e9ecef; color: #0d6efd; transform: translateX(5px); }
    .category-list .list-group-item.active { background-color: #0d6efd; color: white; }

    .product-card { border: none; border-radius: 15px; background: #fff; transition: all 0.3s ease; overflow: hidden; }
    .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }

    .img-placeholder { height: 180px; background: linear-gradient(45deg, #e9ecef, #dee2e6); display: flex; align-items: center; justify-content: center; color: #adb5bd; font-size: 3rem; }
    .price-tag { font-size: 1.1rem; font-weight: 700; color: #0d6efd; }
</style>

<div class="container mt-5">
    <div class="row">

        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm p-3 rounded-4">
                <h5 class="fw-bold mb-3 px-2"><i class="fas fa-list-ul me-2"></i>Kategori</h5>
                <div class="list-group category-list">
                    <a href="{{ route('produk') }}" class="list-group-item list-group-item-action active">
                        <i class="fas fa-th-large me-2"></i> Semua Produk
                    </a>
                    @foreach($kategori as $cat)
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-tag me-2"></i> {{ $cat->nama_kategori }}
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-4 p-4 text-center rounded-4 bg-primary text-white">
                <h5>Butuh Bantuan?</h5>
                <p class="small mb-2">Hubungi Admin jika ada kendala.</p>
                <button class="btn btn-light btn-sm fw-bold rounded-pill">Chat Admin</button>
            </div>
        </div>

        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold m-0 text-dark">Daftar Produk</h3>
                <div class="input-group" style="max-width: 300px;">
                    <input type="text" class="form-control rounded-start-pill border-end-0" placeholder="Cari item...">
                    <span class="input-group-text bg-white rounded-end-pill border-start-0"><i class="fas fa-search text-muted"></i></span>
                </div>
            </div>

            <div class="row g-4">
                @forelse($produk as $item)
                <div class="col-md-4 col-sm-6">
                    <div class="card product-card h-100 shadow-sm">
                        <div class="img-placeholder"><i class="fas fa-image"></i></div>
                        <div class="card-body d-flex flex-column">
                            <div class="mb-2">
                                <span class="badge bg-light text-secondary border">{{ $item->kategori->nama_kategori ?? 'Umum' }}</span>
                            </div>
                            <h5 class="card-title fw-bold text-dark">{{ $item->nama_produk }}</h5>
                            <p class="card-text text-muted small flex-grow-1">{{ Str::limit($item->deskripsi, 50) }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3 border-top pt-3">
                                <span class="price-tag">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                                <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-3">Beli</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <h4>Belum ada produk.</h4>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
