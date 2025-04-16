@extends('template')

@section('content')
<div class="container">
    <div id="struk" class="receipt p-3">
        <h4 class="text-center">Struk Pembelian</h4>
        <hr>
        
        <p><strong>Kode Pembayaran:</strong> {{ $penjualan->kode_pembayaran }}</p>
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($penjualan->tanggal_penjualan)->timezone('Asia/Jakarta')->format('d-m-Y H:i:s') }}</p>
        <p><strong>Pelanggan:</strong> {{ $penjualan->pelanggan->nama_pelanggan ?? 'Umum' }}</p>
        <hr>

        <h5>Detail Produk</h5>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $produkList = json_decode($penjualan->produk_id, true);
                @endphp
                @if($produkList)
                    @foreach($produkList as $produk)
                        <tr>
                            <td>{{ $produk['nama_produk'] }}</td>
                            <td>{{ $produk['jumlah'] }}</td>
                            <td>Rp {{ number_format($produk['harga'], 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($produk['subtotal'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <hr>
        <p><strong>Total Bayar:</strong> Rp {{ number_format($penjualan->total_bayar, 0, ',', '.') }}</p>
        <p><strong>Jumlah Bayar:</strong> Rp {{ number_format($penjualan->jumlah_bayar, 0, ',', '.') }}</p>
        <p><strong>Kembalian:</strong> Rp {{ number_format($penjualan->kembalian, 0, ',', '.') }}</p>
        <p><strong>Metode Pembayaran:</strong> {{ ucfirst($penjualan->metode_pembayaran) }}</p>
        <p><strong>Status:</strong> 
            @if($penjualan->status == 'paid')
                <span class="badge badge-success">Lunas</span>
            @elseif($penjualan->status == 'pending')
                <span class="badge badge-warning">Menunggu</span>
            @else
                <span class="badge badge-danger">Gagal</span>
            @endif
        </p>

        <hr>
        <p class="text-center">Terima kasih atas pembelian Anda!</p>
        <p class="text-center">- Kasir -</p>
    </div>

    <center><button onclick="printStruk()" class="btn btn-primary mt-3">Print Struk</button></center>
</div>

<script>
    function printStruk() {
        var strukContent = document.getElementById('struk').innerHTML;
    
        var printWindow = window.open('', '', 'width=400,height=600');
        printWindow.document.write(`
            <html>
                <head>
                    <title>Struk Pembelian</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            font-size: 14px;
                            padding: 10px;
                        }
                        .receipt {
                            max-width: 350px;
                            margin: auto;
                            border: 1px solid #ddd;
                            padding: 15px;
                            background: #fff;
                        }
                        .receipt h4 {
                            margin-bottom: 10px;
                            text-align: center;
                        }
                        .receipt p {
                            margin: 2px 0;
                        }
                        .receipt table {
                            width: 100%;
                            font-size: 12px;
                            border-collapse: collapse;
                        }
                        .receipt table th,
                        .receipt table td {
                            border-bottom: 1px dashed #ccc;
                            padding: 4px 0;
                            text-align: left;
                        }
                        .badge {
                            padding: 2px 6px;
                            border-radius: 4px;
                            font-size: 11px;
                        }
                        .badge-success {
                            background-color: #28a745;
                            color: white;
                        }
                        .badge-warning {
                            background-color: #ffc107;
                            color: black;
                        }
                        .badge-danger {
                            background-color: #dc3545;
                            color: white;
                        }
                    </style>
                </head>
                <body onload="window.print(); window.close();">
                    <div class="receipt">
                        ${strukContent}
                    </div>
                </body>
            </html>
        `);
        printWindow.document.close();
    }
    </script>
    

<style>
    .receipt {
        max-width: 350px;
        margin: auto;
        border: 1px solid #ddd;
        padding: 15px;
        background: #fff;
        font-size: 14px;
    }
    .receipt h4 {
        margin-bottom: 10px;
    }
    .receipt p {
        margin: 2px 0;
    }
    .receipt table {
        width: 100%;
        font-size: 12px;
    }
    @media print {
        body * {
            visibility: hidden;
        }
        #struk, #struk * {
            visibility: visible;
        }
        #struk {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        button {
            display: none;
        }
    }
</style>
@endsection