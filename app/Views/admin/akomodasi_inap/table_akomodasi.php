<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="../assets/admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../assets/admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets/admin/images/favicon.png" />

  <style>
      #deskripsi1 {
          width: 100%; /* Sesuaikan lebar textarea */
          height: 300px; /* Sesuaikan tinggi textarea */
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Akomodasi Penginapan</h4>
                  <p class="card-description">
                  </p>
                  <button type="button" class="btn btn-primary mt-3" onclick="location.href='<?= base_url('Akomodasi/form_akomodasi')?>'"><i class="ti-plus btn-icon-append"></i> Tambah Data</button>
                  <div class="table-responsive pt-3">
                    <table id="tablesmain" class="table table-striped table-bordered"  style="width:100%">
                      <thead>
                        <tr>
                          <th>no</th>
                          <th>Nama Penginapan</th>
                          <th>Tipe Penginapan</th>
                          <th>Fasilitas</th>
                          <th>Gambar</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data as $datas) : ?>
                          <tr>
                            <td><?= $no?></td>
                            <td><?= $datas->nama_penginapan?></td>
                            <td><?= $datas->tipe_penginapan?></td>
                      
                            <td><button type="button" class="btn btn-primary py-3 px-4 " onclick="location.href='<?= base_url('Fasilitas/table_fasilitas'). '/' . $datas->id_penginapan?>'">Lihat</button></td>
                            <td><button type="button" class="btn btn-primary py-3 px-4 " data-bs-toggle="modal" data-bs-target="#exampleModal-<?= $datas->id_penginapan ?>" data-idpenginapan="<?= $datas->id_penginapan ?>">Lihat</button></td>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal-<?= $datas->id_penginapan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Gambar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body overflow-auto" style="display: grid; grid-template-columns: 1fr 1fr;">
                                  <div class="galeriGambar"></div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                                  </div>                
                                </div>
                              </div>
                            </div>

                            <td>
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-info py-3" data-toggle="modal" data-target="#exampleModals-<?= $datas->id_penginapan ?>">
                                Detail
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModals-<?= $datas->id_penginapan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="namaRestoran">Nama Penginapan:</label>
                                                    <input type="text" id="namaRestoran" class="form-control" value="<?= $datas->nama_penginapan ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="namaRestoran">Tipe Penginapan:</label>
                                                    <input type="text" id="tipe" class="form-control" value="<?= $datas->tipe_penginapan ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="alamat">Alamat:</label>
                                                    <input type="text" id="alamat" class="form-control" value="<?= $datas->alamat ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="jamBuka">Harga termurah fasilitas:</label>
                                                    <input type="number" id="jamOperasi" class="form-control" value="<?= $datas->min ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                  <div class="row">
                                                    <div class="col-md-6">
                                                      <label for="checkIn">Check In</label>
                                                      <input type="text" class="form-control" value="<?= $datas->check_in ?>" readonly>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <label for="checkOut">Check Out</label>
                                                      <input type="text" class="form-control" value="<?= $datas->check_out ?>" readonly>
                                                    </div>
                                                  </div>
                                              </div>

                                                <div class="form-group">
                                                    <label for="namaRestoran">Email Penginapan:</label>
                                                    <input type="text" id="email" class="form-control" value="<?= $datas->email ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="telepon">No Telepon:</label>
                                                    <input type="text" id="telepon" class="form-control" value="<?= $datas->telepon ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="peta">Peta:</label>
                                                    <input type="text" id="peta" class="form-control" value="<?= $datas->peta ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="deskripsi1">Deskripsi:</label>
                                                    <textarea id="deskripsi1" class="form-control" readonly><?= $datas->deskripsi ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary py-3" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <button type="button" class="btn btn-dark py-3" onclick="location.href='<?= base_url('Akomodasi/edit_akomodasi'). '/' . $datas->id_penginapan?>'"><i class="ti-file btn-icon-append"></i>Edit</button>
                            <button type="button" class="btn btn-danger py-3" onclick="location.href='<?= base_url('Akomodasi/delete_akomodasi'). '/' . $datas->id_penginapan?>'"><i class="ti-trash btn-icon-append"></i>Delete</button>
                            </td>
                          </tr>
                          <?php $no++; ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
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


  
  
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
  <script>
    new DataTable('#tablesmain');

    $(document).ready(function () {
        $('button[data-bs-target^="#exampleModal-"]').on('click', function () {
            // Ambil ID objek dari tombol yang diklik
            var idpenginapan = $(this).data('idpenginapan');
            var modalId = "#exampleModal-" + idpenginapan;

            // Buat AJAX request untuk mengambil URL gambar dari controller
            $.ajax({
                url: '<?= base_url('Akomodasi/lihat_img/') ?>' + idpenginapan,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Bersihkan galeri gambar sebelum menambahkan gambar-gambar baru
                    $(modalId + ' .modal-body').empty();
                        
                    if (Array.isArray(data) && data.length > 0) {
                      
                    // Loop melalui daftar path gambar dan buat elemen gambar dengan path sebagai sumbernya
                    // Loop untuk menampilkan gambar berulang
                    data.forEach(function (imagePath) {
                            var div = $('<div>').css('display', 'flex').css('flex-direction', 'column');
                            var img = $('<img>').attr('src', '../../akomodasi_penginapan/'+imagePath.gambar_akomodasi).addClass('img-thumbnail')
                            .css('aspect-ratio', '16/9').css('object-fit', 'cover');
                            var p = $('<p>').attr('style', 'width: 100%; text-align: center;').html(imagePath.gambar_akomodasi);
                            div.append(img, p);
                            $(modalId + ' .modal-body').append(div);
                        
                    });
                  } else {
                    $(modalId + ' .modal-body').text('tidak ada gambar.');
                }
                },
                error: function () {
                    alert('Gagal mengambil gambar rekreasi.');
                }
            });
            $(modalId).modal('show');
        });
    });
</script>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../assets/admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../assets/admin/js/off-canvas.js"></script>
  <script src="../assets/admin/js/hoverable-collapse.js"></script>
  <script src="../assets/admin/js/template.js"></script>
  <script src="../assets/admin/js/settings.js"></script>
  <script src="../assets/admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
