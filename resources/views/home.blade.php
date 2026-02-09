@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="p-5 mb-4 bg-light rounded-3 text-center border shadow-sm">
        <h1 class="display-5 fw-bold">Selamat Datang di RV Street OG</h1>
        <p class="fs-4">Top Up game termurah dan terpercaya se-Indonesia.</p>
        <a href="{{ route('produk') }}" class="btn btn-primary btn-lg rounded-pill px-4" type="button">Belanja Sekarang</a>
    </div>

    <h3 class="fw-bold mb-3 border-bottom pb-2">🔥 Hot Products</h3>
    <div class="row mb-5">
        @foreach($hotProducts as $item)
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="fw-bold">{{ $item->nama_produk }}</h5>
                    <p class="text-primary fw-bold fs-5">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                    <a href="{{ route('produk') }}" class="btn btn-outline-primary btn-sm rounded-pill">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <h3 class="fw-bold mb-3 border-bottom pb-2">🆕 New Products</h3>
    <div class="row mb-5">
        @foreach($newProducts as $item)
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <span class="badge bg-success mb-2">BARU!</span>
                    <h5 class="fw-bold">{{ $item->nama_produk }}</h5>
                    <p class="text-muted small">{{ Str::limit($item->deskripsi, 40) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
