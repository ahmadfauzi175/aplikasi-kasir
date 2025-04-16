<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Penjualan;
use App\DetailPenjualan;
use App\Produk;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Cek apakah query tidak kosong
        if (!$query) {
            return redirect()->back()->with('error', 'Masukkan kata kunci pencarian.');
        }
    
        // Pencarian di tabel Pelanggan
        $pelanggans = Pelanggan::where('nama_pelanggan', 'LIKE', "%{$query}%")
            ->orWhere('alamat', 'LIKE', "%{$query}%")
            ->orWhere('nomor_telepon', 'LIKE', "%{$query}%")
            ->paginate(10);  // Ganti get() dengan paginate(10)
    
        // Pencarian di tabel Penjualan
        $penjualans = Penjualan::where('tanggal_penjualan', 'LIKE', "%{$query}%")
            ->orWhere('total_bayar', 'LIKE', "%{$query}%")
            ->paginate(10);  // Ganti get() dengan paginate(10)
    
        // Pencarian di tabel Produk
        $produks = Produk::where('nama_produk', 'LIKE', "%{$query}%")
            ->orWhere('harga', 'LIKE', "%{$query}%")
            ->orWhere('stok', 'LIKE', "%{$query}%")
            ->paginate(10);  // Ganti get() dengan paginate(10)
    
        return view('search.results', compact('pelanggans', 'penjualans', 'produks'));
    }
}