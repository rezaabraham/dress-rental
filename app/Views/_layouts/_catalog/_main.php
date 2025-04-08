<!DOCTYPE html>
<html lang="en">

<head>
    <title>Charina Studio</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle_public.css" rel="stylesheet" type="text/css" />
    <style>
        .floating-social {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .floating-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 22px;
            color: white;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .floating-social a.whatsapp {
            background-color: #25D366;
        }

        .floating-social a.instagram {
            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
        }

        .floating-social a.tiktok {
            background-color: #000000;
        }

        .floating-social a:hover {
            transform: scale(1.15);
            opacity: 0.9;
        }
    </style>
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
                        <a href="#" target="_blank" class="text-gray-800 text-hover-primary">Charina Studio</a>
                    </div>
                    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                        <li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">Tentang</a></li>
                        <li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">Layanan</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>

    <!-- Begin::Links Sosmed -->
    <div class="floating-social">
        <a href="https://wa.me/6281387097774" target="_blank" title="WhatsApp" class="whatsapp">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://instagram.com/charina.studio" target="_blank" title="Instagram" class="instagram">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://tiktok.com/@charina.studio" target="_blank" title="TikTok" class="tiktok">
            <i class="fab fa-tiktok"></i>
        </a>
    </div>
    <!-- End::Links Sosmed -->

    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
</body>

</html>