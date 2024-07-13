<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/admincompany/styles.css">
</head>

<body>
    <?= $this->include('company/sidebar') ?>
    <div class="content">
        <div class="header">
            <h1>Dashboard</h1>
        </div>
        <div class="container">
            <div class="row">
                <?php if (session('role') === 'restoran') : ?>
                    <div class="col-md-4 mb-3">
                        <a href="<?= base_url('Main_company/detail_company') ?>" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Update Information</h5>
                                    <p class="card-text">Some data here...</p>
                                    <button class="btn btn-outline-primary">View Details</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="<?= base_url('Main_company/reservation') ?>" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Reservation Request</h5>
                                    <p class="card-text">Some data here...</p>
                                    <button class="btn btn-outline-primary">View Details</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="link3.html" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Print Report</h5>
                                    <p class="card-text">Some data here...</p>
                                    <button class="btn btn-outline-primary">View Details</button>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php elseif (session('role') === 'akomodasi') : ?>
                    <div class="col-md-4 mb-3">
                        <a href="<?= base_url('Main_company/detail_company') ?>" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Update Information</h5>
                                    <p class="card-text">Some data here...</p>
                                    <button class="btn btn-outline-primary">View Details</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="link3.html" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Print Report</h5>
                                    <p class="card-text">Some data here...</p>
                                    <button class="btn btn-outline-primary">View Details</button>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>