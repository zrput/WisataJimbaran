<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> Information</title>
    <link rel="stylesheet" href="../../assets/admincompany/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-action {
            margin-right: 5px;
        }

        .btn-add {
            margin-bottom: 20px;
        }

        .column-small {
            width: 10% !important;
        }

        .column-medium {
            width: 20% !important;
        }

        .position-relative {
            position: relative;
        }

        .select-with-icon {
            padding-right: 30px;
        }

        .select-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
            color: #aaa;
        }

        .image-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .button-container {
            display: flex;
            gap: 5px;
        }
    </style>
</head>

<body>
    <?= $this->include('company/sidebar') ?>

    <div class="content">
        <div class="header">
            <h1><?= $page ?></h1>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <?php if (session('role') === 'akomodasi') : ?>
                    <div class="col-md-12">
                        <div class="table-container">
                            <button class="btn btn-primary btn-add" data-bs-toggle="modal" data-bs-target="#add-modal">Add Data</button>
                            <table id="dataTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Fasiltias</th>
                                        <th>Harga</th>
                                        <th>Jenis Fasilitas</th>
                                        <th>Deskripsi</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($fasilitas as $datas) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $datas->nama_fasilitas ?></td>
                                            <td><?= $datas->harga_fasilitas ?></td>
                                            <td><?= $datas->jenis_fasilitas ?></td>
                                            <td><?= $datas->deskripsi ?></td>
                                            <td>
                                                <button class="btn btn-warning btn-action btn-edit" data-id="<?= $datas->id_fasilitas ?>">Edit</button>
                                                <button class="btn btn-danger btn-action btn-delete" data-id="<?= $datas->id_fasilitas ?>">Delete</button>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else : ?>
                    <!-- Other roles content -->
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="restoranModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="restoranModalLabel">Add Data Fasilitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-container">
                        <form id="dataForm" method="post" action="<?= base_url('Main_company/add_up_fasilitas') ?>" enctype="multipart/form-data">
                            <input type="hidden" id="id_fasilitas" name="id_fasilitas">
                            <input type="hidden" id="id_penginapan" name="id_penginapan" value="<?= $company->id_penginapan ?>">
                            <input type="hidden" id="id_user" name="id_user" value="<?= session('id') ?>">
                            <div class="mb-3">
                                <label for="namaFasilitas" class="form-label">Nama Fasilitas</label>
                                <input type="text" class="form-control" id="namaFasilitas" name="namaFasilitas" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenisFasilitas" class="form-label">Jenis Fasilitas</label>
                                <select class="form-select" id="jenisFasilitas" name="jenisFasilitas" required>
                                    <option value="">Pilih Jenis Fasilitas</option>
                                    <option value="kamar">Kamar</option>
                                    <option value="restoran">Restoran</option>
                                    <option value="kolam">Kolam</option>
                                    <option value="event">Event</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar[]" multiple="true" accept="image/jpeg, image/png, image/jpg">
                            </div>
                            <div class="mb-3" id="existingImages">
                                <!-- Existing images will be displayed here -->
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            $('#dataTable').DataTable();

            $('.btn-edit').on('click', function() {
                console.log("Edit button clicked");

                const id = $(this).data('id');
                $.ajax({
                    url: '<?= base_url('Main_company/get_data_fasilitas') ?>/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log("Data fetched successfully");

                        $('#id_fasilitas').val(response.fasilitas.id_fasilitas);
                        $('#namaFasilitas').val(response.fasilitas.nama_fasilitas);
                        $('#harga').val(response.fasilitas.harga_fasilitas);
                        $('#jenisFasilitas').val(response.fasilitas.jenis_fasilitas);
                        $('#deskripsi').val(response.fasilitas.deskripsi);

                        $('#existingImages').empty();
                        response.img.forEach(img => {
                            const imgElement = document.createElement('div');
                            imgElement.classList.add('image-item');
                            imgElement.id = 'image-' + img.id_gambar;

                            const fileName = document.createElement('span');
                            fileName.textContent = img.gambar_fasilitas;

                            const buttonContainer = document.createElement('div');
                            buttonContainer.classList.add('button-container');

                            const viewButton = document.createElement('button');
                            viewButton.textContent = 'View';
                            viewButton.classList.add('btn', 'btn-outline-primary', 'btn-sm');
                            viewButton.type = 'button';
                            viewButton.onclick = () => showFullSizeImage('<?= base_url('fasilitas/') ?>' + img.gambar_fasilitas);

                            const deleteButton = document.createElement('button');
                            deleteButton.textContent = 'Delete';
                            deleteButton.classList.add('btn', 'btn-outline-danger', 'btn-sm');
                            deleteButton.type = 'button';
                            deleteButton.onclick = () => deleteImage(img.id_gambar);

                            buttonContainer.appendChild(viewButton);
                            buttonContainer.appendChild(deleteButton);

                            imgElement.appendChild(fileName);
                            imgElement.appendChild(buttonContainer);
                            $('#existingImages').append(imgElement);
                        });

                        $('#add-modal').modal('show');
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while fetching data'
                        });
                    }
                });
            });

            function showFullSizeImage(url) {
                Swal.fire({
                    imageUrl: url,
                    imageHeight: '90vh',
                    showCloseButton: true,
                    showConfirmButton: false
                });
            }

            function deleteImage(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '<?= base_url('Main_company/delete_image_fasilitas') ?>/' + id,
                            type: 'DELETE',
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your image has been deleted.',
                                    'success'
                                ).then(() => {
                                    $('#image-' + id).remove();
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'An error occurred while deleting image'
                                });
                            }
                        });
                    }
                });
            }

            // Clear modal data when "Add Data" button is clicked
            $('.btn-add').on('click', function() {
                $('#existingImages').empty();
                $('#id_fasilitas').val('');
                $('#namaFasilitas').val('');
                $('#harga').val('');
                $('#jenisFasilitas').val('');
                $('#deskripsi').val('');
            });

            // Delete fasilitas
            $('.btn-delete').on('click', function() {
                
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '<?= base_url('Main_company/delete_fasilitas') ?>/' + id,
                            type: 'DELETE',
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your data has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'An error occurred while deleting data'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>