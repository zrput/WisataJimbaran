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
                <?php if (session('role') === 'restoran') : ?>
                    <div class="col-md-12">
                        <div class="table-container">
                            <button class="btn btn-primary btn-add" data-bs-toggle="modal" data-bs-target="#add-modal">Add Data</button>
                            <table id="dataTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Menu</th>
                                        <th>Harga</th>
                                        <th>Jenis Menu</th>
                                        <th>Deskripsi</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($menu as $datas) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $datas->nama_menu ?></td>
                                            <td><?= $datas->harga_menu ?></td>
                                            <td><?= $datas->jenis_menu ?></td>
                                            <td><?= $datas->deskripsi ?></td>
                                            <td>
                                                <button class="btn btn-warning btn-action btn-edit" data-id="<?= $datas->id_menu ?>">Edit</button>
                                                <button class="btn btn-danger btn-action btn-delete" data-id="<?= $datas->id_menu ?>">Delete</button>
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

    <div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="menuModalLabel">Add Data Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-container">
                        <form id="dataForm" method="post" action="<?= base_url('Main_company/add_up_menu') ?>" enctype="multipart/form-data">
                            <input type="hidden" id="id_menu" name="id_menu">
                            <input type="hidden" id="id_restoran" name="id_restoran" value="<?= $company->id_restoran ?>">
                            <input type="hidden" id="id_user" name="id_user" value="<?= session('id') ?>">
                            <div class="mb-3">
                                <label for="namaMenu" class="form-label">Nama Menu</label>
                                <input type="text" class="form-control" id="namaMenu" name="namaMenu" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenisMenu" class="form-label">Jenis Menu</label>
                                <select class="form-select" id="jenisMenu" name="jenisMenu" required>
                                    <option value="">Pilih Jenis Menu</option>
                                    <option value="makanan">Makanan</option>
                                    <option value="minuman">Minuman</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/jpeg, image/png, image/jpg">
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
                    url: '<?= base_url('Main_company/get_data_menu') ?>/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {

                        $('#id_menu').val(response.menu.id_menu);
                        $('#namaMenu').val(response.menu.nama_menu);
                        $('#harga').val(response.menu.harga_menu);
                        $('#jenisMenu').val(response.menu.jenis_menu);
                        $('#deskripsi').val(response.menu.deskripsi);

                        $('#existingImages').empty();
                        if (response.menu && response.menu.gambar_menu) {
                            const img = response.menu.gambar_menu;

                            const imgElement = document.createElement('div');
                            imgElement.classList.add('image-item');

                            const fileName = document.createElement('span');
                            fileName.textContent = img;

                            const buttonContainer = document.createElement('div');
                            buttonContainer.classList.add('button-container');

                            const viewButton = document.createElement('button');
                            viewButton.textContent = 'View';
                            viewButton.classList.add('btn', 'btn-outline-primary', 'btn-sm');
                            viewButton.type = 'button';
                            viewButton.onclick = () => showFullSizeImage('<?= base_url('menu/') ?>' + img);

                            buttonContainer.appendChild(viewButton);

                            imgElement.appendChild(fileName);
                            imgElement.appendChild(buttonContainer);
                            $('#existingImages').append(imgElement);
                        };

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
                    showCloseButton: true,
                    showConfirmButton: false
                });
            }

            // Clear modal data when "Add Data" button is clicked
            $('.btn-add').on('click', function() {
                $('#existingImages').empty();
                $('#id_menu').val('');
                $('#namaMenu').val('');
                $('#harga').val('');
                $('#jenisMenu').val('');
                $('#deskripsi').val('');
            });

            // Delete 
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
                            url: '<?= base_url('Main_company/delete_menu') ?>/' + id,
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