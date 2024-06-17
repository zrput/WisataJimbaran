<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="../assets/admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../assets/admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../assets/admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../assets/admin/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets/admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <!-- <link rel="shortcut icon" href="images/favicon.png" /> -->
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?= $navbar; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
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
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>

      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->

      <?= $sidebar; ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <!-- <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="../assets/admin/images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>50<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Jimbaran</h4>
                        <h6 class="font-weight-normal">Bali</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="col-md-12 grid-margin transparent">
              <div <div class="col-md-3 mb-5 stretch-card transparent" onclick="objek()">
                <div class="card card-tale">
                  <div class="card-body">
                    <p class="mb-4">Objek Wisata</p>
                    <p class="fs-30 mb-2"><?= $objek ?></p>
                  </div>
                </div>
              </div>

              <div class="col-md-3 mb-5 stretch-card transparent" onclick="rekreasi()">
                <div class="card card-dark-blue">
                  <div class="card-body">
                    <p class="mb-4">Tempat Rekreasi wisata</p>
                    <p class="fs-30 mb-2"><?= $rekreasi ?></p>
                  </div>
                </div>
              </div>

              <div class="col-md-3 mb-5 stretch-card transparent" onclick="penginapan()">
                <div class="card card-light-blue">
                  <div class="card-body">
                    <p class="mb-4">Akomodasi Penginapan</p>
                    <p class="fs-30 mb-2"><?= $akomodasi ?></p>
                  </div>
                </div>
              </div>

              <div class="col-md-3 mb-5 stretch-card transparent" onclick="restoran()">
                <div class="card card-light-danger">
                  <div class="card-body">
                    <p class="mb-4">Restoran</p>
                    <p class="fs-30 mb-2"><?= $restoran ?></p>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 stretch-card grid-margin">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Notifications</p>
                <!-- <ul class="icon-data-list">
                    <li>
                      <div class="d-flex">
                        <img src="images/faces/face1.jpg" alt="user">
                        <div>
                          <p class="text-info mb-1">Isabella Becker</p>
                          <p class="mb-0">Sales dashboard have been created</p>
                          <small>9:30 am</small>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex">
                        <img src="images/faces/face2.jpg" alt="user">
                        <div>
                          <p class="text-info mb-1">Adam Warren</p>
                          <p class="mb-0">You have done a great job #TW111</p>
                          <small>10:30 am</small>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex">
                      <img src="images/faces/face3.jpg" alt="user">
                     <div>
                      <p class="text-info mb-1">Leonard Thornton</p>
                      <p class="mb-0">Sales dashboard have been created</p>
                      <small>11:30 am</small>
                     </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex">
                        <img src="images/faces/face4.jpg" alt="user">
                        <div>
                          <p class="text-info mb-1">George Morrison</p>
                          <p class="mb-0">Sales dashboard have been created</p>
                          <small>8:50 am</small>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex">
                        <img src="images/faces/face5.jpg" alt="user">
                        <div>
                        <p class="text-info mb-1">Ryan Cortez</p>
                        <p class="mb-0">Herbs are fun and easy to grow.</p>
                        <small>9:00 am</small>
                        </div>
                      </div>
                    </li>
                  </ul> -->
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
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

  <!-- plugins:js -->
  <script src="../assets/admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../assets/admin/vendors/chart.js/Chart.min.js"></script>
  <script src="../assets/admin/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../assets/admin/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../assets/admin/js/off-canvas.js"></script>
  <script src="../assets/admin/js/hoverable-collapse.js"></script>
  <script src="../assets/admin/js/template.js"></script>
  <script src="../assets/admin/js/settings.js"></script>
  <script src="../assets/admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../assets/admin/js/dashboard.js"></script>
  <script src="../assets/admin/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->

  <script>
    function objek() {
      window.location.href = "<?= base_url('Objek_wisata/table_objek') ?>";
    }

    function rekreasi() {
      window.location.href = "<?= base_url('Aktifitas_rekreasi/table_rekreasi') ?>";
    }

    function penginapan() {
      window.location.href = "<?= base_url('Akomodasi/table_akomodasi') ?>";
    }

    function restoran() {
      window.location.href = "<?= base_url('Restoran/table_restoran') ?>";
    }
  </script>
</body>

</html>