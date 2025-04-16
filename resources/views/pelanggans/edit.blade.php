@extends('template')
@section('content')

<div class="container mt-5">
    <div class="card shadow-lg p-5 border-0 rounded-4" style="background: linear-gradient(135deg, #cfd9df, #e2ebf0);">
        <h2 class="text-center mb-4 fw-bold animate__animated animate__fadeInDown" style="color: #007bff;">
            Edit Data Pelanggan
        </h2>

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

        <form id="edit-form" action="{{ route('pelanggans.update', $pelanggan->pelanggan_id) }}" method="POST" class="needs-validation animate__animated animate__fadeInUp" novalidate>
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="mb-4">
                <label for="nama_pelanggan" class="form-label fw-semibold">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="form-control shadow-sm border-0 rounded-3" id="nama_pelanggan" value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}" required>
            </div>

            <div class="mb-4">
                <label for="alamat" class="form-label fw-semibold">Alamat</label>
                <textarea name="alamat" class="form-control shadow-sm border-0 rounded-3" id="alamat" rows="3" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="nomor_telepon" class="form-label fw-semibold">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" class="form-control shadow-sm border-0 rounded-3" id="nomor_telepon" value="{{ old('nomor_telepon', $pelanggan->nomor_telepon) }}" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn text-white px-5 py-2 rounded-pill shadow-lg btn-hover" style="background-color: #007bff;">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('pelanggans.index') }}" class="btn btn-outline-secondary px-5 py-2 rounded-pill shadow-lg btn-hover">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

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
