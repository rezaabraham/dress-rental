<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate-="true" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
    <div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
        <div class="app-header-wrapper d-flex flex-grow-1 align-items-stretch justify-content-between" id="kt_app_header_wrapper">
            <div class="app-header-logo d-flex flex-shrink-0 align-items-center justify-content-between justify-content-lg-center">
                <a class="ms-n3" href="">
                    <img alt="Logo" src="assets/userdata/logo/logo.PNG" class="h-45px h-lg-60px theme-light-show" />
                    <img alt="Logo" src="assets/userdata/logo/logo.PNG" class="h-45px h-lg-60px theme-dark-show" />
                </a>
            </div>
            <div id="kt_app_header_menu_wrapper" class="d-flex align-items-center w-100">
                <div class="app-header-menu app-header-mobile-drawer align-items-start align-items-lg-center w-100" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_menu_wrapper'}">
                    <div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-state-primary menu-title-gray-700 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item here menu-here-bg me-0 me-lg-2">
                            <span class="menu-link">
                                <!-- <a href="#" class="menu-title fw-normal" onclick="openLgBox()">Terms and Conditions</a> -->
                                <a href="<?=base_url()?>assets/userdata/termconditions/1.png" class="menu-title fw-normal" data-fslightbox="lightbox-basic">Terms and Conditions</a>
                                <a href="<?=base_url()?>assets/userdata/termconditions/2.png" class="menu-title fw-normal" data-fslightbox="lightbox-basic" style="display: none;"></a>
                                <a href="<?=base_url()?>assets/userdata/termconditions/3.png" class="menu-title fw-normal" data-fslightbox="lightbox-basic" style="display: none;"></a>
                                <a href="<?=base_url()?>assets/userdata/termconditions/4.png" class="menu-title fw-normal" data-fslightbox="lightbox-basic" style="display: none;"></a>
                                <a href="<?=base_url()?>assets/userdata/termconditions/5.png" class="menu-title fw-normal" data-fslightbox="lightbox-basic" style="display: none;"></a>
                                <a href="<?=base_url()?>assets/userdata/termconditions/6.png" class="menu-title fw-normal" data-fslightbox="lightbox-basic" style="display: none;"></a>
                                <a href="<?=base_url()?>assets/userdata/termconditions/7.png" class="menu-title fw-normal" data-fslightbox="lightbox-basic" style="display: none;"></a>
                                <a href="<?=base_url()?>assets/userdata/termconditions/8.png" class="menu-title fw-normal" data-fslightbox="lightbox-basic" style="display: none;"></a>
                                <a href="<?=base_url()?>assets/userdata/termconditions/9.png" class="menu-title fw-normal" data-fslightbox="lightbox-basic" style="display: none;"></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-navbar flex-shrink-0">
                <div class="app-navbar-item ms-3 ms-lg-5">
                    <a href="#" class="btn btn-sm btn-outline btn-outline-primary"><i class="ki-outline ki-calendar-tick fs-3 me-1 me-lg-0"></i>Jadwal</a>
                </div>
                <div class="app-navbar-item d-lg-none ms-2 me-n3" title="Tampilkan menu">
                    <div class="btn btn-sm btn-icon btn-custom btn-outline btn-outline-dark btn-active-light-dark" id="kt_app_header_menu_toggle">
                        <i class="ki-outline ki-burger-menu-4 fs-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>