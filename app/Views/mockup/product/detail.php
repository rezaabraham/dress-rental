<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail Produk Swipe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- Metronic Style -->
    <link href="<?= base_url() ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.bundle.css" rel="stylesheet">

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

<body class="bg-light">

    <!-- Header -->
    <header class="header-custom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Kembali -->
                <a href="<?= site_url('catalogue') ?>" class="btn btn-outline-secondary btn-sm btn-back">
                    <i class="ki-duotone ki-arrow-left fs-2"><span class="path1"></span><span class="path2"></span></i>
                </a>

                <!-- Logo -->
                <div class="text-center flex-grow-1">
                    <img src="<?= base_url() ?>assets/userdata/logo/logo.png" alt="Logo" class="header-logo">
                </div>

                <!-- Spacer -->
                <div style="width: 120px;"></div>
            </div>
        </div>
    </header>

    <!-- Konten Utama -->
    <div class="container pb-10">
        <div class="main-wrapper">
            <div class="row gy-5">
                <!-- Kiri: Galeri -->
                <div class="col-md-6">
                    <div class="swiper mySwiper2 mb-4">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="<?= base_url() ?>assets/media/avatars/300-1" alt="1" /></div>
                            <div class="swiper-slide"><img src="<?= base_url() ?>assets/media/avatars/300-2" alt="2" /></div>
                            <div class="swiper-slide"><img src="<?= base_url() ?>assets/media/avatars/300-3" alt="3" /></div>
                            <div class="swiper-slide"><img src="<?= base_url() ?>assets/media/avatars/300-4" alt="4" /></div>
                            <div class="swiper-slide"><img src="<?= base_url() ?>assets/media/avatars/300-5" alt="5" /></div>
                        </div>
                    </div>

                    <div class="swiper mySwiper swiper-thumb">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="<?= base_url() ?>assets/media/avatars/300-1" alt="thumb 1" /></div>
                            <div class="swiper-slide"><img src="<?= base_url() ?>assets/media/avatars/300-2" alt="thumb 2" /></div>
                            <div class="swiper-slide"><img src="<?= base_url() ?>assets/media/avatars/300-3" alt="thumb 3" /></div>
                            <div class="swiper-slide"><img src="<?= base_url() ?>assets/media/avatars/300-4" alt="thumb 4" /></div>
                            <div class="swiper-slide"><img src="<?= base_url() ?>assets/media/avatars/300-5" alt="thumb 5" /></div>
                        </div>
                    </div>
                </div>

                <!-- Kanan: Info Produk -->
                <div class="col-md-6">
                    <h2 class="fw-bold mb-3">Alula Dress</h2>
                    <p>By Touch Up Atelier</p>
                    <div class="separator border-5 my-5"></div>
                    <p class="fw-semibold fs-4 text-gray-600 mb-2">Rp. 300.000,00 / 3 hari</p>
                    <div class="separator border-5 my-5"></div>
                    <p>Hijab Friendly
                    <p>
                    <p class="fw-semibold fs-4 text-gray-600 mb-2">Deskripsi singkat produk ditampilkan di sini. Cocok untuk semua kalangan, dengan kualitas premium dan harga terjangkau.</p>

                    <div class="separator border-5 my-5"></div>

                    <div class="mb-4">
                        <span class="fw-semibold fs-4 text-gray-600 mb-2">Extra Days : Rp. 80.000,- / Day</span><br>
                        <span class="fw-semibold fs-4 text-gray-600 mb-2">Code : 001</span><br>
                        <span class="fw-semibold fs-4 text-gray-600 mb-2">Colour : Black</span><br>
                        <span class="fw-semibold fs-4 text-gray-600 mb-2">Tags : New Arrival</span>
                    </div>
                    <button id="btn-wa" class="btn btn-success btn-lg text-white">
                        Tanya Admin
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
            const itemCode = "001";
            const itemName = "Alula Dress";
            const message = `APAKAH ${itemCode} - ${itemName} MASIH TERSEDIA?`;
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