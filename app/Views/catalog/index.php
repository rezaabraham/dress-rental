<?= $this->extend('_layouts/_catalog/_main') ?>
<?= $this->section('content') ?>
<div id="kt_app_content" class="app-content  flex-column-fluid ">
	<div class="row g-5 g-xl-10 mb-5 mb-xl-0">
		<?php if (!empty($products)): ?>
			<?php foreach ($products as $product): ?>
				<div class="col-md-4 mb-xl-10">
					<div class="card card-flush h-xl-100">
						<div class="card-body pb-5 ribbon ribbon-end ribbon-clip">
							<div class="ribbon-label" style="top: 12% !important;">
								New Arrival
								<span class="ribbon-inner bg-success"></span>
							</div>
							<a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="#">
								<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7" style="height: 266px;background-image:url('<?= site_url('media/show/' . $product['master_product_code'] . '/' . $product['master_product_thumbnail']) ?>')">
								</div>
								<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
									<i class="ki-duotone ki-eye fs-3x text-white"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
								</div>
							</a>
							<div class="text-start">
								<span class="badge badge-light-warning fs-base mb-2 px-5">
									<?= $product['master_product_tag'] ?>
								</span>
							</div>
							<div class="d-flex align-items-end flex-stack mb-1">
								<div class="text-start">
									<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 d-block"><?= $product['master_product_name'] ?></span>
									<span class="text-gray-500 mt-0 fw-bold fs-5"><?= 'Rp. ' . number_format($product['master_product_price'], 0, ',', '.') . ' <span class="fw-light">/ 1-' . $product['master_product_rental_period'] . ' hari</span>' ?></span>
								</div>
							</div>
						</div>
						<div class="card-footer d-flex flex-stack pt-0">
							<a class="btn btn-sm btn-danger flex-shrink-0 me-2" data-bs-target="#kt_modal_bidding" data-bs-toggle="modal">Pesan Sekarang</a>
							<a class="btn btn-sm btn-primary flex-shrink-0" href="#">Lihat Detail</a>
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
							<a href="" class="btn btn-sm btn-dark fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">
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