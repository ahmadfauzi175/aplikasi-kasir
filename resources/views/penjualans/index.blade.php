@extends('template')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded p-4 bg-light">
        <h1 class="text-center text-dark fw-bold mb-4">Daftar Penjualan</h1>

        {{-- Notifikasi menggunakan SweetAlert2, bagian ini tidak perlu lagi --}}
        {{-- @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif --}}

        <div class="d-flex justify-content-end align-items-center mt-4 mb-3">
            <a href="{{ route('penjualans.create') }}" class="btn btn-primary shadow-sm px-4 py-2">
                <i class="fas fa-cart-plus text-dark"></i> Tambah Penjualan
            </a>
        </div>

        <div class="table-responsive rounded shadow-sm">
            <table class="table table-bordered table-striped table-hover align-middle text-center">
                <thead class="bg-dark text-white">
                    <tr>
                        <th class="text-white border">No</th>
                        <th class="text-white border">Kode Pembayaran</th>
                        <th class="text-white border">Tanggal</th>
                        <th class="text-white border">Pelanggan</th>
                        <th class="text-white border">Produk</th>
                        <th class="text-white border">Total Bayar</th>
                        <th class="text-white border">Jumlah Bayar</th>
                        <th class="text-white border">Kembalian</th>
                        <th class="text-white border">Metode Pembayaran</th>
                        <th class="text-white border">Status</th>
                        <th class="text-white border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualans as $penjualan)
                        <tr>
                            <td class="border">{{ $loop->iteration }}</td>
                            <td class="border">{{ $penjualan->kode_pembayaran }}</td>
                            <td class="border">{{ date('d-m-Y', strtotime($penjualan->tanggal_penjualan)) }}</td>
                            <td class="border">{{ $penjualan->pelanggan ? $penjualan->pelanggan->nama_pelanggan : 'Umum' }}</td>
                            <td class="border">
                                @php
                                    $produkList = json_decode($penjualan->produk_id, true);
                                    $produkString = $produkList ? implode(', ', array_map(function($produk) {
                                        return $produk['nama_produk'] . " ({$produk['jumlah']}x)";
                                    }, $produkList)) : '-';
                                @endphp
                                {{ $produkString }}
                            </td>
                            <td class="border">{{ number_format($penjualan->total_bayar, 0, ',', '.') }}</td>
                            <td class="border">{{ number_format($penjualan->jumlah_bayar, 0, ',', '.') }}</td>
                            <td class="border">{{ number_format($penjualan->kembalian, 0, ',', '.') }}</td>
                            <td class="border">{{ ucfirst($penjualan->metode_pembayaran) }}</td>
                            <td class="border">
                                @if($penjualan->status == 'paid')
                                <span class="badge bg-success text-white">Lunas</span>

                                @elseif($penjualan->status == 'pending')
                                    <span class="badge bg-warning">Menunggu</span>
                                @else
                                    <span class="badge bg-danger">Gagal</span>
                                @endif
                            </td>
                            <td class="border">
                                <div class="d-flex justify-content-center gap-2">
                                    @can('admin')
                                    <a href="{{ route('penjualans.edit', $penjualan->penjualan_id) }}" 
                                        class="btn btn-info btn-sm shadow-sm px-3">
                                        <i class="fas fa-edit text-dark"></i> <span class="text-white fw-normal ms-1">Edit</span>
                                     </a>
                                     
                                     
                                     <form action="{{ route('penjualans.destroy', $penjualan->penjualan_id) }}" 
                                        method="POST" onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <button type="submit" class="btn btn-danger btn-sm shadow-sm px-3">
                                        <i class="fas fa-trash-alt text-dark"></i> <span class="text-white fw-normal ms-1">Hapus</span>
                                    </button>
                                    
                                  </form>
                                  
                                    @endcan
                                    <a href="{{ route('penjualans.show', $penjualan->penjualan_id) }}" 
                                        class="btn btn-warning btn-sm shadow-sm px-3">
                                        <i class="fas fa-eye text-dark"></i> <span class="text-white fw-normal ms-1">Struk</span>
                                     </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-start mt-3">
            <h5 class="fw-semibold text-dark">Total Penjualan: {{ $penjualans->count() }}</h5>
        </div>
    </div>
</div>

<!-- SweetAlert2 Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if(session('success'))
            Swal.fire({
                title: "Sukses!",
                text: "{{ session('success') }}",
                icon: "success",
                timer: 2500,
                showConfirmButton: false
            });
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
