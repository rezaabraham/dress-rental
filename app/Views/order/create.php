<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Pemesanan Item - POS dengan Search</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" />
  <link href="assets/css/style.bundle.css" rel="stylesheet" />
  <style>
    .suggestion-box {
      position: absolute;
      background-color: white;
      z-index: 1000;
      width: 100%;
      border: 1px solid #ddd;
      max-height: 200px;
      overflow-y: auto;
    }

    .suggestion-item {
      padding: 10px;
      cursor: pointer;
    }

    .suggestion-item:hover {
      background-color: #f1f1f1;
    }

    .item-preview {
      border: 1px solid #ddd;
      padding: 10px;
      border-radius: 5px;
      margin-top: 10px;
    }

    .item-preview img {
      max-height: 150px;
    }
  </style>
</head>

<body>
  <div class="container mt-10">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title fw-bold">🔍 Cari dan Pilih Item</h2>
      </div>
      <div class="card-body">
        <form id="searchForm">
          <!-- Pencarian Item -->

          <div class="mb-7 position-relative">
            <label class="form-label fs-4">Item</label>
            <select class="form-select" id="select-item" name="selected_item"></select>
          </div>


          <!-- Preview Item -->
          <div id="itemPreview" class="item-preview d-none">
            <h5 id="previewName" class="fw-bold"></h5>
            <img id="previewImage" src="#" class="img-fluid rounded" alt="Preview Item">
          </div>

          <!-- Lainnya -->
          <div class="mb-5 mt-10">
            <label class="form-label fs-4">Nama Pemesan</label>
            <input type="text" class="form-control form-control-lg" name="nama_pemesan" required />
          </div>
          <div class="mb-5">
            <label class="form-label fs-4">Tanggal Pesan</label>
            <input type="date" class="form-control form-control-lg" name="tanggal_pesan" required />
          </div>
          <div class="mb-5">
            <label class="form-label fs-4">Tanggal Pakai</label>
            <input type="date" class="form-control form-control-lg" name="tanggal_pakai" required />
          </div>
          <div class="mb-5">
            <label class="form-label fs-4">Upload Gambar KTP</label>
            <input type="file" class="form-control form-control-lg" name="ktp" id="ktpUpload" accept="image/*" required />
            <div class="mt-3">
              <img id="ktpPreview" src="#" class="img-fluid rounded border d-none" style="max-height: 200px;" />
            </div>
          </div>
          <div class="text-end mt-7">
            <button type="submit" id="testBtn" class="btn btn-primary btn-lg">💾 Simpan Pemesanan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Metronic JS -->
  <script src="assets/plugins/global/plugins.bundle.js"></script>
  <script src="assets/js/scripts.bundle.js"></script>

  <!-- Script Search & Preview -->
  <script>
    $(document).ready(function() {

      $('#select-item').select2({
        placeholder: 'Pilih item...',
        minimumInputLength: 3,
        ajax: {
          url: '<?= site_url('ajax/products/get') ?>',
          dataType: 'json',
          delay: 250,
          data: function(params) {
            return {
              term: params.term,
            };
          },
          processResults: function(data) {
            return {
              results: data.results,
              
            }
          },
        }
      });

    });
  </script>
</body>

</html>