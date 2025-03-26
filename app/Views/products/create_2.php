<?= $this->extend('_layouts/_admin/_main') ?>
<?= $this->section('content') ?>

<!--begin::Layout-->
<div class="d-flex flex-column flex-lg-row">
    <!--begin::Content-->
    <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
        <!--begin::Card-->
        <div class="card mb-10">
            <!--begin::Card body-->
            <div class="card-body p-12">
                <!--begin::Form-->
                <form action="product/store" id="kt_invoice_form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="form_id" id="form_id" value="<?= $formCode ?>">
                    <!--begin::Wrapper-->
                    <!--end::Top-->
                    <!--begin::Wrapper-->
                    <div class="mb-0">
                        <div class="mb-10">
                            <label class="form-label fs-6 fw-bold text-gray-700">Nama Item</label>
                            <input type="text"
                                class="form-control"
                                name="product_name" placeholder="Nama Item" />
                        </div>

                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="form-label">Deskripsi</label>
                            <!--end::Label-->
                            <!--begin::Editor-->
                            <textarea id="product_description" name="product_description" class="form-control">
                                </textarea>
                            <!--end::Editor-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Wrapper-->

                    <!--end::Form-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->

        <!--begin::Media-->
        <div class="card card-flush py-4 mb-10">
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
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="formFile" multiple>
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
                    <h2>Biaya Sewa</h2>
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
                        <input type="number" name="product_price" class="form-control mb-2" placeholder="Product price" value="0" />
                        <!--end::Input-->
                        <!--begin::Description-->
                        <!-- <div class="text-muted fs-7">Set the product price.</div> -->
                        <!--end::Description-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="col mb-10">
                        <!--begin::Label-->
                        <label class="form-label">Masa Sewa (hari)</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control mb-2" name="product_rental_period" value="1" />
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
                        <input id="kt_ecommerce_add_product_meta_keywords" type="number" name="product_extra_days_price" class="form-control mb-2" value="0" />
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
    <!--end::Content-->

    <!--begin::Sidebar-->
    <div class="flex-lg-auto min-w-lg-300px">
        <!--begin::Card-->
        <div class="card" data-kt-sticky="true" data-kt-sticky-name="invoice"
            data-kt-sticky-offset="{default: false, lg: '200px'}"
            data-kt-sticky-width="{lg: '250px', lg: '300px'}" data-kt-sticky-left="auto"
            data-kt-sticky-top="150px" data-kt-sticky-animation="false"
            data-kt-sticky-zindex="95">
            <!--begin::Card body-->
            <div class="card-body p-10">
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
                <!--begin::Button-->
                <button type="button" class="btn btn-light-primary btn-sm mb-10" data-bs-toggle="modal" data-bs-target="#addBrandModal"><i class="ki-duotone ki-plus fs-2"></i>Brand</button>
                <!--end::Button-->
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Warna</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <div class="d-flex gap-3">
                        <select class="form-select" name="product_colour[]" data-control="select2" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                            <option></option>
                            <?php foreach ($colours as $colour): ?>
                                <option value="<?= $colour['colour_name'] ?>"><?= $colour['colour_name'] ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>
                    <!--end::Input-->
                </div>
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
                <!--begin::Separator-->
                <div class="separator separator-dashed mb-8"></div>
                <!--end::Separator-->

                <!--begin::Actions-->
                <div class="mb-0">

                    <button type="submit" href="#" class="btn btn-primary w-100"
                        id="kt_invoice_submit_button">
                        <i class="ki-duotone ki-triangle fs-3">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>Simpan</button></form>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Sidebar-->
</div>
<!--end::Layout-->

<?= $this->endSection() ?>

<?= $this->section('custom_js') ?>
<!-- <script>
    let formID = <?= $formCode ?>;
    var myDropzone = new Dropzone("#gallery", {
        url: "<?= site_url('product-upload/') ?>" + formID, // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 5,
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        parallelUploads: 5,
        // autoProcessQueue: false,
        accept: function(file, done) {
            if (file.name == "wow.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        }
    });
</script> -->
<?= $this->endSection() ?>