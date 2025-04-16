@extends('template')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-5 border-0 rounded-4" style="background: linear-gradient(135deg, #cfd9df, #e2ebf0);">
        <h2 class="text-center text-primary mb-4 fw-bold animate__animated animate__fadeInDown">Tambah Pelanggan Baru</h2>
        
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

        <form id="create-form" action="{{ route('pelanggans.store') }}" method="POST" class="needs-validation animate__animated animate__fadeInUp" novalidate>
            {{ csrf_field() }}

            <div class="mb-4">
                <label for="nama_pelanggan" class="form-label fw-semibold">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="form-control shadow-sm border-0 rounded-3" id="nama_pelanggan" value="{{ old('nama_pelanggan') }}" placeholder="Masukkan Nama Pelanggan" required>
            </div>

            <div class="mb-4">
                <label for="alamat" class="form-label fw-semibold">Alamat</label>
                <textarea name="alamat" class="form-control shadow-sm border-0 rounded-3" id="alamat" rows="3" placeholder="Masukkan Alamat" required>{{ old('alamat') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="nomor_telepon" class="form-label fw-semibold">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" class="form-control shadow-sm border-0 rounded-3" id="nomor_telepon" value="{{ old('nomor_telepon') }}" placeholder="Masukkan Nomor Telepon" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill shadow-lg btn-hover">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('pelanggans.index') }}" class="btn btn-outline-secondary px-5 py-2 rounded-pill shadow-lg btn-hover">
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
            title: "Yakin ingin menyimpan pelanggan?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Ya, simpan!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit();
            }
        });
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
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
@endsection
