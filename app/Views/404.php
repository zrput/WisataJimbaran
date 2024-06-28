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
        .error-code {
            font-size: 6rem;
            font-weight: bold;
            color: #dc3545;
        }
        .error-message {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
    </style>
    <title>404 Not Found</title>
</head>

<body>
    <section class="back p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4 shadow">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <h1 class="error-code">404</h1>
                                    </div>
                                    <div class="mb-4">
                                        <p class="error-message">Page Not Found</p>
                                        <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                                    </div>
                                    <div class="mb-4">
                                        <a href="<?= base_url('User')?>" class="btn btn-primary">Go to Homepage</a>
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
