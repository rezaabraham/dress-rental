<?= $this->extend('_layouts/_admin/_main') ?>
<?= $this->section('content') ?>

<div class="card card-flush">

    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <!--begin::Card title-->
        <div class="card-title">
            <form action="<?= site_url('product/') ?>" method="get">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Cari..." name="keyword" />
                </div>
                <!--end::Search-->
            </form>
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

            <!--begin::Add product-->
            <a href="<?= base_url('product-create') ?>" class="btn btn-primary">+ Item</a>
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
                    <th class="min-w-200px">Item</th>
                    <th class="min-w-100px">Kode</th>
                    <th class="min-w-100px">Warna</th>
                    <th class="min-w-100px">Ukuran</th>
                    <th class="text-end min-w-100px">Biaya Sewa</th>
                    <th class="text-end min-w-70px">Aksi</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                <?php if (empty($products)): ?>
                    <?= 'Belum ada data.' ?>
                <?php else: ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="#" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(<?=site_url('media/show/'.$product['master_product_code'].'/'.$product['master_product_thumbnail'])  ?>);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name"><?= $product['master_product_name'] ?></a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="pe-0">
                                <span class="fw-bold"><?= $product['master_product_code'] ?></span>
                            </td>
                            <td class="pe-0">
                                <span class="fw-bold"><?= $product['master_product_colour'] ?></span>
                            </td>
                            <td class="pe-0">
                                <span class="fw-bold"><?= $product['master_product_size'] ?></span>
                            </td>

                            <td class="text-end pe-0"><?= 'Rp. ' . number_format($product['master_product_price'], 0, ',', '.') ?></td>


                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Aksi
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="<?= site_url('product/edit/'.$product['master_product_id']) ?>" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row" onclick="confirmDelete(<?= $product['master_product_id'] ?>)">Hapus</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
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
<script>
    function confirmDelete(productId) {
        event.preventDefault();
        //alert(productId);
        Swal.fire({
            title: 'Apakah Anda yakin?',
            //text: 'Produk ini akan dinonaktifkan, bukan dihapus permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("<?= site_url('products/delete/') ?>" + productId, {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Dinonaktifkan!', data.message, 'success').then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Gagal!', data.message, 'error');
                        }
                    })
                    .catch(error => {
                        Swal.fire('Error!', 'Terjadi kesalahan saat memproses.', 'error');
                    });
            }
        });
    }
</script>
<?= $this->endSection() ?>