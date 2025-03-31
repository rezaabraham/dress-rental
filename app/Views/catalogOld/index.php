<?= $this->extend('_layouts/_catalog/_main') ?>
<?= $this->section('content') ?>

<style>
	/* body {
		font-family: Arial, sans-serif;
		background: #f2f2f2;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
	} */

	.card {
		position: relative;
		width: 300px;
		background: #fff;
		border-radius: 10px;
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
		overflow: hidden;
	}

	.card img {
		width: 100%;
		height: auto;
		aspect-ratio: 1 / 1;

		border-radius: 8px;
		object-fit: cover;
		object-position: top;
	}

	.image-wrapper {
		padding: 10px;
		/* display: flex;
		justify-content: center;
		align-items: center;
		height: 300px;*/
		/* cukup tinggi untuk portrait */
		/* background-color: #f9f9f9;  */
	}

	/* .image-wrapper img {
		max-height: 100%;
		max-width: 100%;
		object-fit: cover;
		border-radius: 8px;
	} */



	.card-content {
		padding: 15px;
	}

	.ribbon {
		width: 150px;
		background: #EAAC9C;
		color: white;
		text-align: center;
		line-height: 25px;
		font-size: 10px;
		font-weight: bold;
		position: absolute;
		top: 15px;
		right: -40px;
		transform: rotate(45deg);
		box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
	}

	/* .scalable-text {
		display: block;
		width: 100%;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;

		font-size: clamp(12px, 5vw, 20px);
	} */
</style>

<?php if (!empty($products)): ?>
	<?php foreach ($products as $product): ?>
		<div class="col-sm-6 col-lg-3 mb-5">
			<div class="card">
				<div class="ribbon">Hijab Friendly</div>
				<div class="image-wrapper">
					<img src="<?= site_url('media/show/' . $product['master_product_code'] . '/' . $product['master_product_thumbnail']) ?>" alt="Product Image">
				</div>
				<div class="card-content">
					<h3><?= $product['master_product_name'] ?></h3>
					<p><?= 'Rp. ' . number_format($product['master_product_price'], 0, ',', '.') ?></p>
				</div>
			</div>
		</div>
	<?php endforeach ?>
<?php else: ?>
	<div><?= "Tidak ada" ?></div>
<?php endif ?>










<?= $this->endSection() ?>