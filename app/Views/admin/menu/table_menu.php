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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../assets/admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../assets/admin/images/favicon.png" />
  <style>
      /* Tambahkan CSS untuk textarea di dalam modal */
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
                  <h4 class="card-title">Data Menu Makanan Dan Minuman Restoran</h4>
                  <p class="card-description">
                  </p>
                  <button type="button" class="btn btn-primary mt-3" onclick="location.href='<?= base_url('Menu/form_menu'). '/' . $pk?>'"><i class="ti-plus btn-icon-append"></i> Tambah Data</button>
                  <div class="table-responsive pt-3">
                    <table id="tablesmain" class="table table-striped table-bordered"  style="width:100%">
                      <thead>
                        <tr>
                          <th>no</th>
                          <th>Nama Menu</th>
                          <th>Harga Menu</th>
                          <th>Gambar</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data as $datas) : ?>
                          <tr>
                            
                            <td><?= $no?></td>
                            <td><?= $datas['nama_menu']?></td>
                            <td><?= $datas['harga_menu']?></td>
                            <td><button type="button" class="btn btn-primary py-3 px-4 " data-bs-toggle="modal" data-bs-target="#exampleModal-<?= $datas['id_menu'] ?>" data-idmenu="<?= $datas['id_menu'] ?>">Lihat</button></td>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal-<?= $datas['id_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-info py-3" data-toggle="modal" data-target="#exampleModals-<?= $datas['id_menu'] ?>">
                                Detail
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModals-<?= $datas['id_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <label for="namamenu">Nama Menu:</label>
                                                    <input type="text" id="namamenu" class="form-control" value="<?= $datas['nama_menu'] ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="namamenu">Jenis Menu:</label>
                                                    <input type="text" id="namamenu" class="form-control" value="<?= $datas['jenis_menu'] ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="hargamenu">Harga Menu:</label>
                                                    <input type="text" id="hargamenu" class="form-control" value="<?= $datas['harga_menu'] ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="deskripsi1">Deskripsi:</label>
                                                    <textarea id="deskripsi1" class="form-control" readonly><?= $datas['deskripsi'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary py-3" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <button type="button" class="btn btn-dark py-3" onclick="location.href='<?= base_url('Menu/edit_menu'). '/' . $datas['id_menu']?>'"><i class="ti-file btn-icon-append"></i>Edit</button>
                            <button type="button" class="btn btn-danger py-3" onclick="deleteConfirmation(<?= $datas['id_menu'] ?>, <?= $pk ?>)"><i class="ti-trash btn-icon-append"></i>Delete</button>
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
  <script src="../../vendor/sweetalert/sweetalert2.all.js"></script>
  <script>
    new DataTable('#tablesmain');

    $(document).ready(function () {
        $('button[data-bs-target^="#exampleModal-"]').on('click', function () {
            // Ambil ID objek dari tombol yang diklik
            var idmenu = $(this).data('idmenu');
            var modalId = "#exampleModal-" + idmenu;

            // Buat AJAX request untuk mengambil URL gambar dari controller
            $.ajax({
                url: '<?= base_url('Menu/lihat_img/') ?>' + idmenu,
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
                            var img = $('<img>').attr('src', '../../menu/'+imagePath.gambar_menu).addClass('img-thumbnail')
                            .css('aspect-ratio', '16/9').css('object-fit', 'cover');
                            var p = $('<p>').attr('style', 'width: 100%; text-align: center;').html(imagePath.gambar_menu);
                            div.append(img, p);
                            $(modalId + ' .modal-body').append(div);
                        
                    });
                  } else {
                    $(modalId + ' .modal-body').text('tidak ada gambar.');
                }
                },
                error: function () {
                    alert('Gagal mengambil gambar Menu.');
                }
            });
            $(modalId).modal('show');
        });
    });

    function deleteConfirmation(idMenu, pk) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
      });

      swalWithBootstrapButtons
        .fire({
          title: "Anda Yakin Menghapus Data Ini?",
          text: "Anda Tidak Bisa mengembalikan Data Ini Lagi",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Hapus!",
          cancelButtonText: "Batal!",
          reverseButtons: true
        })
        .then((result) => {
          if (result.isConfirmed) {
            // If the user confirms, navigate to the delete endpoint
            Swal.fire({
              title: "Terhapus!",
              text: "Data Anda Sudah Terhapus!",
              icon: "success",
              showConfirmButton: false,
              timer: 3000
            });
            location.href = '<?= base_url('Menu/delete_menu') ?>/' + idMenu + '/' + pk;
            
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
              title: "Batal",
              text: "Datamu Masih Ada :)",
              icon: "error"
            });
          }
        });
    }
</script>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../assets/admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/admin/js/off-canvas.js"></script>
  <script src="../../assets/admin/js/hoverable-collapse.js"></script>
  <script src="../../assets/admin/js/template.js"></script>
  <script src="../../assets/admin/js/settings.js"></script>
  <script src="../../assets/admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
