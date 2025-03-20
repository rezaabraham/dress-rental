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
            <!-- <a href="<?= site_url('brand/create') ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brand</a> -->
            <button type="button" class="btn btn-primary" onclick="openModal()">+ Brand</button>
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
                                <button class="btn btn-sm btn-light-primary me-5 editBrandBtn"
                                    data-brand-id="<?= $brand['brand_id'] ?>"
                                    data-brand-name="<?= esc($brand['brand_name']) ?>"
                                    data-brand-code="<?= esc($brand['brand_code']) ?>">
                                    Edit
                                </button>
                                <button class="btn btn-sm btn-light-danger" onclick="confirmDelete(<?= $brand['brand_id'] ?>)">Hapus</button>
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


<div class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="brandModalLabel">Tambah Brand Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="brandForm" method="post" action="">
                    <input type="hidden" name="brandId" id="brandId">
                    <div>
                        <label for="brandName">Nama Brand</label>
                        <input type="text" id="brandName" class="form-control" placeholder="Masukkan nama brand baru">
                        <div class="invalid-feedback">Nama brand tidak boleh kosong.</div>
                    </div>
                    <div>
                        <label for="brandName">Kode Brand</label>
                        <input type="text" id="brandCode" class="form-control" placeholder="Masukkan kode brand baru">
                        <div class="invalid-feedback">Kode brand tidak boleh kosong.</div>
                    </div>
                    <div id="brandError" class="text-danger mt-2"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="saveBrand">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    var brandID = document.getElementById("brandId");
    var brandName = document.getElementById("brandName");
    var brandCode = document.getElementById("brandCode");

    document.addEventListener("DOMContentLoaded", function() {
        let editButtons = document.querySelectorAll(".editBrandBtn");
        editButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                let brandIdValue = this.getAttribute("data-brand-id");
                let brandNameValue = this.getAttribute("data-brand-name");
                let brandCodeValue = this.getAttribute("data-brand-code");


                // Isi nilai di dalam modal
                brandID.value = brandIdValue;
                brandName.value = brandNameValue;
                brandCode.value = brandCodeValue;
                document.getElementById("brandForm").setAttribute("action", "<?= site_url('brand/update') ?>/" + brandIdValue);

                // Ubah title modal
                document.getElementById("brandModalLabel").textContent = "Edit Brand";

                // Tampilkan modal Edit
                let brandModal = new bootstrap.Modal(document.getElementById("brandModal"));
                brandName.classList.remove("is-invalid");
                brandCode.classList.remove("is-invalid");
                brandModal.show();
            });
        });
    });

    function openModal() {
        brandID.value = "";
        brandName.value = "";
        brandCode.value = "";
        document.getElementById("brandForm").setAttribute("action", "<?= site_url('brand/store') ?>");

        document.getElementById("brandModalLabel").textContent = "Tambah Brand";

        let brandModal = new bootstrap.Modal(document.getElementById("brandModal"));
        brandName.classList.remove("is-invalid");
        brandCode.classList.remove("is-invalid");
        brandModal.show();
    }

    function confirmDelete(brandId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Brand ini akan dihapus!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("<?= site_url('brand/delete/') ?>" + brandId, {
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


    document.getElementById("brandForm").addEventListener("submit", function(event) {
        event.preventDefault();
        let form = event.target;

        //let brandId = document.getElementById("brandId").value;

        // Reset validasi
        brandName.classList.remove("is-invalid");
        brandCode.classList.remove("is-invalid");

        let hasError = false;

        if (brandName.value.trim() === "") {
            brandName.classList.add("is-invalid");
            hasError = true;
        }

        if (brandCode.value.trim() === "") {
            brandCode.classList.add("is-invalid");
            hasError = true;
        }

        if (hasError) return;


        fetch(form.getAttribute("action"), {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "X-Requested-With": "XMLHttpRequest"
                },
                body: "brand_name=" + brandName.value + "&brand_code=" + brandCode.value,

            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('Sukses!', data.message, 'success').then(() => {
                        location.reload();
                    });
                } else if (data.errors) {
                    let errorMessages = Object.values(data.errors).join("<br>");
                    Swal.fire({
                        icon: 'error',
                        title: 'Validasi Gagal!',
                        html: errorMessages // Menampilkan semua error dengan format HTML
                    });

                    // Tandai input yang error dengan border merah
                    // if (data.errors.brand_name) {
                    //     brandName.classList.add("is-invalid");
                    // }
                    // if (data.errors.brand_code) {
                    //     brandCode.classList.add("is-invalid");
                    // }
                } else {
                    Swal.fire('Gagal!', 'Brand gagal disimpan.', 'error');
                }
            })
            .catch(error => {
                Swal.fire('Error!', 'Terjadi kesalahan saat menyimpan data.', 'error');
            });


    });
</script>


<?= $this->endSection() ?>