<!DOCTYPE html>
<html lang="en">

<head>
  <base href="">
  <meta charset="utf-8" />
  <title>Charina Studio - Catalogue</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />


  <style>
    .custom-ribbon {
      background-color: #ffdab9 !important;
      color: #333 !important;
    }

    @media (min-width: 768px) {
      .card-wrapper {
        max-width: 960px;
        margin-left: auto;
        margin-right: auto;
      }
    }

    .btn-filter-sort {
      background-color: #002546 !important;
      color: #ffffff !important;
      border: none;
    }

    .btn-filter-sort:hover {
      background-color: #001a33 !important;
      color: #ffffff !important;
    }

    .badge-new {
      background-color: #ffdab9 !important;
      color: #333 !important;
      font-size: 0.75rem;
      font-weight: 600;
      padding: 4px 10px;
      border-radius: 0.4rem;
    }

    .badge-attrtype-inline {
      background-color: #98ff98;
      color: #004d00;
      font-size: 0.7rem;
      font-weight: 600;
      padding: 4px 8px;
      border-radius: 0.4rem;
      margin-left: 0.5rem;
      vertical-align: middle;
    }

    /* Responsive */
    @media (max-width: 575.98px) {
      .badge-attrtype-inline {
        font-size: 0.6rem;
        padding: 3px 6px;
        margin-left: 0.4rem;
      }
    }

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

    .pagination .page-link {
      color: #002546;
      /* warna teks normal */
    }

    .pagination .page-item.active .page-link {
      background-color: #ffdab9;
      border-color: #ffdab9;
      color: #333;
      /* warna teks aktif */
    }

    .pagination .page-link:hover {
      background-color: #ffe5c4;
      border-color: #ffdab9;
      color: #002546;
    }
  </style>
</head>

<body class="bg-body">

  <div class="container py-10">
    <h1 class="mb-10 text-center">CATALOGUE</h1>

    <!-- 🔍 Toolbar Pencarian dan Filter -->
    <!-- 🔍 Toolbar Pencarian dan Filter -->
    <div class="mb-10 card-wrapper">
      <div class="d-flex flex-column flex-md-row align-items-md-center gap-3 justify-content-between">
        <!-- Input Pencarian -->
        <div class="flex-grow-1">
          <input type="text" class="form-control form-control-sm" placeholder="Cari..." />
        </div>

        <!-- Tombol Filter & Sortir -->
        <div class="dropdown">
          <button class="btn btn-sm btn-filter-sort d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-funnel-fill me-2"></i> Filter & Sortir
          </button>
          <div class="dropdown-menu p-4 shadow-lg" style="min-width: 300px;">
            <!-- Filter Section -->
            <h6 class="mb-2 fw-bold">Filter</h6>
            <div class="mb-3">
              <label class="form-label fw-semibold">Brand</label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Brand A" id="brandA">
                <label class="form-check-label" for="brandA">Brand A</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Brand B" id="brandB">
                <label class="form-check-label" for="brandB">Brand B</label>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Warna</label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Merah" id="warnaMerah">
                <label class="form-check-label" for="warnaMerah">Merah</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Hitam" id="warnaHitam">
                <label class="form-check-label" for="warnaHitam">Hitam</label>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Ukuran</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="S" id="sizeS">
                <label class="form-check-label" for="sizeS">S</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="M" id="sizeM">
                <label class="form-check-label" for="sizeM">M</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="L" id="sizeL">
                <label class="form-check-label" for="sizeL">L</label>
              </div>
            </div>

            <div class="mb-4">
              <label class="form-label fw-semibold">Tipe</label>
              <select class="form-select form-select-sm">
                <option value="">Semua</option>
                <option value="dress">Dress</option>
                <option value="sepatu">Sepatu</option>
                <option value="tas">Tas</option>
              </select>
            </div>

            <!-- Sort Section -->
            <h6 class="mb-2 fw-bold">Sortir</h6>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sortir" id="sortNama" checked>
                <label class="form-check-label" for="sortNama">Nama A-Z</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sortir" id="sortHargaMin">
                <label class="form-check-label" for="sortHargaMin">Harga Termurah</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sortir" id="sortHargaMax">
                <label class="form-check-label" for="sortHargaMax">Harga Termahal</label>
              </div>
            </div>

            <!-- Actions -->
            <div class="d-flex justify-content-between">
              <button class="btn btn-sm btn-secondary" type="button">Reset</button>
              <button class="btn btn-sm btn-primary" type="button">Terapkan</button>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- WRAPPER UNTUK TENGAHKAN GRID DI DESKTOP -->
    <div class="card-wrapper">
      <div class="row g-6">

        <!-- Card Dinamis -->
        <?php if (!empty($products)): ?>
          <?php foreach ($products as $product): ?>
            <div class="col-6 col-md-4 h-100">
              <div class="card shadow-sm">
                <div class="ratio ratio-1x1 position-relative">
                  <img
                    src="<?= site_url('media/show/' . $product['master_product_code'] . '/' . $product['master_product_thumbnail']) ?>"
                    class="rounded w-100 h-100 object-fit-cover"
                    style="object-position: top;"
                    alt="Barang A" />
                  <div class="position-absolute top-0 end-0 m-2">
                    <span class="badge badge-new shadow">New Arrival</span>
                  </div>
                </div>
                <div class="card-body p-3">
                  <h5 class="card-title"><?= $product['master_product_name'] ?>
                    <?php if ($product['master_product_type'] == 2): ?>
                      <span class="badge-attrtype-inline">Hijab Friendly</span>
                    <?php endif ?>
                  </h5>
                  <p class="card-text"><?= 'Rp. ' . number_format($product['master_product_price'], 0, ',', '.') ?> / <?= $product['master_product_rental_period'] . ' hari' ?></p>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        <?php endif ?>

      </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-10">
      <nav>
        <ul class="pagination pagination-sm">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
          </li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Berikutnya</a>
          </li>
        </ul>
      </nav>
    </div>

    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>

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
</body>

</html>