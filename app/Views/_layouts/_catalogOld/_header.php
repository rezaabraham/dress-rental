<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">
    <div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
            <a href="<?= base_url('/') ?>">
                <img alt="Logo" src="assets/media/logos/rent-a-dress-logo-v2.png" class="h-40px h-lg-50px app-sidebar-logo-default theme-light-show" />
                <img alt="Logo" src="assets/media/logos/rent-a-dress-logo-v2.png" class="h-40px h-lg-50px app-sidebar-logo-default theme-dark-show" />
            </a>
        </div>
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                        <span class="menu-link">
                            <span class="menu-title">Cara Sewa</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </span>
                    </div>
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                        <span class="menu-link">
                            <span class="menu-title">Panduan Masa Sewa</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </span>
                    </div>
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <span class="menu-link">
                            <span class="menu-title">Terms & Condition</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </span>
                    </div>
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item here show">
                        <span class="menu-link">
                            <span class="menu-title">Contact Us</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="app-navbar flex-shrink-0">
                <div class="app-navbar-item ms-1 ms-md-4">
                    <button class="btn btn-primary" onclick="alert('Fitur belum tersedia');return false;">Check Jadwal</button>
                </div>
            </div>
        </div>
    </div>
</div>