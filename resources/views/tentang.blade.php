@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0 rounded-4 p-4">
                <h2 class="fw-bold mb-4 border-bottom pb-3">Tentang Saya</h2>
                <div class="row align-items-center">

                    <div class="col-md-3 text-center mb-3 mb-md-0">
                        <div class="bg-light border rounded-circle d-flex align-items-center justify-content-center mx-auto shadow-sm"
                             style="width: 150px; height: 150px;">
                            <i class="fas fa-user fa-4x text-secondary"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-borderless fs-5">
                            <tr><td width="150" class="fw-bold">NIM</td><td>: 2357401007</td></tr>
                            <tr><td class="fw-bold">Nama</td><td>: Yusuf Hidayat</td></tr>
                            <tr><td class="fw-bold">Kelas</td><td>: MI 23</td></tr>
                            <tr><td class="fw-bold">Project</td><td>: Toko Game Online (Laravel 11)</td></tr>
                        </table>
                        <div class="mt-3 p-3 bg-light rounded border">
                            <p class="mb-0">Website ini dibuat untuk memenuhi tugas UAS PHP Framework. Fitur yang tersedia meliputi Katalog Produk, Manajemen Kategori (Admin), dan Autentikasi User.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
