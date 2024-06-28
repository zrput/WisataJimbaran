<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-7/assets/css/login-7.css">
    <link rel="stylesheet" href="../assets/login/style.css">

    <title>Password</title>
</head>

<body>
    <section class="back p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <button class="btn btn-outline-secondary back-button mb-4" onclick="location.href='<?= base_url('Auth') ?>'">
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
                                        <h4 class="text-center">Password</h4>
                                    </div>
                                </div>
                            </div>
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-warning" id="sukses" role="alert">
                                    <button type="button" class="btn-close" onclick="document.getElementById('sukses').remove()"></button>
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>

                            <?php echo form_open('Auth/insert_pass') ?>
                            <div class="row gy-3 overflow-hidden">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="hidden" name="email" value="<?= session()->get('email'); ?>">
                                        <input type="hidden" name="username" value="<?= session()->get('username'); ?>">
                                        <input type="hidden" name="picture" value="<?= session()->get('picture'); ?>">
                                        <input type="password" class="form-control <?php echo session('errors.password') ? 'is-invalid' : '' ?>" name="password" id="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
                                        <label for="password" class="form-label">Password</label>
                                        <?php if (session('errors.password')) : ?>
                                            <div class="invalid-feedback">
                                                <?php echo session('errors.password'); ?>
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
        function destroy() {
            var div = document.getElementById("sukses");
            div.remove();
        }
    </script>
</body>

</html>
