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
            <a href="<?= site_url('brand/create') ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brand</a>
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

<!-- Modal Tambah Brand -->
<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBrandModalLabel">Tambah Brand Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div>
                    <label for="brandName">Nama Brand</label>
                    <input type="text" id="brandName" class="form-control" placeholder="Masukkan nama brand baru">
                </div>
                <div>
                    <label for="brandName">Kode Brand</label>
                    <input type="text" id="brandCode" class="form-control" placeholder="Masukkan kode brand baru">
                </div>
                <div id="brandError" class="text-danger mt-2"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="saveBrand">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("saveBrand").addEventListener("click", function() {
        let brandName = document.getElementById("brandName").value.trim();
        let brandCode = document.getElementById("brandCode").value.trim();
        let errorDiv = document.getElementById("brandError");

        if (brandName === "" || brandCode === "") {
            errorDiv.textContent = "Nama dan kode brand tidak boleh kosong!";
            //return;
            return false;
        }

        Swal.fire({
            title: 'Menyimpan...',
            text: 'Mohon tunggu sebentar',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        fetch("<?= site_url('brand/store') ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                body: JSON.stringify({
                    brand_name: brandName,
                    brand_code: brandCode
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                   /*  document.getElementById("brandName").value = "";
                    document.getElementById("brandCode").value = "";
                    errorDiv.textContent = ""; */

                    Swal.fire({
                        icon: 'success',
                        title: 'Brand Ditambahkan',
                        text: 'Brand berhasil ditambahkan ke daftar!',
                        timer: 2000,
                        showConfirmButton: false
                    });

                    let modal = bootstrap.Modal.getInstance(document.getElementById("addBrandModal"));
                    modal.hide();
                    location.reload()
                } else {
                    errorDiv.textContent = "";
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Menambahkan Brand',
                        html: Object.values(data.message).join("<br>"),
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Gagal terhubung ke server!',
                });
            });
    });
</script>
<?= $this->endSection() ?>