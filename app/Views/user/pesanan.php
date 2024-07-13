<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/assets/user/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/style.css" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="/assets/user/nav/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/assets/user/nav/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/user/nav/css/style.css">

    <style>
        .nav-tabs .nav-link {
            border: none;
            padding: 18px 25px;
            border-radius: 0;
            font-size: 16px;
        }

        .nav-tabs .nav-link.active {
            border-bottom: 2px solid #007bff;
            background-color: transparent;
        }

        .tab-content {
            padding: 30px 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons {
            text-align: center;
        }

        .action-buttons a {
            margin-right: 10px;
        }
    </style>

</head>

<body>
    <!-- Header Section Begin -->
    <?= $header; ?>
    <!-- Header End -->

    <!-- Main Content Section Begin -->
    <div class="container mt-5">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#penginapan">Penginapan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#restoran">Restoran</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tiket_restoran">Tiket Objek Wisata</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tiket_tempat_rekreasi">Tiket Tempat Rekreasi</a>
            </li>
        </ul>

        <div class="tab-content mt-4">
            <!-- Penginapan Tab -->
            <div id="penginapan" class="tab-pane fade show active">

            </div>

            <!-- Restoran Tab -->
            <div id="restoran" class="tab-pane fade show active">
                <h4>Reservasi Restoran</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Restoran</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Jumlah Orang</th>
                            <th>Catatan Khusus</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservasi_restoran as $reservation) : ?>
                            <tr>
                                <td><?= $reservation['nama_restoran']; ?></td>
                                <td><?= $reservation['nama']; ?></td>
                                <td><?= $reservation['email']; ?></td>
                                <td><?= $reservation['nomortelepon']; ?></td>
                                <td><?= $reservation['tanggal']; ?></td>
                                <td><?= $reservation['jam']; ?></td>
                                <td><?= $reservation['jumlahorang']; ?></td>
                                <td><?= $reservation['catatan']; ?></td>
                                <td style="padding: 8px; text-align: left; 
                                            <?php
                                            switch ($reservation['transaction_status']) {
                                                case 'Cancelled':
                                                    echo 'background-color: #f44336; color: white;';
                                                    break;
                                                case 'Pending':
                                                    echo 'background-color: #757575; color: white;';
                                                    break;
                                                case 'Settlement':
                                                    echo 'background-color: #4caf50; color: white;';
                                                    break;
                                                default:
                                                    echo ''; // Default style if none of the above cases match
                                                    break;
                                            }
                                            ?>
                                        ">
                                    <?= $reservation['transaction_status']; ?>
                                </td>
                                <td class="action-buttons">
                                    <!-- Cancel Button -->
                                    <?php if ($reservation['transaction_status'] == 'Pending' || $reservation['transaction_status'] == 'Settlement') : ?>
                                        <form action="<?= base_url('user/cancelReservation/' . $reservation['id']); ?>" method="post">
                                            <button type="submit" class="btn btn-danger">Cancel Reservation</button>
                                        </form>
                                    <?php endif; ?>
                                    <br> <!-- Add line break for spacing -->
                                    <!-- Delete Button -->
                                    <?php if ($reservation['transaction_status'] == 'Cancelled' || $reservation['transaction_status'] == 'Settlement') : ?>
                                        <form action="<?= base_url('user/deleteReservation/' . $reservation['id']); ?>" method="post">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <!-- Tiket Objek Wisata Tab -->
            <div id="tiket_objek_wisata" class="tab-pane fade">

            </div>

            <!-- Tiket Tempat Rekreasi Tab -->
            <div id="tiket_tempat_rekreasi" class="tab-pane fade">

            </div>
            <!-- Add more tab content for other sections -->
        </div>
    </div>
    <!-- Main Content Section End -->

    <!-- Footer Section Begin -->
    <?= $footer; ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="/assets/user/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/user/js/bootstrap.min.js"></script>
    <script src="/assets/user/js/jquery.magnific-popup.min.js"></script>
    <script src="/assets/user/js/jquery.nice-select.min.js"></script>
    <script src="/assets/user/js/jquery.slicknav.js"></script>
    <script src="/assets/user/js/jquery-ui.min.js"></script>
    <script src="/assets/user/js/owl.carousel.min.js"></script>
    <script src="/assets/user/js/main.js"></script>

    <script src="/assets/user/nav/js/popper.min.js"></script>
    <script src="/assets/user/nav/js/jquery.sticky.js"></script>
    <script src="/assets/user/nav/js/main.js"></script>
</body>

</html>