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
            background-color: #f0f2f5;
           
        }

        .card {
            background-color: rgba(255, 255, 255, 1);
            backdrop-filter: blur(10px);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.05) ;
        }

        .back-button {
            position: absolute;
            top: 15px;
            left: 15px;
        }
    </style>
    <title>Login</title>
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
                                        <h4 class="text-center">Welcome</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Nav Pills -->
                            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?= session('tab') == 'login' ? 'active' : '' ?>" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login" aria-selected="<?= session('tab') == 'login' ? 'true' : 'false' ?>">Login</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?= session('tab') == 'signup' ? 'active' : '' ?>" id="pills-signup-tab" data-bs-toggle="pill" data-bs-target="#pills-signup" type="button" role="tab" aria-controls="pills-signup" aria-selected="<?= session('tab') == 'signup' ? 'true' : 'false' ?>">Sign Up</button>
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
                                <!-- Login Form -->
                                <div class="tab-pane fade <?= session('tab') == 'login' ? 'show active' : '' ?>" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                                    <?= form_open('Auth/cek_login') ?>
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" name="email" id="email" placeholder="name@example.com" value="<?= set_value('email'); ?>">
                                                <label for="email" class="form-label" name="email">Email</label>
                                                <?php if (session('errors.email')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.email'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>" name="password" id="password" placeholder="Password">
                                                <label for="password" class="form-label" name="password">Password</label>
                                                <?php if (session('errors.password')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.password'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn bsb-btn-xl btn-primary" type="submit">Log in</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <hr class="mt-5 mb-4 border-secondary-subtle">
                                            <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                                <a href="#!" class="link-secondary text-decoration-none" id="create-new-account">Create new account</a>
                                                <a href="<?= base_url('Auth/forgot_password') ?>" class="link-secondary text-decoration-none">Forgot password</a>
                                            </div>
                                        </div>
                                    </div>
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
                                            <div class="form-floating mb-3">
                                                <select class="form-select <?= session('errors.status') ? 'is-invalid' : ''; ?>" name="status" id="dropdownSelect">
                                                    <option selected disabled>Pilih salah satu</option>
                                                    <option value="member">Member</option>
                                                    <option value="akomodasi">Akomodasi</option>
                                                    <option value="restoran">Restoran</option>
                                                </select>
                                                <label for="dropdownSelect" class="form-label">Pilih Status</label>
                                                <?php if (session('errors.status')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.status'); ?>
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
                                    <div class="row">
                                        <div class="col-12">
                                            <hr class="mt-5 mb-4 border-secondary-subtle">
                                            <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                                <a href="#!" class="link-secondary text-decoration-none" id="already-account-link">Already have an account?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="mt-5 mb-5">Or sign up with</p>
                                            <div class="d-flex gap-2 gap-sm-3 justify-content-center">
                                                <a href="<?= $link ?>" class="btn btn-lg btn-outline-danger p-3 lh-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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