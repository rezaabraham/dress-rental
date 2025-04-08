<?= $this->extend('_layouts/_catalog/_main') ?>
<?= $this->section('content') ?>
<div id="kt_app_content" class="app-content  flex-column-fluid ">
	<div class="row g-5 g-lg-10 mb-5">
		<?php if (!empty($products)): ?>
			<?php foreach ($products as $product): ?>
				<div class="col-lg-3 col-6 mb-2">
					<a href="<?= site_url('product/' . $product['master_product_code']) ?>" class="text-decoration-none text-dark">
						<div class="card card-flush h-100">
							<div class="card-header ribbon ribbon-start p-0">
								<?= date_diff(date_create(), date_create($product['master_product_created_at']))->d <= 5 ? '<div class="ribbon-label bg-success ps-3 pe-4 py-1 fs-9 fs-lg-5" style="top:0%;">New Arrival</div>' : null ?>
								<div class="ratio ratio-1x1 position-relative">
									<img src="<?= site_url('media/show/' . $product['master_product_code'] . '/' . $product['master_product_thumbnail']) ?>" class="rounded object-fit-cover" style="object-position: top;" alt="<?= $product['master_product_name'] ?>">
								</div>
							</div>
							<div class="card-body px-3 pb-3 pt-1 gap-3 p-lg-5 d-flex flex-column justify-content-between">
								<?php if ($product['master_attire_type_name'] == 'Hijab'): ?>
									<div class="text-start">

										<span class="badge badge-light-warning fs-9 fs-lg-6 px-3 fw-normal">
											Hijab Friendly
										</span>
									</div>
								<?php endif ?>
								<div class="text-start">
									<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-7 fs-lg-4 d-block lh-1"><?= strlen($product['master_product_name']) < 20 ? $product['master_product_name'] : substr($product['master_product_name'], 0, 17) . '...' ?></span>
									<span class="text-gray-600 mt-0 fw-bold fs-7 fs-lg-4"><?= 'Rp. ' . number_format($product['master_product_price'], 0, ',', '.') . ' <span class="fw-light">/ 1-' . $product['master_product_rental_period'] . ' hari</span>' ?></span>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach ?>
		<?php else: ?>
			<div class="card card-flush h-md-100">
				<div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%; background-image:url('assets/media/stock/900x600/42.png')">
					<div class="mb-10">
						<div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
							<span class="me-2">
								Mohon maaf, yang kamu cari belum tersedia atau
								<br>
								<span class="position-relative d-inline-block text-danger">
									<a href="#" class="text-danger opacity-75-hover">terjadi kesalahan</a>
									<span class="position-absolute opacity-15 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
								</span>
							</span>
							silahkan kembali beberapa saat lagi.
						</div>
						<div class="text-center">
							<a href="<?= base_url() ?>" class="btn btn-sm btn-dark fw-bold">
								Coba Lagi
							</a>
						</div>
					</div>
					<img class="mx-auto h-150px h-lg-200px  theme-light-show" src="assets/media/illustrations/misc/upgrade.svg" alt="">
					<img class="mx-auto h-150px h-lg-200px  theme-dark-show" src="assets/media/illustrations/misc/upgrade-dark.svg" alt="">
				</div>
			</div>
		<?php endif ?>
	</div>
	<ul class="pagination pagination-circle mt-10">
		<li class="page-item previous disabled"><a href="#" class="page-link"><i class="previous"></i></a></li>
		<li class="page-item active"><a href="#" class="page-link">1</a></li>
		<li class="page-item "><a href="#" class="page-link">2</a></li>
		<li class="page-item "><a href="#" class="page-link">3</a></li>
		<li class="page-item next"><a href="#" class="page-link"><i class="next"></i></a></li>
	</ul>
</div>

<?= $this->endSection() ?>