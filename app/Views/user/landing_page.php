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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

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

        html {
            scroll-behavior: smooth;
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

    <!-- Hero Section Begin -->
    <section class="pd-hero-section set-bg" data-setbg="../assets/user/img/img1a.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="pd-hero-text">
                        <p class="room-location" style="text-align:center; margin:auto; color: white;">Selamat Datang</p>
                        <h2>WISATA JIMBARAN</h2>
                        <div class="room-price">
                            
                            <span style="color: #bfbfbf; font-size: 17px;">website untuk menampilkan berbagai macam informasi wisata yang ada di sekitar desa jimbaran.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    
    <!-- How It Works Section Begin -->
    <section class="howit-works spad" id = "tentang">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Tentang Desa Jimbaran</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-howit-works">
                        <p style="text-align: justify;">Desa Jimbaran, di selatan pulau Bali, menawarkan pesona wisata yang menggoda dengan 
                            pantainya yang panjang dan berpasir putih, menjadi latar belakang ideal untuk 
                            menikmati matahari terbenam yang spektakuler. Terkenal sebagai surga kuliner laut, 
                            warung-warung seafood di sepanjang pantainya mengundang para pengunjung untuk menikmati 
                            hidangan laut segar di tepi pantai, menciptakan pengalaman makan malam romantis dengan 
                            pemandangan laut yang indah. Selain itu, Jimbaran Bay menawarkan keindahan bawah laut yang 
                            menakjubkan, cocok untuk aktivitas snorkeling dan menyelam. Terdekat dengan Bandara Internasional 
                            Ngurah Rai, desa ini juga menyediakan berbagai akomodasi yang nyaman, mulai dari resor mewah 
                            hingga penginapan yang lebih terjangkau, dengan sebagian besar memberikan akses langsung ke pantai. 
                            Jimbaran, dengan sentuhan budaya dan tradisi Bali melalui Pura Uluwatu, serta pilihan aktivitas keluarga, 
                            menjadi destinasi wisata yang menarik untuk mereka yang mencari pengalaman istimewa di pulau Bali.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How It Works Section End -->

    <!-- Feature Section Begin -->
    <section class="feature-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Fitur Tekini</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="single-howit-works">
                        
                        <h4>Akomodasi Penginapan</h4>
                        <p>Fitur ini menyediakan data lengkap mengenai penginapan yang tersedia 
                            di sekitar desa jimbaran. Anda dapat mengetahui informasi seperti harga, 
                            fasilitas, ulasan, dan lokasi penginapan, memudahkan mereka dalam memilih 
                            akomodasi yang sesuai dengan preferensi dan anggaran.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-howit-works">
                        
                        <h4>Objek Wisata</h4>
                        <p>Fitur ini memberikan informasi tentang objek wisata di sekitar desa jimbaran. 
                            Pengguna dapat melihat deskripsi, foto, dan ulasan mengenai tempat-tempat 
                            menarik, sehingga dapat merencanakan kunjungan dengan lebih baik. Informasi 
                            ini juga membantu wisatawan memahami daya tarik dan nilai sejarah dari objek-objek 
                            wisata tersebut.</p>
                    </div>
                </div> 
                <div class="col-lg-3">
                    <div class="single-howit-works">
                        
                        <h4>Restoran</h4>
                        <p>Fitur ini menyajikan informasi tentang restoran yang ada di sekitar desa jimbaran. 
                            Pengguna dapat menemukan menu makanan dan minuman, ulasan, dan lokasi restoran, 
                            memungkinkan mereka untuk menikmati kuliner lokal.</p>
                    </div>
                </div> 
                <div class="col-lg-3">
                    <div class="single-howit-works">
                        
                        <h4>Tempat Rekreasi Wisata</h4>
                        <p>Fitur ini fokus pada memberikan informasi mengenai tempat rekreasi di sekitar desa 
                            jimbaran. Pengguna dapat mengetahui keberagaman aktivitas rekreasi, seperti taman 
                            atau wahana wisata, serta informasi praktis seperti jam operasional.</p>
                    </div>
                </div>            
            </div>
        </div>
    </section>
    <!-- Feature Section End -->

    <!-- Video Section Begin -->
    <div class="video-section set-bg" data-setbg="../assets/user/img/video-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-text">
                        <a href="https://www.youtube.com/watch?v=OaRVEv-1mY0" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                        <h4>Video</h4>
                        <h2>Desa Jimbaran</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Section End -->

    <!-- Top Properties Section Begin -->
    
    <!-- Top Properties Section End -->

    <!-- Agent Section Begin -->
    <section class="agent-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Kami Akan Membantu</span>
                        <h2>Our Mans</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="agent-carousel owl-carousel">
                    <div class="col-lg-3">
                        <div class="single-agent">
                            <div class="sa-pic">
                                <img src="../assets/user/img/agent/1.jpg" alt="">
                                <div class="hover-social">
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                </div>
                            </div>
                            <h5>I Gede Suputra <span>Raja Iblis </span></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single-agent">
                            <div class="sa-pic">
                                <img src="../assets/user/img/agent/2.jpg" alt="">
                                <div class="hover-social">
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                </div>
                            </div>
                            <h5>Kadek Agus Toni Pranata <span>Pemuda Masa Depan </span></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single-agent">
                            <div class="sa-pic">
                                <img src="../assets/user/img/agent/3.jpg" alt="">
                                <div class="hover-social">
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                </div>
                            </div>
                            <h5>I Ketut Deva Aditya Darma Putra <span>Calon Princess</span></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single-agent">
                            <div class="sa-pic">
                                <img src="../assets/user/img/agent/4.jpg" alt="">
                                <div class="hover-social">
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                </div>
                            </div>
                            <h5>Cokorda Gde Ashvin Jagadhita <span>Panglima Bangsawan</span></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single-agent">
                            <div class="sa-pic">
                                <img src="../assets/user/img/agent/5.jpg" alt="">
                                <div class="hover-social">
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                </div>
                            </div>
                            <h5>I Putu Agus Wira Kusuma <span>Peri Imutzz</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Agent Section End -->
    

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