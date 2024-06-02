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
    <link rel="stylesheet" href="../../../assets/user/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/user/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/user/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/user/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/user/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/user/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/user/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/user/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/user/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/user/css/style.css" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="../../../assets/user/nav/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../../assets/user/nav/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../assets/user/nav/css/style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .map-container {
            position: relative;
            overflow: hidden;
            padding-top: 56.25%;
            /* 16:9 aspect ratio */
        }

        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        p {
            color: black;
            text-align: justify;
        }

        /* Rating Komentar */
        .rating {
            display: flex;
            flex-direction: row-reverse;
            font-size: 24px;
        }

        .rating input {
            display: none;
        }

        .rating label {
            cursor: pointer;
            color: #888;
        }

        .rating label:hover,
        .rating label:hover~label,
        .rating input:checked~label {
            color: #f90;
        }

        /* Rating pada Komentar */
        .comment-rating {
            display: flex;
            flex-direction: row-reverse;
            font-size: 24px;
        }

        .comment-rating input {
            display: none;
        }

        .comment-rating label {
            cursor: default;
            /* Menonaktifkan kursor */
            color: #888;
        }

        .comment-rating input:checked~label {
            color: #f90;
        }
        
        /*rata - rata */
        .rating_rata {
            display: flex;
            flex-direction: row-reverse;
            font-size: 24px;
        }

        .rating_rata input {
            display: none;
        }

        .rating_rata label {
            cursor: default;
            color: #888;
        }

        .rating_rata input:checked~label {
            color: #f90;
        }

        #total_rata {
            font-size: 3rem;
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
    <?= $header; ?>
    <!-- Header End -->

    <!-- Blog Details Hero Section Begin -->
    <section class="blog-details-hero set-bg hero-section" data-setbg="../../../aktifitas_rekreasi/<?= $imgs->gambar_rekreasi ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bd-hero-text">
                        <h2 class="filtered-text"><?= $data[0]->nama_tempat ?></h2>
                        <h4 class="filtered-text"><?= $data[0]->alamat ?></h4>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Blog Details Hero Section Begin -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 offset-lg-1">
                </div>
                <div class="col-lg-8">
                    <div class="blog-details-title">
                        <!-- <h4>There is no better advertisement campaign that is low cost and also successful at the same
                            time.</h4> -->
                        <p><?= $data[0]->deskripsi ?></p>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2">
                    <div class="blog-details-title">
                        <h4>Harga Tiket Masuk</h4>
                        <p><?= $data[0]->biaya_masuk ?></p>

                        <div class="blog-quote">
                            <p>“Waktu Buka <?= $data[0]->nama_tempat ?>: <?= $data[0]->jam_operasi ?>”.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="blog-details-pic">
                        <br />
                        <div class="blog-more-details">
                            <h4>Foto Tempat Rekreasi Di <?= $data[0]->nama_tempat ?></h4>
                        </div>

                        <?php foreach ($img as $key => $img) : ?>
                            <?php if ($key === 0) : ?>
                                <div class="bd-pic-item small-item set-bg" data-setbg="../../../aktifitas_rekreasi/<?= $img->gambar_rekreasi ?>"></div>
                            <?php elseif ($key === 1) : ?>
                                <div class="bd-pic-item small-item set-bg" data-setbg="../../../aktifitas_rekreasi/<?= $img->gambar_rekreasi ?>"></div>
                            <?php else : ?>
                                <div class="bd-pic-item small-item set-bg" data-setbg="../../../aktifitas_rekreasi/<?= $img->gambar_rekreasi ?>"></div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="blog-more-details">
                        <h4>Lokasi Berdasarkan Map</h4>
                        <?php if (!empty($data[0]->peta)) : ?>
                            <div class="map-container">
                                <iframe src="<?= $data[0]->peta ?>" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        <?php else : ?>
                            <p>No map available</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="tag-share-option">
                    <!-- <div class="tags">
                            <a href="#">Real Estate</a>
                            <a href="#">Properties</a>
                        </div>
                        <div class="social-share">
                            <span>Share:</span>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="leave-comment p-4">
                    <h4>Komentar</h4>
                    <?php if (session('username')) : ?>
                        <form id="commentForm" action="<?= base_url('User/data_review_rekreasi') ?>" method="post">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="profile-logo">
                                        <img src="<?= session('picture') ?>" alt="Profile Picture" class="img-fluid rounded-circle">
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="commentTextarea" class="d-flex align-items-center"><?= session('username') ?></label>
                                        <div class="d-flex align-items-center">
                                            <label for="commentTextarea" class="mr-2">Rating:</label>
                                            <div class="rating">
                                                <input type="radio" id="star5" name="rating" value="5" required><label for="star5" title="5 stars">&#9733;</label>
                                                <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="4 stars">&#9733;</label>
                                                <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="3 stars">&#9733;</label>
                                                <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="2 stars">&#9733;</label>
                                                <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="1 star">&#9733;</label>
                                            </div>
                                        </div>
                                        <!-- Alert for Required Rating -->
                                        <div id="ratingAlert" class="alert alert-danger d-none" role="alert">
                                            Rating wajib diisi.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id" value="<?= session('id') ?>">
                                        <input type="hidden" class="form-control" name="jenis" value="<?= $data[0]->id_rekreasi ?>">
                                        <input type="hidden" class="form-control" name="nama" value="<?= $data[0]->nama_tempat ?>">
                                        <input type="hidden" class="form-control" name="tipe" value="rekreasi">
                                        <textarea class="form-control" id="commentTextarea" name="komentar" rows="3" placeholder="Write your comment here..." required></textarea>
                                        <!-- Alert for Required Comment -->
                                        <div id="commentAlert" class="alert alert-danger d-none mt-2" role="alert">
                                            Komentar wajib diisi.
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-success" onclick="validateAndSubmitForm()">Kirim Komentar</button>
                                </div>
                            </div>
                        </form>
                    <?php else : ?>
                        <div class="alert alert-warning" role="alert">
                            Jika ingin menggunakan fitur komentar, wajib login terlebih dahulu.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="leave-comment">
                    <h4>Rating dan Ulasan</h4>
                    <div style="display: flex;">
                        <div class="col-lg-3 text-center">
                            <div class="agent-desc" style="padding-bottom: 30px;">
                                <div class="agent-title">
                                    <h5 id="total_rata"><?= $rata ?></h5>
                                </div>
                                <div class="rating_rata justify-content-center">
                                    <input type="radio" id="stara" name="rating" value="5" <?php if ($rata == 5.0) echo 'checked'; ?>><label for="stara" title="5 stars" disabled>&#9733;</label>
                                    <input type="radio" id="starb" name="rating" value="4" <?php if ($rata >= 4.0 && $rata < 5.0) echo 'checked'; ?>><label for="starb" title="4 stars" disabled>&#9733;</label>
                                    <input type="radio" id="starc" name="rating" value="3" <?php if ($rata >= 3.0 && $rata < 4.0) echo 'checked'; ?>><label for="starc" title="3 stars" disabled>&#9733;</label>
                                    <input type="radio" id="stard" name="rating" value="2" <?php if ($rata >= 2.0 && $rata < 3.0) echo 'checked'; ?>><label for="stard" title="2 stars" disabled>&#9733;</label>
                                    <input type="radio" id="stare" name="rating" value="1" <?php if ($rata >= 1.0 && $rata < 2.0) echo 'checked'; ?>><label for="stare" title="1 star" disabled>&#9733;</label>
                                </div>

                                <span><?= count($komentar) ?> Ulasan</span>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <?php
                                $total_rating = array_sum($bar);
                                if ($total_rating > 0) {
                                    for ($i = 5; $i >= 1; $i--) {
                                        $ratingkey = 'rating' . $i;
                                        $ratingvalue = isset($bar[$ratingkey]) ? $bar[$ratingkey] : 0;
                                        $presentase = ($ratingvalue / $total_rating) * 100;
                                ?>
                                        <div class="col-lg-1"> <?php echo $i; ?> </div>
                                        <div class="col mt-1">
                                            <div class="progress mb-2 mt-1" style="height: 12px; border-radius: 10px;">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $presentase; ?>%;" aria-valuenow="<?= $presentase; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                <?php
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="comment-option p-4">
                    <?php foreach ($komentar as $commentIndex => $comment) : ?>
                        <div class="single-comment-item">
                            <div class="sc-author">
                                <img src="<?= $comment->picture ?>" alt="">
                            </div>
                            <div class="sc-text">
                                <span class="d-flex align-items-center">
                                    <div class="comment-rating">
                                        <?php for ($i = 5; $i >= 1; $i--) : ?>
                                            <input type="radio" id="star<?= $commentIndex ?>_<?= $i ?>" name="rating<?= $commentIndex ?>" value="<?= $i ?>" <?= ($comment->rating == $i) ? 'checked' : '' ?> disabled>
                                            <label for="star<?= $commentIndex ?>_<?= $i ?>" title="<?= $i ?> stars">&#9733;</label>
                                        <?php endfor; ?>
                                    </div>
                                </span>
                                <h5><?= $comment->username ?></h5>
                                <p><?= $comment->komen ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Partner Carousel Section Begin -->

    <!-- Partner Carousel Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section set-bg" data-setbg="../../../assets/user/img/footer-bg.jpg">
        <?= $footer; ?>
        <!-- Footer Section End -->

        <!-- Js Plugins -->
        <script src="../../../assets/user/js/jquery-3.3.1.min.js"></script>
        <script src="../../../assets/user/js/bootstrap.min.js"></script>
        <script src="../../../assets/user/js/jquery.magnific-popup.min.js"></script>
        <script src="../../../assets/user/js/jquery.nice-select.min.js"></script>
        <script src="../../../assets/user/js/jquery.slicknav.js"></script>
        <script src="../../../assets/user/js/jquery-ui.min.js"></script>
        <script src="../../../assets/user/js/owl.carousel.min.js"></script>
        <script src="../../../assets/user/js/main.js"></script>

        <script src="../../../assets/user/nav/js/popper.min.js"></script>
        <script src="../../../assets/user/nav/js/jquery.sticky.js"></script>
        <script src="../../../assets/user/nav/js/main.js"></script>

        <script>
            // Optional: Add this script if you want to display the selected rating in a tooltip
            document.addEventListener("DOMContentLoaded", function() {
                var commentStars = document.querySelectorAll('.comment-rating input');

                commentStars.forEach(function(star) {
                    star.addEventListener('change', function() {
                        var tooltip = this.nextElementSibling;
                        tooltip.setAttribute('data-original-title', this.title);
                    });
                });
            });

            function validateAndSubmitForm() {
                // Check if rating and comment are not empty
                var rating = document.querySelector('input[name="rating"]:checked');
                var komentar = document.querySelector('textarea[name="komentar"]');

                // Hide all alerts initially
                document.getElementById('ratingAlert').classList.add('d-none');
                document.getElementById('commentAlert').classList.add('d-none');

                if (!rating) {
                    // Show alert if rating is not filled
                    document.getElementById('ratingAlert').classList.remove('d-none');
                }

                if (!komentar.value.trim()) {
                    // Show alert if comment is not filled
                    document.getElementById('commentAlert').classList.remove('d-none');
                }

                if (rating && komentar.value.trim()) {
                    // Submit the form if validation passes
                    document.getElementById('commentForm').submit();
                }
            }
        </script>
</body>

</html>