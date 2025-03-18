<?= $this->extend('_layouts/_admin/_main') ?>
<?= $this->section('content') ?>

<div class="card card-flush">

    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <!--begin::Card title-->
        <div class="card-title">
            <form action="<?= site_url('brand') ?>" method="get">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Brands..." name="keyword" />
                </div>
                <!--end::Search-->
            </form>
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

            <!--begin::Add product-->
            <a href="<?= site_url('brand/create') ?>" class="btn btn-primary" onclick="alert('Belum Tersedia');return false;">Add Brand</a>
            <!--end::Add product-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
            <thead>
                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-200px">Brand Name</th>
                    <th class="min-w-100px">Brand Code</th>
                    <th class="text-end min-w-70px">Actions</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                <?php if (empty($brands)): ?>
                    <tr>
                    <td colspan="3" class="text-center"> <?= 'Belum ada data.' ?> </td>
                        
                    </tr>
                <?php else: ?>
                    <?php foreach ($brands as $brand): ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name"><?= $brand['brand_name'] ?></a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="pe-0">
                                <span class="fw-bold"><?= $brand['brand_code'] ?></span>
                            </td>

                            <td class="text-end">
                                <button class="btn btn-sm btn-light-primary me-5" onclick="alert('Belum Tersedia');return false;">Edit</button>
                                <button class="btn btn-sm btn-light-danger" onclick="alert('Belum Tersedia');return false;">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>
<?= $this->endSection() ?>