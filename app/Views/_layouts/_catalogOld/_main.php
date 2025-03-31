<!DOCTYPE html>
<html lang="en">

<head>
    <title>CHARINA STUDIO</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <link rel="shortcut icon" href="" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>

<body id="kt_app_body" data-kt-app-layout="light-header" data-kt-app-header-fixed="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <?= $this->include('_layouts/_catalog/_header'); ?>
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <?= $this->include('_layouts/_catalog/_toolbar'); ?>
                    </div>
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <div id="kt_app_content_container" class="app-container container-xxl">
                            <div class="row gx-5 gx-xl-10">
                                <?= $this->renderSection('content') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="app-engage " id="kt_app_engage">
        <a href="https://www.tiktok.com/@charina.studio" target="_blank" class="app-engage-btn hover-dark">
            <i class="ki-duotone ki-tiktok fs-1 pt-1 mb-2"><span class="path1"></span><span class="path2"></span></i> TikTok
            <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/a/a7/TikTok_logo.svg" width="50px" alt="TikTok"> -->
        </a>
        <a href="https://www.instagram.com/charina.studio" target="_blank" class="app-engage-btn hover-primary">
            <!-- <i class="ki-duotone ki-like-shapes fs-1 pt-1 mb-2"><span class="path1"></span><span class="path2"></span></i> Get Help -->
            <!-- <i class="ki-duotone ki-instagram fs-1 pt-1 mb-2"><span class="path1"></span><span class="path2"></span></i> Instagram -->
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" width="50px" alt="Instagram">
        </a>
        <a href="https://wa.me/6281387097774?text=Halo,%20saya%20tertarik%20dengan%20dress%20Anda." target="_blank" class="app-engage-btn hover-success">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="Chat via WhatsApp">
            <!-- <i class="ki-duotone ki-whatsapp fs-1 pt-1 mb-2"><span class="path1"></span><span class="path2"></span></i>WhatsApp -->
        </a>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
</body>

</html>