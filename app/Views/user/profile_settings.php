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

    <!-- Custom CSS for Profile Settings -->
    <link rel="stylesheet" href="/assets/user/css/profile_settings.css" type="text/css">

    <style>
        /* Custom styles for the profile settings page */
        .profile-settings-container {
            max-width: 800px;
            margin: 130px auto 50px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-header h2 {
            margin: 0;
            font-size: 24px;
        }

        .profile-header img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group input[type="file"] {
            padding: 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .read-only {
            background-color: #f1f1f1;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <!-- Header Section Begin -->
    <?= $header; ?>
    <!-- Header End -->
    <div class="container profile-settings-container">
        <div class="profile-header">
            <img src="<?= base_url('uploads/profile_pictures/' . $user->picture) ?>" alt="Profile Picture" id="profilePicture">
            <h2><?= $user->username ?></h2>
        </div>
        <form id="profileSettingsForm" action="<?= base_url('auth/updateProfile') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="profilePictureInput">Profile Picture</label>
                <input type="file" id="profilePictureInput" name="profilePicture" accept=".jpeg, .jpg, .png">
            </div>
            <div class="form-group">
                <label for="usernameInput">Username</label>
                <input type="text" id="usernameInput" name="username" value="<?= $user->username ?>">
            </div>
            <div class="form-group">
                <label for="emailInput">Email</label>
                <input type="email" id="emailInput" name="email" value="<?= $user->email ?>">
            </div>
            <div class="form-group">
                <label for="roleInput">Role</label>
                <input type="text" id="roleInput" name="role" value="<?= $user->role ?>" class="read-only" readonly>
            </div>
            <div class="form-group">
                <a href="<?= base_url('auth/confirmPassword') ?>" class="btn btn-secondary">Change Password</a>
            </div>
            <button type="submit" class="btn">Update Profile</button>
        </form>
    </div>

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