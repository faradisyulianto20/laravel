<div class="d-flex justify-content-around flex-wrap">
    <div class="card text-center mb-3" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Total Buku</h5>
        <p class="card-text">{{ $total_buku }}</p>
    </div>
    </div>

    <div class="card text-center mb-3" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Total Harga Semua Buku</h5>
        <p class="card-text">{{ "Rp. ".number_format($total_harga_buku, 2, ',', '.') }}</p>
    </div>
    </div>

    <div class="card text-center mb-3" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Harga Tertinggi</h5>
        <p class="card-text">{{ "Rp. ".number_format($buku_termahal, 2, ',', '.') }}</p>
    </div>
    </div>

    <div class="card text-center mb-3" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Harga Terendah</h5>
        <p class="card-text">{{ "Rp. ".number_format($buku_termurah, 2, ',', '.') }}</p>
    </div>
    </div>
</div>
