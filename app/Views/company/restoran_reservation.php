<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> Information</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/admincompany/styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
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
    </style>
</head>

<body>
    <?= $this->include('company/sidebar')?>

    <div class="content">
        <div class="header">
            <h1>Dashboard</h1>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <?php if (session('role') === 'restoran' || session('role') === 'akomodasi') : ?>
                    <div class="col-md-12">
                        <div class="table-container">
                            <button class="btn btn-primary btn-add">Add Data</button>
                            <table id="dataTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Penginapan</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Hotel Example</td>
                                        <td>123 Street, City</td>
                                        <td>email@example.com</td>
                                        <td>
                                            <button class="btn btn-success btn-action">View</button>
                                            <button class="btn btn-warning btn-action">Edit</button>
                                            <button class="btn btn-danger btn-action">Delete</button>
                                        </td>
                                    </tr>
                                    <!-- Add more rows as necessary -->
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>

</html>
