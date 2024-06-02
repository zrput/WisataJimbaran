<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Azenta Template">
    <meta name="keywords" content="Azenta, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wisata Jimbaran</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../assets/user/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/user/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/user/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../assets/user/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="../assets/user/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../assets/user/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/user/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/user/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../assets/user/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/user/css/style.css" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="../assets/user/nav/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../assets/user/nav/css/owl.carousel.min.css">

    <!-- Style -->
    <!-- jQuery -->

    <link rel="stylesheet" href="../assets/user/nav/css/style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .map-container {
            position: relative;
            overflow: hidden;
            padding-top: 56.25%; /* 16:9 aspect ratio */
        }

        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <?= $header;?>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Daftar <?= $title;?></h2>
                        <div class="breadcrumb-option">
                            <a href="<?= base_url('User')?>"><i class="fa fa-home"></i> Home</a>
                            <span><?= $title;?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section Begin -->

    <!-- Property Section Begin -->
    <section class="property-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="property-sidebar">
                        <h4>Cari Restoran</h4>
                        <form action="<?= base_url('User/cari_restoran') ?>" method="post" class="sidebar-search">
                            <div class="input-group">
                                <input type="search" class="form-control rounded" placeholder="nama restoran" aria-label="Search" aria-describedby="search-addon" name="nama"/>
                            </div>
                            <br>
                        
                            <button type="submit" class="search-btn">Cari</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-9">
                    <h4 class="property-title">Restoran</h4>
                    <div class="property-list">
                        <div class="single-property-item">
                            <div class="row">
                            <?php foreach ($data as $restoran) : ?>
                                <div class="col-md-4">
                                    <div class="property-pic">
                                        <img src="../restoran/<?= $gambarData[$restoran->id_restoran]; ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="property-text">
                                        <a href="<?= base_url('User/detail_restoran'). '/' . $restoran->id_restoran . '/' . $restoran->nama_restoran?>"><h5 class="r-title"><?= $restoran->nama_restoran; ?></h5></a>
                                        <div class="properties-location"><i class="icon_pin"></i> <?= $restoran->alamat; ?></div>
                                        <p style="text-align: justify;"><?= substr($restoran->deskripsi, 0, 200). '...'; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                        
                    <!-- <div class="property-pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Property Section End -->

    <!-- Footer Section Begin -->
    <?= $footer;?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="../assets/user/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/user/js/bootstrap.min.js"></script>
    <script src="../assets/user/js/jquery.magnific-popup.min.js"></script>
    <script src="../assets/user/js/jquery.nice-select.min.js"></script>
    <script src="../assets/user/js/jquery.slicknav.js"></script>
    <script src="../assets/user/js/jquery-ui.min.js"></script>
    <script src="../assets/user/js/owl.carousel.min.js"></script>
    <script src="../assets/user/js/main.js"></script>

    <script src="../assets/user/nav/js/popper.min.js"></script>
    <script src="../assets/user/nav/js/jquery.sticky.js"></script>
    <script src="../assets/user/nav/js/main.js"></script>
</body>

</html>