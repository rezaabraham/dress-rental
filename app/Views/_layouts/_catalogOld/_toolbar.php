<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <?php if (service('uri')->getSegment(1) === ''): ?>
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Catalog Overview</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <div class="m-0">
                    <form method="get" action="<?= site_url('/') ?>">
                        <input type="text" class="form-control form-control-sm" name="keyword" placeholder="Cari...">
                </div>
                <div class="m-0">
                    <a href="#" class="btn btn-sm btn-flex btn-secondary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="ki-outline ki-filter fs-6 text-muted me-1"></i>Filter
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
        </div>
    <?php endif ?>
</div>