<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Admin</title>
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
    <link href="<?= base_url('/assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('/assets/css/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-52YZ3XGZJ6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-52YZ3XGZJ6');
    </script>
    <script>
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
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
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url(<?= base_url('/assets/media/auth/bg10.jpeg') ?>);
            }

            [data-bs-theme="dark"] body {
                background-image: url(<?= base_url('/assets/media/auth/bg10-dark.jpeg') ?>);
            }
        </style>
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-lg-row-fluid">
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="<?= base_url('/assets/media/auth/agency.png') ?>" alt="" />
                    <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="<?= base_url('/assets/media/auth/agency-dark.png') ?>" alt="" />
                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">
                        Fast, Efficient and Productive
                    </h1>
                    <div class="text-gray-600 fs-base text-center fw-semibold">
                        In this kind of post, <a href="#" class="opacity-75-hover text-primary me-1">the blogger</a> introduces a person they’ve interviewed <br /> and provides some background information about <a href="#" class="opacity-75-hover text-primary me-1">the interviewee</a> and their <br /> work following this is a transcript of the interview.
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                            <form class="form w-100" method="post" id="kt_sign_in_form" action="<?= site_url('admin/do-login') ?>">
                                <div class="text-center mb-11">
                                    <h1 class="text-gray-900 fw-bolder mb-3">
                                        Form Login
                                    </h1>
                                    <div class="text-gray-500 fw-semibold fs-6">
                                        Silahkan isikan username dan password Anda
                                    </div>
                                </div>
                                <?php if (session()->getFlashdata('error')): ?>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                                <?php endif; ?>
                                <div class="fv-row mb-8">
                                    <input type="text" placeholder="Username" name="username" class="form-control bg-transparent" required />
                                </div>
                                <div class="fv-row mb-3">
                                    <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" required />
                                </div>
                                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                    <div></div>
                                    <a href="#" class="link-primary">
                                        Lupa Password ?
                                    </a>
                                </div>
                                <div class="d-grid mb-10">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">Masuk</button>
                                </div>
                            </form>
                            <div class="text-center fw-semibold fs-5">
                                <span class="text-muted me-1">Kembali ke halaman Katalog ?</span>
                                <a href="<?= base_url() ?>" class="link-primary fs-5 me-1">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>