<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-7/assets/css/login-7.css">
    <link rel="stylesheet" href="../assets/login/style.css">

    <title>Forgot Password</title>
</head>

<body>
    <section class="back p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <button class="btn btn-outline-secondary back-button" onclick="location.href='<?= base_url('Auth') ?>'">
                                ←
                            </button>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5">
                                        <div class="text-center mb-4">
                                            <a href="#!">
                                                <img src="../assets/scale.png" alt="Logo" width="130" height="120">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if (isset($pesan)) : ?>
                                <div class="alert alert-warning alert-dismissible fade show fs-5" role="alert">
                                    <?= $pesan; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <button type="button" class="btn btn-primary btn-lg d-flex justify-content-center" onclick="home()">Login</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function home() {
            window.location.href = "<?= base_url('Auth') ?>";
        }
    </script>
</body>

</html>