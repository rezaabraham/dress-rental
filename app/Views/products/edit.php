<?= $this->extend('_layouts/_admin/_main') ?>
<?= $this->section('content') ?>

<form id="form-product" class="form d-flex flex-column flex-lg-row" action="<?= site_url('product/update/' . $product['master_product_id']) ?>" method="post" enctype="multipart/form-data">
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
                        background-image: url('media/show/<?= $product['master_product_code'] ?>/<?= $product['master_product_thumbnail'] ?>');
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
        <div class="card card-flush py-4" data-kt-sticky=true>
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Item Attribute</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <!--begin::Label-->
                <label class="form-label">Tipe</label>
                <!--end::Label-->
                <!--begin::Select2-->
                <select class="form-select mb-2" name="product_type" data-placeholder="Select an option">
                    <option disabled selected>Pilih Tipe</option>
                    <?php foreach ($types as $type): ?>
                        <option value="<?= $type['master_attire_type_id'] ?>" <?= ($type['master_attire_type_id'] == $product['master_product_type']) ? 'selected' : '' ?>><?= $type['master_attire_type_name'] ?></option>
                    <?php endforeach ?>
                </select>
                <!--end::Select2-->
                <!--begin::Description-->
                <div class="text-muted fs-7 mb-7"></div>
                <!--end::Description-->
                <!--end::Input group-->
                <!--begin::Input group-->
                <!--begin::Label-->
                <label class="form-label">Brand</label>
                <!--end::Label-->
                <!--begin::Select2-->
                <select class="form-select mb-2" id="productBrand" name="product_brand" data-placeholder="Select an option">
                    <option disabled selected>Pilih Brand</option>
                    <?php foreach ($brands as $brand): ?>
                        <option value=<?= $brand['brand_id'] ?> <?= ($brand['brand_id'] == $product['master_product_brand']) ? 'selected' : '' ?>><?= $brand['brand_name'] ?></option>
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
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Warna</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <div class="d-flex gap-3">
                        <select class="form-select" name="product_colour[]" data-control="select2" data-close-on-select="false" data-placeholder="Pilih warna" data-allow-clear="true" multiple="multiple">
                            <option></option>
                            <?php foreach ($colours as $colour): ?>
                                <option value="<?= $colour['colour_name'] ?>" <?= (in_array($colour['colour_name'], $productColours)) ? 'selected' : '' ?>><?= $colour['colour_name'] ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <!--begin::Label-->
                <label class="form-label">Tag</label>
                <!--end::Label-->
                <!--begin::Select2-->
                <select class="form-select mb-2" name="product_tag" data-placeholder="Select an option">
                    <option disabled selected>Pilih Tag</option>
                    <?php foreach ($tags as $tag): ?>
                        <option value="<?= $tag['master_tag_name'] ?>" <?= ($tag['master_tag_name'] == $product['master_product_tag'] ? 'selected' : '') ?>><?= $tag['master_tag_name'] ?></option>
                    <?php endforeach ?>
                </select>
                <!--end::Select2-->
                <!--begin::Description-->
                <div class="text-muted fs-7 mb-7"></div>
                <!--end::Description-->
                <!--end::Input group-->

                <!--begin::Row-->
                <!--begin::Label-->
                <label class="required form-label">Ukuran</label>
                <!--end::Label-->
                <div class="row mw-500px mb-5">
                    <?php foreach ($sizes as $size): ?>
                        <!--begin::Col-->
                        <div class="col-4">
                            <label class="form-check-image active">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="<?= $size['size_name'] ?>" name="product_size[]" <?= (in_array($size['size_name'], $productSizes) ? 'checked' : '') ?> />
                                    <div class="form-check-label">
                                        <?= $size['size_name'] ?>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <!--end::Col-->
                    <?php endforeach; ?>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Category & tags-->
    </div>
    <!--end::Aside column-->
    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
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
                                <h2>Data Item</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Nama Item</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="product_name" class="form-control mb-2" placeholder="Dress name" value="<?= $product['master_product_name'] ?>" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <!-- <div class="text-muted fs-7">A product name is required and recommended to be unique.</div> -->
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label">Deskripsi</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <!-- <div id="product_description" name="product_description" class="min-h-200px mb-2"></div> -->
                                <textarea id="product_description" name="product_description" class="form-control">
                                    <?= $product['master_product_desc'] ?>
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
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Buat Galeri Foto Item</label>
                                <input class="form-control" type="file" id="formFile" name="product_images[]" accept=".png, .jpg, .jpeg" multiple>
                            </div>
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
                                <h2>Biaya</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="row">
                                <!--begin::Input group-->
                                <div class="col fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">Biaya Sewa</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="product_price" class="form-control mb-2" placeholder="Product price" value="<?= $product['master_product_price'] ?>" />
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <!-- <div class="text-muted fs-7">Set the product price.</div> -->
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="col mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">Masa Sewa (Hari)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" class="form-control mb-2" name="product_rental_period" value="<?= $product['master_product_rental_period'] ?>" />
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <!-- <div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise keywords.</div> -->
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col">
                                    <!--begin::Label-->
                                    <label class="form-label">Biaya Extra</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <input id="kt_ecommerce_add_product_meta_keywords" type="number" name="product_extra_days_price" class="form-control mb-2" value="<?= $product['master_product_extra_days_price'] ?>" />
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <!-- <div class="text-muted fs-7">Set a list of keywords that the product is related to. Separate the keywords by adding a comma
                                    <code>,</code>between each keyword.
                                </div> -->
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                            </div>

                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Pricing-->
                </div>
            </div>
            <!--end::Tab pane-->

        </div>
        <!--end::Tab content-->
        <div class="d-flex justify-content-end">
            <!--begin::Button-->
            <a href="<?= site_url('product') ?>" id="kt_ecommerce_add_product_cancel" class="btn btn-secondary me-5">Batal</a>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">Mohon tunggu...
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

<?= $this->endSection() ?>

<?= $this->section('custom_js') ?>
<script>
    ClassicEditor
        .create(document.querySelector('#product_description'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
<?= $this->endSection() ?>