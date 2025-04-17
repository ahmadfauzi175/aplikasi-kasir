@extends('template')

@section('content')
<div class="container">
    <h2 class="mb-4">Laporan Penjualan</h2>

    <!-- Tombol Filter -->
    <div class="dropdown mb-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Pilih Periode
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="{{ route('laporans.index', ['periode' => 'hari']) }}">Hari Ini</a></li>
            <li><a class="dropdown-item" href="{{ route('laporans.index', ['periode' => 'minggu']) }}">Minggu</a></li>
            <li><a class="dropdown-item" href="{{ route('laporans.index', ['periode' => 'bulan']) }}">Bulan</a></li>
            <li><a class="dropdown-item" href="{{ route('laporans.index', ['periode' => 'tahun']) }}">Tahun</a></li>
            <li><a class="dropdown-item" href="{{ route('laporans.index', ['periode' => 'semua']) }}">Semua</a></li>
        </ul>
    </div>

    <!-- Tabel Laporan -->
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Pembayaran</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Produk</th>
                    <th>Metode Pembayaran</th>
                    <th>Status</th>
                    <th>Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penjualans as $penjualan)
                    @if($penjualan->kode_pembayaran != '-')
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penjualan->kode_pembayaran }}</td>
                            <td>{{ date('d-m-Y', strtotime($penjualan->tanggal_penjualan)) }}</td>
                            <td>{{ $penjualan->pelanggan->nama_pelanggan ?? 'Umum' }}</td>
                            <td>
                                @php
                                    $produkList = json_decode($penjualan->produk_id, true);
                                    $produkString = $produkList ? implode(', ', array_map(function($produk) {
                                        return $produk['nama_produk'] . " ({$produk['jumlah']}x)";
                                    }, $produkList)) : '-';
                                @endphp
                                {{ $produkString }}
                            </td>
                            <td>{{ ucfirst($penjualan->metode_pembayaran) }}</td>
                            <td>
                                @if($penjualan->status == 'paid')
                                    <span class="badge bg-success text-white">Lunas</span>
                                @elseif($penjualan->status == 'pending')
                                    <span class="badge badge-warning">Menunggu</span>
                                @else
                                    <span class="badge badge-danger">Gagal</span>
                                @endif
                            </td>
                            <td>Rp {{ number_format($penjualan->total_bayar, 0, ',', '.') }}</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data penjualan untuk periode ini.</td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data penjualan.</td>
                    </tr>
                @endforelse
            </tbody>
            <!-- Baris Subtotal -->
            <tfoot>
                <tr>
                    <td colspan="6" class="text-end"><strong>Subtotal</strong></td>
                    <td colspan="2"><strong>Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</strong></td>
                </tr>
            </tfoot>
        </table>            
    </div> 

    <!-- Tombol Print Semua di Tengah -->
    <div class="d-flex justify-content-center mt-3">
        <button class="btn btn-primary" onclick="printStrukSemua()">Print Semua</button>
    </div>
</div>
@endsection


<!-- Script Print Seluruh Data -->  
<script>
    function printStrukSemua() {
        window.print();
    }
</script>

<style> 
    @media print {
        .dropdown, .btn-primary, 
        .sidebar,      /* jika sidebar punya class sidebar */
        aside,         /* jika sidebar pakai tag aside */
        nav,           /* jika sidebar pakai nav */
        .logo,
        .search,
        .menu,         /* kalau pakai class menu */
        .navbar,
        .left-panel {  /* tambahan jika struktur layout berbeda */
            display: none !important;
        }

        table {
            width: 100%;
        }
    }
</style>
