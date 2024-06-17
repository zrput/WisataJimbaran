<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-7/assets/css/login-7.css">
    <style>
        body .back {
            background: linear-gradient(124deg, #ff2400, #e81d1d, #e8b71d, #e3e81d, #1de840, #1ddde8, #2b1de8, #dd00f3, #dd00f3);
            background-size: 1800% 1800%;

            -webkit-animation: rainbow 18s ease infinite;
            -moz-animation: rainbow 18s ease infinite;
            -o-animation: rainbow 18s ease infinite;
            animation: rainbow 18s ease infinite;
        }

        @-webkit-keyframes rainbow {
            0% {
                background-position: 0% 82%
            }

            50% {
                background-position: 100% 19%
            }

            100% {
                background-position: 0% 82%
            }
        }

        @-moz-keyframes rainbow {
            0% {
                background-position: 0% 82%
            }

            50% {
                background-position: 100% 19%
            }

            100% {
                background-position: 0% 82%
            }
        }

        @-o-keyframes rainbow {
            0% {
                background-position: 0% 82%
            }

            50% {
                background-position: 100% 19%
            }

            100% {
                background-position: 0% 82%
            }
        }

        @keyframes rainbow {
            0% {
                background-position: 0% 82%
            }

            50% {
                background-position: 100% 19%
            }

            100% {
                background-position: 0% 82%
            }
        }

        .card {
            height: 585px;
            background-color: rgba(255, 255, 255, 0.6);
            /* Warna putih dengan 80% opacity */
            backdrop-filter: blur(10px);
            /* Membuat efek blur di belakang card */

        }
    </style>
    <title>Change Password</title>
</head>

<body>
    <section class="back p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5">
                                        <div class="text-center mb-4">
                                            <a href="#!">
                                                <img src="../assets/scale.png" alt="Logo" width="130" height="120">
                                            </a>
                                        </div>
                                        <h4 class="text-center">Change Password</h4>
                                    </div>
                                </div>
                            </div>
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-warning" id="sukses" role="alert">
                                    <button type="button" class="btn btn-warning" onclick="document.getElementById('sukses').remove()">
                                        x
                                    </button>
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>

                            <?php echo form_open('Auth/changepass') ?>
                            <div class="row gy-3 overflow-hidden">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control <?php echo session('errors.password') ? 'is-invalid' : ''; ?>" name="password" id="password-signup" placeholder="Password">
                                        <label for="password-signup" class="form-label">Password</label>
                                        <?php if (session('errors.password')) : ?>
                                            <div class="invalid-feedback">
                                                <?php echo session('errors.password'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control <?php echo session('errors.confirm-password') ? 'is-invalid' : ''; ?>" name="confirm-password" id="confirm-password" placeholder="Confirm Password">
                                        <label for="confirm-password" class="form-label">Confirm Password</label>
                                        <?php if (session('errors.confirm-password')) : ?>
                                            <div class="invalid-feedback">
                                                <?php echo session('errors.confirm-password'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn bsb-btn-xl btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function destory() {
            var div = document.getElementById("sukses");
            div.destory();
        }
    </script>
</body>

</html>