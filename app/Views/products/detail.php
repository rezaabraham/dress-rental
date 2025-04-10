<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detail Produk</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/media/logos/favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/style.bundle_public.css" rel="stylesheet" type="text/css" />

    <style>
        .swiper {
            width: 100%;
        }

        .swiper-slide img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        .swiper-thumb img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border: 2px solid transparent;
            cursor: pointer;
            border-radius: 0.5rem;
        }

        .swiper-thumb .swiper-slide-thumb-active img {
            border-color: #0d6efd;
        }

        .header-custom {
            background-color: #fff;
            border-bottom: 1px solid #eee;
            padding: 1rem 0;
            margin-bottom: 2rem;
        }

        .header-logo {
            max-height: 40px;
        }

        @media (max-width: 576px) {
            .swiper-thumb img {
                height: 70px;
            }

            .btn-back {
                font-size: 0.9rem;
                padding: 0.3rem 0.6rem;
            }
        }

        .main-wrapper {
            max-width: 960px;
            margin: 0 auto;
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
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <?= $this->include('_layouts/_catalog/_headerdetail'); ?>
        </div>
    </div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom d-lg-none">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Fixed bottom</a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container pb-10">
        <div class="main-wrapper">
            <div class="row gy-5">
                <!-- Kiri: Galeri -->
                <div class="col-md-6">
                    <div class="swiper mySwiper2 mb-4">
                        <div class="swiper-wrapper">
                            <?php foreach ($product['images'] as $k => $v): ?>
                                <div class="swiper-slide"><img src="<?= base_url('media/show/' . $product['master_product_code'] . '/' . $v) ?>" alt="1" /></div>
                            <?php endforeach ?>
                        </div>
                    </div>

                    <div class="swiper mySwiper swiper-thumb">
                        <div class="swiper-wrapper">
                            <?php foreach ($product['images'] as $k => $v): ?>
                                <div class="swiper-slide"><img src="<?= base_url('media/show/' . $product['master_product_code'] . '/' . $v) ?>" alt="thumb 1" /></div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <!-- Kanan: Info Produk -->
                <div class="col-md-6">
                    <h2 class="fw-bold mb-3"><?= esc($product['master_product_name']) ?></h2>
                    <p>By <?= $product['brand_name'] ?></p>
                    <div class="separator border-5 my-5"></div>
                    <p class="fw-semibold fs-4 text-gray-600 mb-2"><?= 'Rp. ' . number_format($product['master_product_price'], 0, ',', '.') . ' / ' . $product['master_product_rental_period'] . ' Days' ?></p>
                    <div class="separator border-5 my-5"></div>
                    <p>Hijab Friendly
                    <p>
                    <p class="fw-semibold fs-4 text-gray-600 mb-2"><?= $product['master_product_desc'] ?></p>

                    <div class="separator border-5 my-5"></div>

                    <div class="mb-4">
                        <span class="fw-semibold fs-4 text-gray-600 mb-2">Extra Days :<?= 'Rp. ' . number_format($product['master_product_extra_days_price'], 0, ',', '.') ?> / Day</span><br>
                        <span class="fw-semibold fs-4 text-gray-600 mb-2">Code : <?= $product['master_product_code'] ?></span><br>
                        <span class="fw-semibold fs-4 text-gray-600 mb-2">Colour : <?= $product['master_product_colour'] ?></span><br>
                        <span class="fw-semibold fs-4 text-gray-600 mb-2">Tags : <i><?= $product['master_product_tag'] ?></i></span>
                    </div>
                    <button id="btn-wa" class="btn btn-success btn-lg text-white" data-item-code="<?= $product['master_product_code'] ?>"
                        data-item-name="<?= $product['master_product_name'] ?>">
                        Tanya Admin
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/plugins/global/plugins.bundle.js"></script>
    <script src="../assets/js/scripts.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Swiper Config -->
    <script>
        var swiperThumb = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 5,
            freeMode: true,
            watchSlidesProgress: true,
        });

        var swiperMain = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            thumbs: {
                swiper: swiperThumb,
            },
        });

        /* document.getElementById("btn-wa").addEventListener("click", function() {
            const code = "001";
            const name = "Alula Dress";
            const phone = "6281387097774";

            const message = `APAKAH ${code} - ${name} MASIH TERSEDIA?`;
            const encoded = encodeURIComponent(message);

            // Deteksi apakah user mobile atau desktop
            const isMobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

            let url;
            if (isMobile) {
                url = `https://wa.me/${phone}?text=${encoded}`;
            } else {
                url = `https://api.whatsapp.com/send?phone=${phone}&text=${encoded}`;
            }

            window.open(url, "_blank");
        }); */


        document.getElementById("btn-wa").addEventListener("click", function() {
            const code = this.getAttribute("data-item-code");
            const name = this.getAttribute("data-item-name");
            const message = `APAKAH ${code} - ${name} MASIH TERSEDIA?`;
            const encodedMessage = encodeURIComponent(message);
            //const encodedMessage = message;
            const phone = "6281387097774";
            const url = `https://wa.me/${phone}?text=${encodedMessage}`;
            console.log(url);
            window.open(url, "_blank");
        });
    </script>

</body>

</html>