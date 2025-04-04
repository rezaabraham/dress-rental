<?= $this->extend('_layouts/_catalog/_main') ?>
<?= $this->section('content') ?>
<div id="kt_app_content" class="app-content  flex-column-fluid ">
	<div class="row g-5 g-xl-10 mb-5 mb-xl-0">
		<?php if (!empty($products)): ?>
			<?php foreach ($products as $product): ?>
				<div class="col-md-4 col-6">
					<div class="card card-flush h-100">
						<div class="card-header ribbon ribbon-top p-0">
							<div class="ribbon-label bg-success px-3 py-1">New Arrival</div>
							<div class="ratio ratio-1x1 position-relative">
								<img src="https://charinastudio.com/media/show/062/1743752954_6a75cd748183545dce4b.jpg" class="rounded object-fit-cover" style="object-position: top;" alt="Barang A">
							</div>
						</div>
						<div class="card-body p-3 gap-3 d-flex flex-column justify-content-between">
							<div class="text-start">
								<span class="badge badge-light-warning fs-7 px-3">
									<?= $product['master_product_tag'] ?>
								</span>
							</div>
							<div class="text-start">
								<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-7 d-block lh-1"><?= strlen($product['master_product_name']) < 20 ? $product['master_product_name'] : substr($product['master_product_name'], 0, 17) . '...' ?></span>
								<span class="text-gray-600 mt-0 fw-bold fs-7"><?= 'Rp. ' . number_format($product['master_product_price'], 0, ',', '.') . ' <span class="fw-light">/ 1-' . $product['master_product_rental_period'] . ' hari</span>' ?></span>
							</div>
						</div>
					</div>
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
</div>
<?= $this->endSection() ?>