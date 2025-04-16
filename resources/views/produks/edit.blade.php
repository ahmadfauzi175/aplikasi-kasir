@extends('template')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-5 border-0 rounded-4" style="background: linear-gradient(135deg, #cfd9df, #e2ebf0);">
        <h2 class="text-center text-primary mb-4 fw-bold animate__animated animate__fadeInDown">Edit Produk</h2>

        @if ($errors->any())
            <div class="alert alert-danger fade show animate__animated animate__shakeX" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="edit-form" action="{{ route('produks.update', $produk->produk_id) }}" method="POST" enctype="multipart/form-data" class="animate__animated animate__fadeInUp needs-validation" novalidate>
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="mb-4">
                <label class="form-label fw-semibold">Nama Produk</label>
                <input type="text" class="form-control shadow-sm border-0 rounded-3" name="nama_produk" value="{{ $produk->nama_produk }}" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Harga</label>
                <input type="number" class="form-control shadow-sm border-0 rounded-3" name="harga" value="{{ $produk->harga }}" required min="0">
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Stok</label>
                <input type="number" class="form-control shadow-sm border-0 rounded-3" name="stok" value="{{ $produk->stok }}" required min="0">
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Gambar Produk</label>
                <input type="file" class="form-control shadow-sm border-0 rounded-3" name="image">
                @if($produk->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/images/' . $produk->image) }}" alt="Image" width="100" class="rounded shadow-sm">
                    </div>
                @endif
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill shadow-lg btn-hover">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('produks.index') }}" class="btn btn-outline-secondary px-5 py-2 rounded-pill shadow-lg btn-hover">
                    <i class="fas fa-times"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById("edit-form").addEventListener("submit", function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Yakin ingin menyimpan perubahan?",
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
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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
</style>
@endpush