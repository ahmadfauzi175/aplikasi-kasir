@extends('template')

@section('content')

<div class="container mt-5">
    <center><h1 class="mb-4">Daftar Produk</h1></center>

    @can('admin')
        <a href="{{ route('produks.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>
    @endcan

    <!-- Container produk dengan spacing lebih baik -->
    <div class="row gx-3 gy-4 justify-content-start">
        @forelse($produks as $produk)
            <div class="col-auto">
                <!-- Card untuk setiap produk -->
                <div class="card shadow-sm rounded overflow-hidden p-2 mb-4 me-3" style="width: 180px; height: auto; border: none;">
                    <!-- Gambar Produk -->
                    <div class="card-img-top" style="height: 120px; display: flex; justify-content: center; align-items: center;">
                        @if($produk->image)
                            <img src="{{ asset('storage/images/' . $produk->image) }}" class="img-fluid" alt="Image" style="max-height: 100%; object-fit: cover; border-radius: 8px;">
                        @else
                            <div class="d-flex justify-content-center align-items-center" style="height: 100%; background-color: #f0f0f0; border-radius: 8px;">
                                <span class="text-muted">No Image</span>
                            </div>
                        @endif
                    </div>

                    <div class="card-body text-center p-2">
                        <h6 class="card-title" style="font-size: 0.9rem; font-weight: bold; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $produk->nama_produk }}</h6>
                        <p class="card-text" style="font-size: 0.85rem; color: #555;">Rp.{{ number_format($produk->harga, 0) }}</p>
                        <p class="card-text" style="font-size: 0.8rem; color: #777;">Stok: <strong>{{ $produk->stok }}</strong></p>

                        @can('admin')
                        <div class="d-flex justify-content-center gap-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('produks.edit', $produk->produk_id) }}" 
                                class="btn btn-sm d-flex align-items-center justify-content-center"
                                style="background-color: #17c1e8; width: 40px; height: 40px; border-radius: 6px;">
                                <i class="fas fa-edit text-dark"></i>
                             </a>
                             
                        
                            <form action="{{ route('produks.destroy', $produk->produk_id) }}" method="POST" style="display:inline;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-sm d-flex align-items-center justify-content-center" style="background-color: #dc3545; width: 40px; height: 40px; border-radius: 6px;">
                                    <i class="fas fa-trash-alt text-dark"></i>
                                </button>
                            </form>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Tidak ada produk.</p>
            </div>
        @endforelse
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if(session('success'))
            @php $successMessage = session('success'); @endphp

            @if($successMessage == 'Produk berhasil ditambahkan!')
                Swal.fire({
                    title: "Sukses!",
                    text: "Data produk berhasil ditambahkan!",
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
</script>


@endsection