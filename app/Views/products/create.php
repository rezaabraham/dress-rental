<?= $this->extend('_layouts/_admin/_main') ?>
<?= $this->section('content') ?>
<form id="form-product" class="form d-flex flex-column flex-lg-row" action="<?= site_url('product/store') ?>" method="post" enctype="multipart/form-data">
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
                <select class="form-select mb-2" name="product_type" data-placeholder="Select an option" required>
                    <option disabled selected>Pilih Tipe</option>
                    <?php

                    use Kint\Renderer\PlainRenderer;

                    foreach ($types as $type): ?>
                        <option value="<?= $type['master_attire_type_id'] ?>"><?= $type['master_attire_type_name'] ?></option>
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
                <select class="form-select mb-2" id="productBrand" name="product_brand" data-placeholder="Select an option" required>
                    <option disabled selected>Pilih Brand</option>
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
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Warna</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <div class="d-flex gap-3">
                        <select class="form-select create-tag" name="product_colour[]" data-control="select2" multiple="multiple" required>
                            <option></option>
                            <?php foreach ($colours as $colour): ?>
                                <option value="<?= $colour['colour_name'] ?>"><?= $colour['colour_name'] ?></option>
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
                <select class="form-select create-tag mb-2" name="product_tag[]" data-control="select2" multiple="multiple" data-placeholder="Pilih tag" required>
                    <option>Pilih Tag</option>
                    <?php foreach ($tags as $tag): ?>
                        <option value="<?= $tag['master_tag_name'] ?>"><?= $tag['master_tag_name'] ?></option>
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
                                    <input class="form-check-input" type="checkbox" value="<?= $size['size_name'] ?>" name="product_size[]" />
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
                                <input type="text" name="product_name" class="form-control mb-2" placeholder="Nama item baru" value="<?= old('product_name') ?>" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <!-- <div class="text-muted fs-7">A product name is required and recommended to be unique.</div> -->
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Kode Item</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="product_code" class="form-control mb-2" placeholder="000" value="<?= old('product_code') ?>" required />
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
                                <textarea id="product_description" name="product_description" class="form-control" required>
                                <?= old('product_desc') ?>
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
                                    <input type="number" name="product_price" class="form-control mb-2" placeholder="Product price" value="0" required />
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
                                    <input type="number" class="form-control mb-2" name="product_rental_period" value="1" required />
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
                                    <input id="kt_ecommerce_add_product_meta_keywords" type="number" name="product_extra_days_price" class="form-control mb-2" value="0" required />
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
            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary tg-load">
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
                <button type="button" class="btn btn-primary tg-load" id="saveBrand">Simpan</button>
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
<script>
    $(document).ready(function() {
        $('.create-tag').select2({
            tags: true,
            tokenSeparators: [','],
            //placeholder: "Pilih atau tambahkan warna",
            allowClear: true
        });
    });
</script>
<script>
    $('.tg-load').on('click', function() {
        Swal.fire({
            title: 'Menyimpan...',
            text: 'Mohon tunggu sebentar',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
    });

    $('#saveBrand').on('click', function() {
        let name = $('#brandName').val();
        let code = $('#brandName').val();

        if (name === '' || code === '') {
            alert('nama atau kode brand tidak boleh kosong');
            return false;
        }

        $.ajax({
            type: "post",
            url: "brand/store",
            data: {
                brand_name: name,
                brand_code: code
            },
            success: function(response) {
              
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil menambahkan brand.',
                });

                $('#addBrandModal').modal('hide');

                $('#productBrand').append(
                    $('<option>',{
                       value: response.brand_id,
                       text: name
                    })
                );
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal menambahkan brand.',
                });
            }
        });
    });
</script>
<?= $this->endSection() ?>