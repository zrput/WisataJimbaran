<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-7/assets/css/login-7.css">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .card {
            text-align: center;
        }
        .success-icon {
            font-size: 6rem;
            color: #28a745;
        }
        .error-icon {
            font-size: 6rem;
            color: #dc3545;
        }
        .message {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
    </style>
    <title>Account Status</title>
</head>

<body>
    <section class="back p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <div class="card border border-light-subtle rounded-4 shadow">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <?php if ($pesan === 'berhasil verifikasi') : ?>
                                    <div class="mb-4">
                                        <div class="success-icon">
                                            &#10004;
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="message">Account Verified</p>
                                        <p>Your account has been successfully verified. You can now access all features.</p>
                                    </div>
                                    <?php elseif ($pesan === 'gagal verifikasi') : ?>
                                    <div class="mb-4">
                                        <div class="error-icon">
                                            &#10060;
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="message">Verification Failed</p>
                                        <p>There was an issue verifying your account. Please try again later or contact support.</p>
                                    </div>
                                    <?php endif; ?>
                                    <div class="mb-4">
                                        <a href="<?= base_url('User') ?>" class="btn btn-primary">Go to Homepage</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
