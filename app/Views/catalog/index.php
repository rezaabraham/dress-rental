<?= $this->extend('_layouts/_catalog/_main') ?>
<?= $this->section('content') ?>

<?php if (!empty($products)): ?>
	<?php foreach ($products as $product): ?>
		<!--begin::Col-->
		<div class="col-sm-4 mb-5">
			<!--begin::Card widget 14-->
			<div class="card card-flush h-xl-100">
				<!--begin::Body-->
				<div class="card-body text-center pb-5">
					<!--begin::Overlay-->
					<a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="<?=base_url('product/' . $product['master_product_code'])?>">
						<!--begin::Image-->
						<!-- <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7" style="height: 500px;background-image:url('assets/<?= ($product['product_thumbnail']?? 'products/no-image-svgrepo-com.svg') ?>')"></div> -->

						<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7" style="height: 500px;background-image:url('<?= site_url('media/show/'.$product['master_product_code'].'/'.$product['master_product_thumbnail']) ?>')"></div>
						<!--end::Image-->
					</a>
					<!--end::Overlay-->
					<!--begin::Info-->
					<div class="d-flex align-items-end flex-stack mb-5">
						<!--begin::Title-->
						<div class="text-start">
							<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-2 d-block"><?= $product['master_product_name'] ?></span>
							<span class="text-gray-500 mt-1 fw-bold fs-6">By <?= $product['brand_name'] ?></span>
						</div>
						<!--end::Title-->
					</div>
					<!--end::Info-->
					<!--begin::Info-->
					<div class="d-flex align-items-end flex-stack mb-5">
						<!--begin::Title-->
						<div class="text-start">
							<span class="text-gray-500 mt-1 fw-bold fs-4">Fit <?= esc($product['master_size_name'] ?? 'Tidak diketahui') ?></span>
						</div>
						<!--end::Title-->
					</div>
					<!--end::Info-->
					<!--begin::Info-->
					<div class="d-flex align-items-end flex-stack mb-1">
						<!--begin::Title-->
						<div class="text-start">
							<span class="mt-1 fw-bold fs-4"><?= 'Rp. '.number_format($product['master_product_price'], 0, ',', '.') ?></span>
						</div>
						<!--end::Title-->
					</div>
					<!--end::Info-->
				</div>
				<!--end::Body-->

			</div>
			<!--end::Card widget 14-->
		</div>
		<!--end::Col-->
	<?php endforeach ?>
<?php else: ?>
	<div><?= "Tidak ada" ?></div>
<?php endif ?>
<?= $this->endSection() ?>