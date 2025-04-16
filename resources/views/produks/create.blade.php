@extends('template')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-5 border-0 rounded-4" style="background: linear-gradient(135deg, #cfd9df, #e2ebf0);">
        <h2 class="text-center text-primary mb-4 fw-bold animate__animated animate__fadeInDown">Tambah Produk</h2>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if ($errors->any())
            <div class="alert alert-danger fade show animate__animated animate__shakeX" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="create-form" action="{{ route('produks.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation animate__animated animate__fadeInUp" novalidate>
            {{ csrf_field() }}

            <div class="mb-4">
                <label for="nama_produk" class="form-label fw-semibold">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk" class="form-control shadow-sm border-0 rounded-3" placeholder="Masukkan Nama Produk" required>
            </div>

            <div class="mb-4">
                <label for="harga" class="form-label fw-semibold">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control shadow-sm border-0 rounded-3" step="0.01" placeholder="Masukkan Harga" required min="0">
            </div>

            <div class="mb-4">
                <label for="stok" class="form-label fw-semibold">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control shadow-sm border-0 rounded-3" placeholder="Masukkan Stok" required min="0">
            </div>

            <div class="mb-4">
                <label for="image" class="form-label fw-semibold">Gambar Produk</label>
                <input type="file" name="image" id="image" class="form-control shadow-sm border-0 rounded-3">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill shadow-lg btn-hover">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('produks.index') }}" class="btn btn-outline-secondary px-5 py-2 rounded-pill shadow-lg btn-hover">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById("create-form").addEventListener("submit", function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Yakin ingin menyimpan produk?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Ya, simpan!",
            cancelButtonText: "Batal",
            confirmButtonColor: "#007bff",
            cancelButtonColor: "#6c757d"
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit();
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        @if(session('success'))
            Swal.fire({
                title: "Sukses!",
                text: "{{ session('success') }}",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            });
        @endif
    });
</script>

<style>
    .btn-hover:hover {
        transform: scale(1.1);
        transition: 0.3s;
    }
    .form-control {
        transition: 0.3s;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
    }
    .custom-select {
        background: #f8f9fa;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }
    .custom-select:hover {
        background: #e9ecef;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
@endsection
