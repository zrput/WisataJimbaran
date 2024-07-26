<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> Information</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/admincompany/styles.css">
    <style>
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .is-invalid {
            border-color: #dc3545;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875em;
        }

        .image-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .button-container {
            display: flex;
            gap: 10px;
        }

        .card-disabled {
            background-color: #f0f0f0;
            border: 1px solid #dcdcdc;
            pointer-events: none;
        }

        .card-disabled .card-body {
            color: #a0a0a0;
        }

        .card-disabled .btn {
            background-color: #dcdcdc;
            border-color: #dcdcdc;
            color: #a0a0a0;
        }

        .card:hover {
            box-shadow: none;
        }
    </style>
</head>

<body>
    <?= $this->include('company/sidebar') ?>
    <?php if (session('role') === 'akomodasi') : ?>
        <div class="content">
            <div class="header">
                <h1>Penginapan Information</h1>
            </div>
            <div class="container card-container">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Detail Penginapan Information</h5>
                                <p class="card-text">Some data here...</p>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#akomodasiModal" onclick="viewDetail('akomodasi')">View</button>
                                <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#akomodasiModal" onclick="editDetail('akomodasi')">Add & Edit</button>
                                <button class="btn btn-outline-danger" onclick="deleteDetail('akomodasi')">Delete</button>
                            </div>
                        </div>
                    </div>
                    <?php if ($company) : ?>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Detail Fasilitas Penginapan</h5>
                                    <p class="card-text">Some data here...</p>
                                    <button class="btn btn-outline-primary" onclick="window.location.href = '<?= base_url('Main_company/data_fasilitas/' . session('id')) ?>' ">Detail</button>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="col-md-4 mb-3">
                            <div class="card card-disabled">
                                <div class="card-body">
                                    <h5 class="card-title">Detail Fasilitas Penginapan</h5>
                                    <p class="card-text">No data available...</p>
                                    <button class="btn btn-outline-primary" disabled>Detail</button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="modal fade" id="akomodasiModal" tabindex="-1" aria-labelledby="akomodasiModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="akomodasiModalLabel">Detail Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-container">
                                <form id="akomodasiForm" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="nama_penginapan" class="form-label">Nama Penginapan</label>
                                        <input type="text" class="form-control" id="nama_penginapan" name="nama_penginapan">
                                        <input type="hidden" id="id_user" name="id_user" value="<?= session('id') ?>">
                                        <div class="error-message" id="nama_penginapan_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tipe_penginapan" class="form-label">Pilih Tipe Penginapan</label>
                                        <select class="form-select" id="tipe_penginapan" name="tipe_penginapan">
                                            <option value="">Pilih Tipe</option>
                                            <option value="Hotel">Hotel</option>
                                            <option value="Villa">Villa</option>
                                            <option value="Homestay">Homestay</option>
                                        </select>
                                        <div class="error-message" id="tipe_penginapan_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat_penginapan" class="form-label">Alamat Penginapan</label>
                                        <input type="text" class="form-control" id="alamat_penginapan" name="alamat_penginapan">
                                        <div class="error-message" id="alamat_penginapan_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga_termurah" class="form-label">Harga Termurah dari Fasilitas Kamar</label>
                                        <input type="number" class="form-control" id="harga_termurah" name="harga_termurah">
                                        <div class="error-message" id="harga_termurah_error"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="checkin_time" class="form-label">Waktu Check In Penginapan</label>
                                            <input type="time" class="form-control" id="checkin_time" name="checkin_time">
                                            <div class="error-message" id="checkin_time_error"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="checkout_time" class="form-label">Waktu Check Out Penginapan</label>
                                            <input type="time" class="form-control" id="checkout_time" name="checkout_time">
                                            <div class="error-message" id="checkout_time_error"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email_penginapan" class="form-label">Email Penginapan</label>
                                        <input type="email" class="form-control" id="email_penginapan" name="email_penginapan">
                                        <div class="error-message" id="email_penginapan_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telepon_penginapan" class="form-label">Nomor Telepon Penginapan</label>
                                        <input type="text" class="form-control" id="telepon_penginapan" name="telepon_penginapan">
                                        <div class="error-message" id="telepon_penginapan_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="link_peta" class="form-label">Link Peta Map</label>
                                        <input type="text" class="form-control" id="link_peta" name="link_peta">
                                        <div class="error-message" id="link_peta_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gambar_penginapan" class="form-label">Upload Gambar Penginapan</label>
                                        <input type="file" class="form-control" id="gambar_penginapan" name="img[]" multiple="true" accept="image/jpeg, image/png, image/jpg">
                                        <div class="error-message" id="gambar_penginapan_error"></div>
                                    </div>
                                    <div class="mb-3" id="existingImages">
                                        <!-- Existing images will be displayed here -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
                                        <div class="error-message" id="deskripsi_error"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal for full-size image -->
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel">Full-size Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img id="fullSizeImage" src="" class="img-fluid" alt="Full-size Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <?php elseif (session('role') === 'restoran') : ?>
        <div class="content">
            <div class="header">
                <h1>Restoran Information</h1>
            </div>
            <div class="container card-container">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Detail Restoran Information</h5>
                                <p class="card-text">Some data here...</p>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#restoranModal" onclick="viewDetail('restoran')">View</button>
                                <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#restoranModal" onclick="editDetail('restoran')">Add & Edit</button>
                                <button class="btn btn-outline-danger" onclick="deleteDetail('restoran')">Delete</button>
                            </div>
                        </div>
                    </div>
                    <?php if ($company) : ?>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Detail Menu Information</h5>
                                    <p class="card-text">Some data here...</p>
                                    <button class="btn btn-outline-primary" onclick="window.location.href = '<?= base_url('Main_company/data_menu/' . session('id')) ?>' ">Detail</button>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="col-md-4 mb-3">
                            <div class="card card-disabled">
                                <div class="card-body">
                                    <h5 class="card-title">Detail Menu Information</h5>
                                    <p class="card-text">No data available...</p>
                                    <button class="btn btn-outline-primary" disabled>Detail</button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="modal fade" id="restoranModal" tabindex="-1" aria-labelledby="restoranModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="restoranModalLabel">Detail Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-container">
                                <form id="restoranForm" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="nama_restoran" class="form-label">Nama Restoran</label>
                                        <input type="text" class="form-control" id="nama_restoran" name="nama_restoran" required>
                                        <input type="hidden" id="id_user" name="id_user" value="<?= session('id') ?>">
                                        <div class="error-message" id="nama_restoran_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat_restoran" class="form-label">Alamat Restoran</label>
                                        <input type="text" class="form-control" id="alamat_restoran" name="alamat_restoran" required>
                                        <div class="error-message" id="alamat_restoran_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jam_buka_restoran" class="form-label">Jam Buka Restoran</label>
                                        <input type="text" class="form-control" id="jam_buka_restoran" name="jam_buka_restoran" placeholder="10.00 AM - 10.00 PM" required>
                                        <div class="error-message" id="jam_buka_restoran_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telepon_restoran" class="form-label">No Telepon Restoran</label>
                                        <input type="text" class="form-control" id="telepon_restoran" name="telepon_restoran" required>
                                        <div class="error-message" id="telepon_restoran_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="max_person" class="form-label">Maksimal Orang Reservasi</label>
                                        <input type="text" class="form-control" id="max_person" name="max_person" required>
                                        <div class="error-message" id="max_person_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="link_peta" class="form-label">Link Peta Map</label>
                                        <input type="text" class="form-control" id="link_peta" name="link_peta" required>
                                        <div class="error-message" id="link_peta_error"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gambar_restoran" class="form-label">Upload Gambar Restoran</label>
                                        <input type="file" class="form-control" id="gambar_restoran" name="img_resto[]" multiple="true" accept="image/jpeg, image/png, image/jpg">
                                        <div class="error-message" id="gambar_restoran_error"></div>
                                    </div>
                                    <div class="mb-3" id="existingImages">
                                        <!-- Existing images will be displayed here -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsiresto" name="deskripsiresto" rows="4" required></textarea>
                                        <div class="error-message" id="deskripsiresto_error"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal for full-size image -->
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel">Full-size Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img id="fullSizeImage" src="" class="img-fluid" alt="Full-size Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function viewDetail(role) {
            // Menyembunyikan tombol submit saat melihat detail
            document.getElementById('submitBtn').style.display = 'none';

            // Mengatur semua input menjadi read-only
            setReadOnly(true);
            fetch('<?= base_url('Main_company/get_company') ?>/' + <?= session('id') ?> + '/' + role)
                .then(response => response.json())
                .then(data => {
                    const company = data.data.company;
                    const gambar = data.data.gambar;

                    if (role == 'akomodasi') {
                        // Mengisi form dengan data yang diterima
                        document.getElementById('nama_penginapan').value = company.nama_penginapan;
                        document.getElementById('tipe_penginapan').value = company.tipe_penginapan;
                        document.getElementById('alamat_penginapan').value = company.alamat;
                        document.getElementById('harga_termurah').value = company.min;
                        document.getElementById('checkin_time').value = company.check_in;
                        document.getElementById('checkout_time').value = company.check_out;
                        document.getElementById('email_penginapan').value = company.email;
                        document.getElementById('telepon_penginapan').value = company.telepon;
                        document.getElementById('link_peta').value = company.peta;
                        document.getElementById('deskripsi').value = company.deskripsi;
                        document.getElementById('gambar_penginapan').required = false;

                        // Menampilkan gambar yang sudah ada (opsional)
                        const imageContainer = document.getElementById('existingImages');
                        imageContainer.innerHTML = '';
                        gambar.forEach(img => {
                            const imgElement = document.createElement('div');
                            imgElement.classList.add('image-item');

                            const fileName = document.createElement('span');
                            fileName.textContent = img.gambar_akomodasi;

                            const viewButton = document.createElement('button');
                            viewButton.textContent = 'View';
                            viewButton.classList.add('btn', 'btn-outline-primary', 'btn-sm');
                            viewButton.type = 'button';
                            viewButton.onclick = () => showFullSizeImage('<?= base_url('akomodasi_penginapan/') ?>' + img.gambar_akomodasi);

                            imgElement.appendChild(fileName);
                            imgElement.appendChild(viewButton);
                            imageContainer.appendChild(imgElement);
                        });
                    } else if (role == 'restoran') {
                        document.getElementById('nama_restoran').value = company.nama_restoran;
                        document.getElementById('alamat_restoran').value = company.alamat;
                        document.getElementById('jam_buka_restoran').value = company.jam_buka;
                        document.getElementById('telepon_restoran').value = company.telepon;
                        document.getElementById('max_person').value = company.max_person;
                        document.getElementById('link_peta').value = company.peta;
                        document.getElementById('deskripsiresto').value = company.deskripsi;
                        document.getElementById('gambar_restoran').required = false;

                        // Menampilkan gambar yang sudah ada (opsional)
                        const imageContainer = document.getElementById('existingImages');
                        imageContainer.innerHTML = '';
                        gambar.forEach(img => {
                            const imgElement = document.createElement('div');
                            imgElement.classList.add('image-item');

                            const fileName = document.createElement('span');
                            fileName.textContent = img.gambar_restoran;

                            const viewButton = document.createElement('button');
                            viewButton.textContent = 'View';
                            viewButton.classList.add('btn', 'btn-outline-primary', 'btn-sm');
                            viewButton.type = 'button';
                            viewButton.onclick = () => showFullSizeImage('<?= base_url('restoran/') ?>' + img.gambar_restoran);

                            imgElement.appendChild(fileName);
                            imgElement.appendChild(viewButton);
                            imageContainer.appendChild(imgElement);
                        });
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: "error",
                        title: "Data belum dimasukkan atau Terjadi kesalahan saat mengambil data!",
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
        }

        function showFullSizeImage(imageUrl) {
            const fullSizeImage = document.getElementById('fullSizeImage');
            fullSizeImage.src = imageUrl;
            const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
            imageModal.show();
        }

        function editDetail(role) {
            // Implementasi fungsi untuk mengedit data
            document.getElementById('submitBtn').style.display = 'block';
            // Mengatur semua input menjadi editable
            setReadOnly(false);

            fetch('<?= base_url('Main_company/get_company') ?>/' + <?= session('id') ?> + '/' + role)
                .then(response => response.json())
                .then(data => {
                    const company = data.data.company;
                    const gambar = data.data.gambar;
                    const imageContainer = document.getElementById('existingImages');
                    imageContainer.innerHTML = ''; // Clear the image container
                    if (role == 'akomodasi') {
                        // Mengisi form dengan data yang diterima
                        document.getElementById('nama_penginapan').value = company.nama_penginapan;
                        document.getElementById('tipe_penginapan').value = company.tipe_penginapan;
                        document.getElementById('alamat_penginapan').value = company.alamat;
                        document.getElementById('harga_termurah').value = company.min;
                        document.getElementById('checkin_time').value = company.check_in;
                        document.getElementById('checkout_time').value = company.check_out;
                        document.getElementById('email_penginapan').value = company.email;
                        document.getElementById('telepon_penginapan').value = company.telepon;
                        document.getElementById('link_peta').value = company.peta;
                        document.getElementById('deskripsi').value = company.deskripsi;
                        document.getElementById('gambar_penginapan').required = false;

                        // Menampilkan gambar yang sudah ada
                        gambar.forEach(img => {
                            const imgElement = document.createElement('div');
                            imgElement.classList.add('image-item');
                            imgElement.id = 'image-' + img.id_gambar;

                            const fileName = document.createElement('span');
                            fileName.textContent = img.gambar_akomodasi;

                            const buttonContainer = document.createElement('div');
                            buttonContainer.classList.add('button-container');

                            const viewButton = document.createElement('button');
                            viewButton.textContent = 'View';
                            viewButton.classList.add('btn', 'btn-outline-primary', 'btn-sm');
                            viewButton.type = 'button';
                            viewButton.onclick = () => showFullSizeImage('<?= base_url('akomodasi_penginapan/') ?>' + img.gambar_akomodasi);

                            const deleteButton = document.createElement('button');
                            deleteButton.textContent = 'Delete';
                            deleteButton.classList.add('btn', 'btn-outline-danger', 'btn-sm');
                            deleteButton.type = 'button';
                            deleteButton.onclick = () => deleteImage(img.id_gambar, role);

                            buttonContainer.appendChild(viewButton);
                            buttonContainer.appendChild(deleteButton);

                            imgElement.appendChild(fileName);
                            imgElement.appendChild(buttonContainer);
                            imageContainer.appendChild(imgElement);
                        });

                    } else if (role == 'restoran') {
                        document.getElementById('nama_restoran').value = company.nama_restoran;
                        document.getElementById('alamat_restoran').value = company.alamat;
                        document.getElementById('jam_buka_restoran').value = company.jam_buka;
                        document.getElementById('telepon_restoran').value = company.telepon;
                        document.getElementById('max_person').value = company.max_person;
                        document.getElementById('link_peta').value = company.peta;
                        document.getElementById('deskripsiresto').value = company.deskripsi;
                        document.getElementById('gambar_restoran').required = false;

                        // Menampilkan gambar yang sudah ada
                        gambar.forEach(img => {
                            const imgElement = document.createElement('div');
                            imgElement.classList.add('image-item');
                            imgElement.id = 'image-' + img.id_gambar;

                            const fileName = document.createElement('span');
                            fileName.textContent = img.gambar_restoran;

                            const buttonContainer = document.createElement('div');
                            buttonContainer.classList.add('button-container');

                            const viewButton = document.createElement('button');
                            viewButton.textContent = 'View';
                            viewButton.classList.add('btn', 'btn-outline-primary', 'btn-sm');
                            viewButton.type = 'button';
                            viewButton.onclick = () => showFullSizeImage('<?= base_url('restoran/') ?>' + img.gambar_restoran);

                            const deleteButton = document.createElement('button');
                            deleteButton.textContent = 'Delete';
                            deleteButton.classList.add('btn', 'btn-outline-danger', 'btn-sm');
                            deleteButton.type = 'button';
                            deleteButton.onclick = () => deleteImage(img.id_gambar, role);

                            buttonContainer.appendChild(viewButton);
                            buttonContainer.appendChild(deleteButton);

                            imgElement.appendChild(fileName);
                            imgElement.appendChild(buttonContainer);
                            imageContainer.appendChild(imgElement);
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: "error",
                        title: "Data belum dimasukkan atau Terjadi kesalahan saat mengambil data!",
                        showConfirmButton: false,
                        timer: 2000
                    });
                });

        }

        function deleteImage(imageId, role) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('Main_company/delete_image') ?>',
                        type: 'POST',
                        data: {
                            id: imageId,
                            role: role
                        },
                        success: function(response) {
                            if (response.success) {
                                // Remove image element from the DOM
                                document.getElementById('image-' + imageId).remove();

                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                            } else {
                                Swal.fire({
                                    title: "Failed!",
                                    text: "Failed to delete image.",
                                    icon: "error"
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: "Error!",
                                text: "Error while deleting image.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }

        function deleteDetail(role) {
            // Implementasi fungsi untuk menghapus data
            id = <?= session('id') ?>;

            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Ini akan menghapus semua data fasilitas and penginapan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, hapus ini!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('Main_company/delete_company') ?>/' + id + '/' + role,
                        type: 'DELETE',
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'data berhasil dihapus!',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Data tidak ada atau gagal menghapus data!'
                            });
                        }
                    });
                }
            });
        }
        // Fungsi untuk mengatur input menjadi read-only atau editable
        function setReadOnly(isReadOnly) {
            const inputs = document.querySelectorAll('#akomodasiForm input, #akomodasiForm select, #akomodasiForm textarea, #restoranForm input, #restoranForm select, #restoranForm textarea');
            inputs.forEach(input => {
                input.readOnly = isReadOnly;
                input.disabled = isReadOnly; // Disabled untuk select input
            });
        }

        $(document).ready(function() {
            $('#akomodasiForm').on('submit', function(e) {
                e.preventDefault();

                // Validasi form
                var isValid = true;

                // Bersihkan pesan kesalahan sebelumnya
                $('.error-message').text('');

                $('#akomodasiForm').find('input, select, textarea').each(function() {
                    if ($(this).val() === '') {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        $('#' + $(this).attr('id') + '_error').text('Field ini wajib diisi.');
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });

                if (!isValid) {
                    return;
                }

                // Kirim data menggunakan AJAX
                var formData = new FormData(this);
                // Debug: Periksa isi dari formData
                for (var pair of formData.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }
                $.ajax({
                    url: '<?= base_url('Main_company/in_up_akomodasi') ?>',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data berhasil disimpan!',
                            }).then(function() {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Data gagal disimpan!',
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Terjadi kesalahan saat mengirim data!',
                        });
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#restoranForm').on('submit', function(e) {
                e.preventDefault();

                // Validasi form
                var isValid = true;

                // Bersihkan pesan kesalahan sebelumnya
                $('.error-message').text('');

                $('#restoranForm').find('input, select, textarea').each(function() {
                    if ($(this).val() === '') {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        $('#' + $(this).attr('id') + '_error').text('Field ini wajib diisi.');
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });

                if (!isValid) {
                    return; // Hentikan eksekusi lebih lanjut jika validasi gagal
                }

                var formData = new FormData(this);
                $.ajax({
                    url: '<?= base_url('Main_company/in_up_restoran') ?>',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data berhasil disimpan!',
                            }).then(function() {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Data gagal disimpan!',
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Terjadi kesalahan saat mengirim data!',
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>