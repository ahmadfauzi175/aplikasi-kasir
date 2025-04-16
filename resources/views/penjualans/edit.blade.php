@extends('template')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container mt-5">
    <div class="card shadow-lg p-5 border-0 rounded-4" style="background: linear-gradient(135deg, #cfd9df, #e2ebf0);">
        <h2 class="text-center text-primary mb-4 fw-bold animate__animated animate__fadeInDown">Edit Penjualan</h2>

        @if(session('error'))
            <div class="alert alert-danger animate__animated animate__shakeX">{{ session('error') }}</div>
        @endif

        <form id="edit-form" action="{{ route('penjualans.update', $penjualan->penjualan_id) }}" method="POST" class="animate__animated animate__fadeInUp">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            
            <div class="mb-4">
                <label class="form-label fw-semibold">Pelanggan</label>
                <select name="pelanggan_id" class="form-control shadow-sm border-0 rounded-3">
                    <option value="">Pilih Pelanggan (Opsional)</option>
                    @foreach($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->pelanggan_id }}" {{ $penjualan->pelanggan_id == $pelanggan->pelanggan_id ? 'selected' : '' }}>
                            {{ $pelanggan->nama_pelanggan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Produk</label>
                <div id="produk-list">
                    <div class="produk-item d-flex align-items-center mb-2">
                        <select name="produk_id[]" class="form-control produk-select" required onchange="updateSubtotal(this)">
                            <option value="">Pilih Produk</option>
                            @foreach($produks as $produk)
                                <option value="{{ $produk->produk_id }}" data-harga="{{ $produk->harga }}">
                                    {{ $produk->nama_produk }} - Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                        <input type="number" name="jumlah[]" class="form-control ml-2 jumlah-input" placeholder="Jumlah" min="1" required oninput="updateSubtotal(this)">
                        <div class="col-md-3">
                            <button type="button" class="btn btn-danger remove-produk">Hapus</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-primary mt-2" onclick="tambahProduk()">Tambah Produk</button>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Jumlah Bayar</label>
                <input type="number" name="jumlah_bayar" class="form-control shadow-sm border-0 rounded-3" value="{{ $penjualan->jumlah_bayar }}" min="0" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Metode Pembayaran</label>
                <select name="metode_pembayaran" class="form-control shadow-sm border-0 rounded-3">
                    <option value="cash" {{ $penjualan->metode_pembayaran == 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="transfer" {{ $penjualan->metode_pembayaran == 'transfer' ? 'selected' : '' }}>Transfer</option>
                    <option value="credit_card" {{ $penjualan->metode_pembayaran == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                    <option value="e_wallet" {{ $penjualan->metode_pembayaran == 'e_wallet' ? 'selected' : '' }}>E-Wallet</option>
                </select>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill shadow-lg btn-hover">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('penjualans.index') }}" class="btn btn-outline-secondary px-5 py-2 rounded-pill shadow-lg btn-hover">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function tambahProduk() {
    let produkList = document.getElementById("produk-list");
    let produkItem = document.createElement("div");
    produkItem.className = "produk-item d-flex align-items-center mb-2";

    produkItem.innerHTML = `
        <select name="produk_id[]" class="form-control produk-select" required onchange="updateSubtotal(this)">
            <option value="">Pilih Produk</option>
            @foreach($produks as $produk)
                <option value="{{ $produk->produk_id }}" data-harga="{{ $produk->harga }}">
                    {{ $produk->nama_produk }} - Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </option>
            @endforeach
        </select>
        <input type="number" name="jumlah[]" class="form-control ml-2 jumlah-input" placeholder="Jumlah" min="1" required oninput="updateSubtotal(this)">
        <input type="text" name="subtotal[]" class="form-control ml-2 subtotal-input" placeholder="Subtotal" readonly>
        <button type="button" class="btn btn-danger ml-2" onclick="hapusProduk(this)">X</button>
    `;

    produkList.appendChild(produkItem);
}

function hapusProduk(button) {
    button.parentElement.remove();
    hitungTotal();
}

function updateSubtotal(element) {
    let produkItem = element.closest(".produk-item");
    let produkSelect = produkItem.querySelector(".produk-select");
    let jumlahInput = produkItem.querySelector(".jumlah-input");
    let subtotalInput = produkItem.querySelector(".subtotal-input");

    let harga = produkSelect.options[produkSelect.selectedIndex].getAttribute("data-harga");
    let jumlah = jumlahInput.value;

    if (harga && jumlah) {
        subtotalInput.value = harga * jumlah;
    } else {
        subtotalInput.value = 0;
    }
    hitungTotal();
}

function hitungTotal() {
    let total = 0;
    let subtotalInputs = document.querySelectorAll(".subtotal-input");

    subtotalInputs.forEach(subtotal => {
        total += parseInt(subtotal.value) || 0;
    });
    // Bisa ditambahkan input total_bayar jika diperlukan
}

document.getElementById("edit-form").addEventListener("submit", function (e) {
    e.preventDefault();
    Swal.fire({
        title: "Yakin ingin menyimpan perubahan?",
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
@endsection
