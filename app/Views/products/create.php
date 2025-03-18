<?= $this->extend('_layouts/_admin/_main') ?>
<?= $this->section('content') ?>
<form id="form-product" class="form d-flex flex-column flex-lg-row" action="<?= site_url('admin/product/store') ?>" method="post" enctype="multipart/form-data">
    <!--begin::Aside column-->
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <!--begin::Thumbnail settings-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Thumbnail</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body text-center pt-0">
                <!--begin::Image input-->
                <!--begin::Image input placeholder-->
                <style>
                    .image-input-placeholder {
                        background-image: url('assets/media/svg/files/blank-image.svg');
                    }

                    [data-bs-theme="dark"] .image-input-placeholder {
                        background-image: url('assets/media/svg/files/blank-image-dark.svg');
                    }
                </style>
                <!--end::Image input placeholder-->
                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-150px h-150px"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="ki-duotone ki-pencil fs-7">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <!--begin::Inputs-->
                        <input type="file" name="product_thumbnail" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="avatar_remove" />
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="ki-duotone ki-cross fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="ki-duotone ki-cross fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
                <!--end::Description-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Thumbnail settings-->

        <!--begin::Category & tags-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Dress Details</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <!--begin::Label-->
                <label class="form-label">Brand</label>
                <!--end::Label-->
                <!--begin::Select2-->
                <select class="form-select mb-2" id="productBrand" name="product_brand" data-placeholder="Select an option">
                    <option disabled selected>-- Pilih Brand --</option>
                    <?php foreach ($brands as $brand): ?>
                        <option value=<?= $brand['brand_id'] ?>><?= $brand['brand_name'] ?></option>
                    <?php endforeach ?>
                </select>
                <!--end::Select2-->
                <!--begin::Description-->
                <div class="text-muted fs-7 mb-7"></div>
                <!--end::Description-->
                <!--end::Input group-->
                <!--begin::Button-->
                <button type="button" class="btn btn-light-primary btn-sm mb-10" data-bs-toggle="modal" data-bs-target="#addBrandModal"><i class="ki-duotone ki-plus fs-2"></i>Brand</button>
                <!--end::Button-->
                <!--begin::Input group-->
                <!--begin::Label-->
                <!-- <label class="form-label d-block">Tags</label> -->
                <!--end::Label-->
                <!--begin::Input-->
                <!-- <input id="kt_ecommerce_add_product_tags" name="kt_ecommerce_add_product_tags" class="form-control mb-2" value="" /> -->
                <!--end::Input-->
                <!--begin::Description-->
                <!-- <div class="text-muted fs-7">Add tags to a product.</div> -->
                <!--end::Description-->
                <!--end::Input group-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Category & tags-->
    </div>
    <!--end::Aside column-->
    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <!--begin:::Tabs-->
        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
            <!--begin:::Tab item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">General</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>
            </li>
            <!--end:::Tab item-->
        </ul>
        <!--end:::Tabs-->
        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Dress Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="product_name" class="form-control mb-2" placeholder="Product name" value="Test_<?= date('Ymdhis') ?>" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <!-- <div class="text-muted fs-7">A product name is required and recommended to be unique.</div> -->
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label">Description</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <!-- <div id="product_description" name="product_description" class="min-h-200px mb-2"></div> -->
                                <textarea id="product_description" name="product_description" class="form-control">
                                </textarea>
                                <!--end::Editor-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                    <!--begin::Media-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Media</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="fv-row mb-2">
                                <!--begin::Dropzone-->
                                <div class="dropzone" id="gallery">
                                    <!--begin::Message-->
                                    <div class="dz-message needsclick">
                                        <!--begin::Icon-->
                                        <i class="ki-duotone ki-file-up text-primary fs-3x">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <!--end::Icon-->
                                        <!--begin::Info-->
                                        <div class="ms-4">
                                            <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                            <span class="fs-7 fw-semibold text-gray-500">Upload up to 10 files</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                </div>
                                <!--end::Dropzone-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Description-->
                            <!-- <div class="text-muted fs-7">Set the dress media gallery.</div> -->
                            <!--end::Description-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Media-->
                    <!--begin::Pricing-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Pricing</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Base Price</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="product_price" class="form-control mb-2" placeholder="Product price" value="" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <!-- <div class="text-muted fs-7">Set the product price.</div> -->
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Pricing-->
                </div>
            </div>
            <!--end::Tab pane-->
            <!--begin::Tab pane-->
            <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <!--begin::Inventory-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Attributes</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">

                            <div class="row">
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Color</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div class="d-flex gap-3">
                                            <select class="form-select" name="product_colour" data-placeholder="Select a variation" data-kt-ecommerce-catalog-add-product="product_option">
                                                <option>-- Choose Colour --</option>
                                                <?php foreach ($colours as $colour): ?>
                                                    <option value="<?= $colour['colour_id'] ?>"><?= $colour['colour_name'] ?></option>
                                                <?php endforeach ?>
                                            </select>

                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Size</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div class="d-flex gap-3">
                                            <select class="form-select" name="product_size" data-placeholder="Select a variation" data-kt-ecommerce-catalog-add-product="product_option">
                                                <option>-- Choose Size --</option>
                                                <?php foreach ($sizes as $size): ?>
                                                    <option value="<?= $size['size_id'] ?>"><?= $size['size_name'] ?></option>
                                                <?php endforeach ?>
                                            </select>

                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>

                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Inventory-->
                    <!--begin::Meta options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Meta Options</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label">Days for Rents</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" class="form-control mb-2" name="product_rental_period" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <!-- <div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise keywords.</div> -->
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label">Extra Days Charge</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <input id="kt_ecommerce_add_product_meta_keywords" name="product_extra_days_price" class="form-control mb-2" />
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <!-- <div class="text-muted fs-7">Set a list of keywords that the product is related to. Separate the keywords by adding a comma
                                    <code>,</code>between each keyword.
                                </div> -->
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Meta options-->
                </div>
            </div>
            <!--end::Tab pane-->
        </div>
        <!--end::Tab content-->
        <div class="d-flex justify-content-end">
            <!--begin::Button-->
            <a href="<?= site_url('admin/product') ?>" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                <span class="indicator-label">Save Changes</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Button-->
        </div>
    </div>
    <!--end::Main column-->
</form>

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

        Swal.fire({
            title: 'Menyimpan...',
            text: 'Mohon tunggu sebentar',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        if (brandName === "" || brandCode === "") {
            errorDiv.textContent = "Nama dan kode brand tidak boleh kosong!";
            return;
        }

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
                    let newOption = document.createElement("option");
                    newOption.value = data.brand_id;
                    newOption.textContent = brandName;
                    document.getElementById("productBrand").appendChild(newOption);
                    document.getElementById("productBrand").value = data.brand_id;
                    document.getElementById("brandName").value = "";
                    document.getElementById("brandCode").value = "";
                    errorDiv.textContent = "";

                    Swal.fire({
                        icon: 'success',
                        title: 'Brand Ditambahkan',
                        text: 'Brand berhasil ditambahkan ke daftar!',
                        timer: 2000,
                        showConfirmButton: false
                    });

                    let modal = bootstrap.Modal.getInstance(document.getElementById("addBrandModal"));
                    modal.hide();
                } else {
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