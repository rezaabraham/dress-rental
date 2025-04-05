<div id="kt_app_toolbar" class="d-flex flex-wrap flex-stack mb-2">
    <div class="d-flex flex-column flex-row-fluid">
        <div class="page-title d-flex align-items-center">
            <h1 class="page-heading d-flex flex-column text-primary fw-bold fs-lg-2x gap-2">
                <span><span class="fw-light text-dark">Katalog</span> Pilihan</span>
            </h1>
        </div>
    </div>
    <div class="d-flex gap-3 my-3">
        <form method="get" action="<?= site_url('/') ?>">
            <div class="d-flex align-items-center position-relative">
                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-3"></i> <input type="text" class="form-control border-body bg-body ps-10" placeholder="Cari" name="keyword">
            </div>
        </form>
        <a href="#" class="btn btn-flex btn-dark fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
            <i class="ki-outline ki-filter fs-6 me-1"></i>Filter
        </a>
        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_673c0c93de9e8">
            <div class="px-7 py-5">
                <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
            </div>
            <div class="separator border-gray-200"></div>
            <div class="px-7 py-5">
                <div class="mb-10">
                    <label class="form-label fw-semibold">Brand:</label>
                    <div>
                        <select name="brand" class="form-select form-select-solid" data-kt-select2="true">
                            <option value="">All</option>
                            <?php if (! empty($brands)): ?>
                                <?php foreach ($brands as $brand): ?>
                                    <option value="<?= $brand['brand_id'] ?>"><?= $brand['brand_name'] ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                    <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>