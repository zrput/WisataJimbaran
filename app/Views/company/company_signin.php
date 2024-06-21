<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-7/assets/css/login-7.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .back {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(124deg, #ff2400, #e81d1d, #e8b71d, #e3e81d, #1de840, #1ddde8, #2b1de8, #dd00f3, #dd00f3);
            background-size: 1800% 1800%;
            animation: rainbow 18s ease infinite;
        }

        @keyframes rainbow {
            0% {
                background-position: 0% 82%;
            }

            50% {
                background-position: 100% 19%;
            }

            100% {
                background-position: 0% 82%;
            }
        }

        .card {
            background-color: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
        }

        .back-button {
            position: absolute;
            top: 15px;
            left: 15px;
        }
    </style>
    <title>Signin Company</title>
</head>

<body>
    <section class="back p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <button class="btn btn-outline-secondary back-button" onclick="location.href='<?= base_url('User/main') ?>'">
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
                                        <h4 class="text-center">Signin Company</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Nav Pills -->
                            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?= session('tab') == 'login' ? 'active' : '' ?>" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login" aria-selected="<?= session('tab') == 'login' ? 'true' : 'false' ?>">Akomodasi</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?= session('tab') == 'signup' ? 'active' : '' ?>" id="pills-signup-tab" data-bs-toggle="pill" data-bs-target="#pills-signup" type="button" role="tab" aria-controls="pills-signup" aria-selected="<?= session('tab') == 'signup' ? 'true' : 'false' ?>">Restoran</button>
                                </li>
                            </ul>
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success" id="sukses" role="alert">
                                    <button type="button" class="btn btn-ccess" onclick="document.getElementById('sukses').remove()">
                                        x
                                    </button>
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="tab-content" id="pills-tabContent">
                                <!-- restoran Form -->
                                <div class="tab-pane fade <?= session('tab') == 'login' ? 'show active' : '' ?>" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                                    <?= form_open('Auth/cek_akomodasi'); ?>
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="hidden" name="role" value="akomodasi">
                                                <input type="text" class="form-control <?= session('errors.re_username') ? 'is-invalid' : ''; ?>" name="re_username" id="username" placeholder="Username" value="<?= set_value('re_username'); ?>">
                                                <label for="username" class="form-label">Username</label>
                                                <?php if (session('errors.re_username')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.re_username'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control <?= session('errors.re_email') ? 'is-invalid' : ''; ?>" name="re_email" id="email-signup" placeholder="name@example.com" value="<?= set_value('re_emailup'); ?>">
                                                <label for="email-signup" class="form-label">Email</label>
                                                <?php if (session('errors.re_email')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.re_email'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control <?= session('errors.re_password') ? 'is-invalid' : ''; ?>" name="re_passwordup" id="password-signup" placeholder="Password">
                                                <label for="password-signup" class="form-label">Password</label>
                                                <?php if (session('errors.re_password')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.re_password'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control <?= session('errors.re_confirm-password') ? 'is-invalid' : ''; ?>" name="re_confirm-password" id="confirm-password" placeholder="Confirm Password">
                                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                                <?php if (session('errors.re_confirm-password')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.re_confirm-password'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn bsb-btn-xl btn-primary" type="submit">Sign Up</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                                <!-- Sign Up Form -->
                                <div class="tab-pane fade <?= session('tab') == 'signup' ? 'show active' : '' ?>" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
                                    <?= form_open('Auth/cek_signup'); ?>
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control <?= session('errors.username') ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="Username" value="<?= set_value('username'); ?>">
                                                <label for="username" class="form-label">Username</label>
                                                <?php if (session('errors.username')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.username'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control <?= session('errors.username') ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="Username" value="<?= set_value('username'); ?>">
                                                <label for="username" class="form-label">Username</label>
                                                <?php if (session('errors.username')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.username'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control <?= session('errors.username') ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="Username" value="<?= set_value('username'); ?>">
                                                <label for="username" class="form-label">Username</label>
                                                <?php if (session('errors.username')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.username'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control <?= session('errors.emailup') ? 'is-invalid' : ''; ?>" name="emailup" id="email-signup" placeholder="name@example.com" value="<?= set_value('emailup'); ?>">
                                                <label for="email-signup" class="form-label">Email</label>
                                                <?php if (session('errors.emailup')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.emailup'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control <?= session('errors.passwordup') ? 'is-invalid' : ''; ?>" name="passwordup" id="password-signup" placeholder="Password">
                                                <label for="password-signup" class="form-label">Password</label>
                                                <?php if (session('errors.passwordup')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.passwordup'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control <?= session('errors.confirm-password') ? 'is-invalid' : ''; ?>" name="confirm-password" id="confirm-password" placeholder="Confirm Password">
                                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                                <?php if (session('errors.confirm-password')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.confirm-password'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn bsb-btn-xl btn-primary" type="submit">Sign Up</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('already-account-link').addEventListener('click', function() {
            document.getElementById('pills-login-tab').click();
        });
        document.getElementById('create-new-account').addEventListener('click', function() {
            document.getElementById('pills-signup-tab').click();
        });

        // Maintain the active tab state on page reload
        window.addEventListener('load', function() {
            const activeTab = "<?= session('tab'); ?>";
            if (activeTab) {
                const tab = document.querySelector(`#pills-${activeTab}-tab`);
                if (tab) {
                    tab.click();
                }
            }
        });

        function destroy() {
            var div = document.getElementById("sukses");
            div.remove();
        }
    </script>
</body>

</html>