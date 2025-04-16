@extends('template')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded p-4 bg-light">
        <h1 class="text-center text-dark fw-bold mb-4">Daftar Pelanggan</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-end align-items-center mt-4 mb-3">
            <a href="{{ route('pelanggans.create') }}" class="btn btn-primary shadow-sm px-4 py-2">
                <i class="fas fa-user-plus text-dark"></i> Tambah Pelanggan
            </a>
        </div>

        <div class="table-responsive rounded shadow-sm">
            <table class="table table-bordered table-striped table-hover align-middle text-center">
                <thead class="bg-dark text-white">
                    <tr>
                        <th class="text-white border">No</th>
                        <th class="text-white border">Nama Pelanggan</th>
                        <th class="text-white border">Alamat</th>
                        <th class="text-white border">Nomor Telepon</th>
                        <th class="text-white border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggans as $pelanggan)
                        <tr>
                            <td class="border">{{ $loop->iteration }}</td>
                            <td class="border">{{ $pelanggan->nama_pelanggan }}</td>
                            <td class="border">{{ $pelanggan->alamat }}</td>
                            <td class="border">{{ $pelanggan->nomor_telepon }}</td>
                            <td class="border">
                                <div class="action-buttons d-flex justify-content-center gap-2">

                                    <a href="{{ route('pelanggans.edit', $pelanggan->pelanggan_id) }}" class="btn btn-warning btn-sm shadow-sm px-3 d-flex align-items-center justify-content-center gap-2">
                                        <i class="fas fa-edit text-dark"></i> <span class="text-white fw-normal ms-1">Edit</span>
                                    </a>
                                    
                                    <form action="{{ route('pelanggans.destroy', $pelanggan->pelanggan_id) }}" method="POST" onsubmit="return confirmDelete(event, this)">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm px-3">
                                            <i class="fas fa-trash-alt text-dark"></i> <span class="text-white fw-normal ms-1">Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-start mt-3">
            <h5 class="fw-semibold text-dark">Total Pelanggan: {{ $pelanggans->count() }}</h5>
        </div>
    </div>
</div>
@endsection

<!-- SweetAlert2 Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if(session('success'))
            @php $successMessage = session('success'); @endphp

            @if($successMessage == 'Pelanggan berhasil ditambahkan!')
                Swal.fire({
                    title: "Sukses!",
                    text: "Data berhasil ditambahkan!",
                    icon: "success",
                    timer: 2500,
                    showConfirmButton: false
                });
            @else
                Swal.fire({
                    title: "Sukses!",
                    text: "{{ $successMessage }}",
                    icon: "success",
                    timer: 2500,
                    showConfirmButton: false
                });
            @endif
        @endif

        @if(session('error'))
            Swal.fire({
                title: "Gagal!",
                text: "{{ session('error') }}",
                icon: "error",
                timer: 2500,
                showConfirmButton: false
            });
        @endif
    });

    function confirmDelete(event, form) {
        event.preventDefault();
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data pelanggan akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>

<!-- Custom Style -->
<style>
 .action-buttons .btn {
    width: 100px;
    height: 38px; /* tambahkan tinggi tetap */
    justify-content: center;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 6px 12px; /* bisa disesuaikan lagi */
}

.btn-warning {
    background-color: #17c1e8 !important;
    border: none;
    color: #fff !important;
}

.btn-warning:hover {
    background-color: #17c1e8 !important;
}

.btn-warning .text-white {
    color: #fff !important;
}

</style>