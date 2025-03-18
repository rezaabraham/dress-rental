<?= $this->extend('_layouts/_admin/_main') ?>
<?= $this->section('content') ?>

<!--begin::Content-->
<div class="d-flex flex-column flex-center text-center p-10">
	<!--begin::Wrapper-->
	<div class="card card-flush w-lg-650px py-5">
		<div class="card-body py-15 py-lg-20">
			<!--begin::Logo-->
			<div class="mb-13">
				<a href="index.html" class="">
					<img alt="Logo" src="assets/media/logos/custom-2.svg" class="h-40px" />
				</a>
			</div>
			<!--end::Logo-->
			<!--begin::Title-->
			<h1 class="fw-bolder text-gray-900 mb-7">Coming Soon</h1>
			<!--end::Title-->

			<!--begin::Text-->
			<div class="fw-semibold fs-6 text-gray-500 mb-7">This is your opportunity to get creative amazing opportunaties
				<br />that gives readers an idea
			</div>
			<!--end::Text-->
		</div>
	</div>
	<!--end::Wrapper-->
</div>
<!--end::Content-->

<?= $this->endSection() ?>