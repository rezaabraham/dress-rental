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
    <link href="assets/css/style.bundle_public.css" rel="stylesheet" type="text/css" />
</head>

<body id="kt_app_body" data-kt-app-toolbar-enabled="true" class="app-default">
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
    <?= $this->include('_layouts/_catalog/_header'); ?>
    <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
        <div class="app-container  container-xxl d-flex flex-row-fluid ">
            <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                <div class="d-flex flex-column flex-column-fluid">
                    <?= $this->include('_layouts/_catalog/_toolbar'); ?>
                    <?= $this->renderSection('content') ?>
                </div>
                <div id="kt_app_footer" class="app-footer  d-flex flex-column flex-md-row align-items-center flex-center flex-md-stack py-2 py-lg-4 ">
                    <div class="text-gray-900 order-2 order-md-1">
                        <span class="text-muted fw-semibold me-1">2025&copy;</span>
                        <a href="#" target="_blank" class="text-gray-800 text-hover-primary">Rent A Dress</a>
                    </div>
                    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                        <li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">About</a></li>

                        <li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">Support</a></li>

                        <li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">Purchase</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>

    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
</body>

</html>