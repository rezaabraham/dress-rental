<?= $this->extend('_layouts/_catalog/_main') ?>
<?= $this->section('content') ?>

<!-- Gambar Produk -->
<div class="col-md-4">
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <?php if (!empty($product['images'])): ?>
                <?php foreach ($product['images'] as $index => $image): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <img src="<?= base_url('media/show/'.$product['master_product_code'].'/'.$image) ?>" class="d-block w-100 rounded" alt="<?= esc($product['master_product_name']) ?>">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/media/products/no-image-svgrepo-com.svg') ?>" class="d-block w-100 rounded" alt="No Image">
                </div>
            <?php endif ?>
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
    <h2><?= $product['master_product_name'] ?></h2>
    <p class="text-muted">By <?= $product['brand_name'] ?></p>
    <h4 class="text-primary"><?= 'Rp. ' . number_format($product['master_product_price'], 0, ',', '.') ?> <small class="text-muted">/ <?= $product['master_product_rental_period'].' Days'?></small></h4>
    <!-- <span class="badge bg-success">Hijab Friendly</span> -->
    <p class="mt-3"><strong>Fit:</strong> <?= $product['master_product_size'] ?></p>
    <p><?= $product['master_product_desc'] ?></p>

    <!-- <button class="btn btn-primary mt-3">Rent Now</button> -->
</div>

<?= $this->endSection() ?>