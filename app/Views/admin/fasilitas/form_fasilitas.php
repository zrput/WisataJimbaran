<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="../../assets/admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../assets/admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../assets/admin/images/favicon.png" />
  <style>
    .form-check {
        display: inline-block; /* Membuat elemen form-check menjadi inline-block */
        margin-right: 15px; /* Memberikan margin antara elemen-elemen form-check */
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?= $navbar;?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
    
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?= $sidebar; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Tambah Data Fasilitas Akomodasi</h4>
                  <form class="forms-sample" action="<?= base_url('Fasilitas/insert_fasilitas')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="nama">Nama Fasilitas</label>
                      <input type="hidden" class="form-control" name="id_penginapan" value="<?=$pk?>">
                      <input type="text" class="form-control" name="nama" >
                    </div>
                    <!-- radio button -->
                    <div class="form-group">
                        <label>Pilih Jenis Fasilitas</label>
                        <div class="form-group">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="tipe" id="optionsRadios1" value="kamar">
                              Kamar
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="tipe" id="optionsRadios1" Value="restoran">
                              Restoran
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="tipe" id="optionsRadios1" value="kolam">
                              Kolang Renang
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="tipe" id="optionsRadios1" value="event">
                              Aula Event
                            </label>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga Fasilitas</label>
                      <input type="number" class="form-control" name="harga" placeholder="10000">
                    </div>
                    
                    <div class="form-group">
                      <label>Upload Gambar Fasilitas</label>
                      <input type="file" name="img[]" class="file-upload-default" multiple="true" accept="image/jpeg, image/png, image/jpg">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" readonly placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Deskripsi</label>
                      <textarea class="form-control" id="exampleTextarea1" name="des" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->



  <script src="../../vendor/sweetalert/sweetalert2.all.js"></script>
  <script>
  const fileInput = document.querySelector('input[type="file"]');

  fileInput.addEventListener('change', function () {
      const selectedFiles = this.files;
      for (let i = 0; i < selectedFiles.length; i++) {
          const file = selectedFiles[i];
          if (!file.type.startsWith('image/')) {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Data yang dimasukkan harus foto",
            });
              this.value = ''; // Clear the input field
              return;
          }
      }
  });
  </script>
  <!-- plugins:js -->
  <script src="../../assets/admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../assets/admin/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../assets/admin/vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/admin/js/off-canvas.js"></script>
  <script src="../../assets/admin/js/hoverable-collapse.js"></script>
  <script src="../../assets/admin/js/template.js"></script>
  <script src="../../assets/admin/js/settings.js"></script>
  <script src="../../assets/admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../assets/admin/js/file-upload.js"></script>
  <script src="../../assets/admin/js/typeahead.js"></script>
  <script src="../../assets/admin/js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
