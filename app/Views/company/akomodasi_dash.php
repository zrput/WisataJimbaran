<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard with Bootstrap 5</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-7/assets/css/login-7.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding-top: 20px;
        }

        .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .dropdown-menu {
            min-width: 150px;
        }

        .cards {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .card {
            flex: 1;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="profile">
                    <div class="text-center">
                        <img src="profile.jpg" alt="Profile Picture" class="img-fluid rounded-circle">
                        <h5 class="mt-2 mb-0 dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                            John Doe 
                        </h5>
                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="cards">
                    <a href="link1.html" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data 1</h5>
                                <p class="card-text">Some data here...</p>
                            </div>
                        </div>
                    </a>
                    <a href="link2.html" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data 2</h5>
                                <p class="card-text">Some data here...</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
