<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<!-- Gambar Produk -->
<div class="col-md-4">
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/dress/dress-1.jpg" class="d-block w-100 rounded" alt="Clara Set Maroon 1">
            </div>
            <div class="carousel-item">
                <img src="assets/dress/dress-2.jpeg" class="d-block w-100 rounded" alt="Clara Set Maroon 2">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
</div>
<!-- Detail Produk -->
<div class="col-md-8">
    <h2>Clara Set Maroon</h2>
    <p class="text-muted">By Touchup Atelier</p>
    <h4 class="text-primary">Rp 250.000 <small class="text-muted">/ 1-3 Days</small></h4>
    <span class="badge bg-success">Hijab Friendly</span>
    <p class="mt-3"><strong>Fit:</strong> S~M</p>
    <p><strong>Includes:</strong> Inner, Outer, Flare Satin Skirt, Belt + Laundry</p>

    <h5>Size & Measurement:</h5>
    <ul>
        <li><strong>Inner:</strong> Bust 92 cm, Length Lining 55 cm, Outer 63 cm</li>
        <li><strong>Skirt:</strong> LP 70-78 cm, Hips 96 cm, Length 90 cm</li>
    </ul>

    <h5>Pricing & Stock:</h5>
    <p><strong>Deposit:</strong> Rp 120.000</p>
    <p><strong>Extra Days:</strong> Rp 50.000 / Day</p>
    <p><strong>Stock:</strong> 1 / 1</p>

    <h5>Product Details:</h5>
    <p><strong>Code:</strong> TC059</p>
    <p><strong>Color:</strong> Red/Maroon/Terracotta</p>

    <button class="btn btn-primary mt-3">Rent Now</button>
</div>

<?= $this->endSection() ?>