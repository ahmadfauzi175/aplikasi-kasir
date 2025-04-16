@extends('template')

@section('content')
    <div class="container mt-5">
        <h2>Hasil Pencarian</h2>

        @if($pelanggans->isEmpty() && $penjualans->isEmpty() && $produks->isEmpty())
            <div class="alert alert-danger" role="alert">
                Tidak ada hasil yang ditemukan.
            </div>
        @else
            <!-- Pelanggan -->
            @if($pelanggans->isNotEmpty())
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Pelanggan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggans as $pelanggan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pelanggan->nama_pelanggan }}</td>
                                        <td>{{ $pelanggan->alamat }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <!-- Penjualan -->
            @if($penjualans->isNotEmpty())
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Penjualan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal Penjualan</th>
                                    <th>Total Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualans as $penjualan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $penjualan->tanggal_penjualan }}</td>
                                        <td>Rp{{ number_format($penjualan->total_bayar, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <!-- Produk -->
            @if($produks->isNotEmpty())
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Produk</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $produk)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $produk->nama_produk }}</td>
                                        <td>Rp{{ number_format($produk->harga, 2) }}</td>
                                        <td>{{ $produk->stok }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        @endif

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            @if($pelanggans->isNotEmpty())
                {{ $pelanggans->links() }}
            @endif

            @if($penjualans->isNotEmpty())
                {{ $penjualans->links() }}
            @endif

            @if($produks->isNotEmpty())
                {{ $produks->links() }}
            @endif
        </div>
    </div>
@endsection
