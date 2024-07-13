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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .map-container {
            position: relative;
            overflow: hidden;
            padding-top: 56.25%;
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
            text-align: justify
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

    <!-- Property Details Hero Section Begin -->
    <section class="pd-hero-section set-bg" data-setbg="../../../akomodasi_penginapan/<?= $imgs->gambar_akomodasi; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="pd-hero-text">
                        <p class="room-location" style="text-align:center; margin:auto; color: white;"><i class="icon_pin"></i> <?= $data[0]->alamat; ?></p>
                        <h2><?= $data[0]->nama_penginapan; ?></h2>
                        <div class="room-price">
                            <span>Mulai Dari Harga:</span>
                            <p><?= 'Rp ' . number_format($data[0]->min, 0, ',', '.'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property Details Hero Section Begin -->

    <!-- Property Details Section Begin -->
    <section class="property-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="pd-details-text">
                        <div class="pd-details-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-send"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-print"></i></a>
                            <a href="#"><i class="fa fa-cloud-download"></i></a>
                        </div>
                        <div class="property-more-pic">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="../../../akomodasi_penginapan/<?php echo $img[0]->gambar_akomodasi; ?>" alt="" style="width: 500px; height: 100%;">
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <?php foreach ($img as $gambar) : ?>
                                        <div class="pt" data-imgbigurl="../../../akomodasi_penginapan/<?php echo $gambar->gambar_akomodasi; ?>">
                                            <img src="../../../akomodasi_penginapan/<?php echo pathinfo($gambar->gambar_akomodasi, PATHINFO_FILENAME); ?>.jpg" alt="" style=" height: 120px">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="pd-desc">
                            <h4>Deskripsi</h4>
                            <p><?= $data[0]->deskripsi; ?></p>
                        </div>
                        <div class="pd-details-tab">
                            <div class="tab-item">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#tab-1" role="tab">Ringkasan</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab-2" role="tab">Fasilitas</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-item-content">
                                <div class="tab-content">
                                    <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                        <div class="property-more-table">
                                            <table class="left-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="pt-name">Check-In</td>
                                                        <td class="p-value"><?= $data[0]->check_in; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-name">Check-Out</td>
                                                        <td class="p-value"><?= $data[0]->check_out; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-name">Jenis</td>
                                                        <td class="p-value"><?= $data[0]->tipe_penginapan; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-name">Email</td>
                                                        <td class="p-value"><?= $data[0]->email; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-name">Telepon</td>
                                                        <td class="p-value"><?= $data[0]->telepon; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="right-table">

                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                        <div class="pd-table-desc">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Jenis Fasilitas</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($fasilitas as $fasilitas_item) : ?>
                                                        <?php
                                                        $jenisFasilitas = strtolower($fasilitas_item->jenis_fasilitas);
                                                        $modalId = $jenisFasilitas . 'Modal';
                                                        ?>
                                                        <tr>
                                                            <td><?= ucfirst($fasilitas_item->nama_fasilitas); ?></td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $modalId; ?>">
                                                                    Lihat <?= ucfirst($jenisFasilitas); ?>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <!-- Modal for Kamar -->
                                    <?php foreach ($fasilitas as $fasilitas_item) : ?>
                                        <?php
                                        $jenisFasilitas = strtolower($fasilitas_item->jenis_fasilitas);
                                        $modalId = $jenisFasilitas . 'Modal';
                                        ?>

                                        <?php if ($jenisFasilitas === 'kamar' || $jenisFasilitas === 'restoran' || $jenisFasilitas === 'kolam' || $jenisFasilitas === 'event') : ?>
                                            <div class="modal fade" id="<?= $modalId; ?>" tabindex="-1" aria-labelledby="<?= $modalId . 'Label'; ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content p-4" style="overflow-y: auto;">
                                                        <div id="<?= $modalId; ?>Carousel" class="carousel slide carousel-fade" data-mdb-ride="carousel" data-mdb-carousel-init>
                                                            <div class="carousel-indicators">
                                                                <?php $imgIndex = 0; ?>
                                                                <?php foreach ($img_fasilitas as $img) : ?>
                                                                    <?php if ($img->id_fasilitas == $fasilitas_item->id_fasilitas) : ?>
                                                                        <button type="button" data-mdb-target="#<?= $modalId; ?>Carousel" data-mdb-slide-to="<?= $imgIndex; ?>" <?= $imgIndex === 0 ? 'class="active"' : ''; ?> aria-label="Slide <?= $imgIndex + 1; ?>"></button>
                                                                        <?php $imgIndex++; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </div>
                                                            <div class="carousel-inner">
                                                                <?php $imgIndex = 0; ?>
                                                                <?php foreach ($img_fasilitas as $img) : ?>
                                                                    <?php if ($img->id_fasilitas == $fasilitas_item->id_fasilitas) : ?>
                                                                        <div class="carousel-item <?= $imgIndex === 0 ? 'active' : ''; ?>">
                                                                            <img src="../../../fasilitas/<?= $img->gambar_fasilitas ?>" class="d-block w-100" alt="Fasilitas Image">
                                                                        </div>
                                                                        <?php $imgIndex++; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </div>
                                                            <button class="carousel-control-prev" type="button" data-mdb-target="#<?= $modalId; ?>Carousel" data-mdb-slide="prev">
                                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                <span class="visually-hidden">Previous</span>
                                                            </button>
                                                            <button class="carousel-control-next" type="button" data-mdb-target="#<?= $modalId; ?>Carousel" data-mdb-slide="next">
                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                <span class="visually-hidden">Next</span>
                                                            </button>
                                                        </div>
                                                        <p>Nama Fasilitas: <?= $fasilitas_item->nama_fasilitas; ?></p>
                                                        <p>Deskripsi: <?= $fasilitas_item->deskripsi; ?></p>

                                                        <?php if ($fasilitas_item->harga_fasilitas == '0') : ?>
                                                            <p>Harga Sewa Fasilitas: <?= $fasilitas_item->harga_fasilitas; ?> / Gratis</p>
                                                        <?php else : ?>
                                                            <p>Harga Sewa Fasilitas: <?= $fasilitas_item->harga_fasilitas; ?></p>
                                                        <?php endif; ?>
                                                        <div class="col-md-12">
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="property-map">
                            <h4>Lokasi Berdasarkan Map</h4>
                            <div class="map-inside">
                                <iframe src="<?= $data[0]->peta; ?>" height="320" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="property-contactus">
                            <h4>Komentar</h4>
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="leave-comment">
                                        <?php if (session('username')) : ?>
                                            <form id="commentForm" action="<?= base_url('User/data_review_penginapan') ?>" method="post">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <div class="profile-logo">
                                                            <?php if (strpos(session('picture'), 'https') !== false) : ?>
                                                                <img src="<?= session('picture') ?>" alt="test" class="rounded-circle" width="30" height="30">
                                                            <?php else : ?>
                                                                <img src="<?= base_url('uploads/profile_pictures/' . session('picture')) ?>" alt="User" class="rounded-circle" width="30" height="30">
                                                            <?php endif; ?>
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
                                                            <input type="hidden" class="form-control" name="jenis" value="<?= $data[0]->id_penginapan ?>">
                                                            <input type="hidden" class="form-control" name="nama" value="<?= $data[0]->nama_penginapan ?>">
                                                            <input type="hidden" class="form-control" name="tipe" value="penginapan">
                                                            <textarea class="form-control" id="commentTextarea" name="komentar" style="width: 840px; height: 180px;" rows="3" placeholder="Write your comment here..." required></textarea>
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
                        </div>
                        <div class="property-contactus">
                            <h4>Rating dan Ulasan</h4>
                            <div class="row">
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
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="comment-option p-4">
                                    <?php foreach ($komentar as $commentIndex => $comment) : ?>
                                        <div class="single-comment-item">
                                            <div class="sc-author">
                                                <?php if (strpos($comment->picture, 'https') !== false) : ?>
                                                    <img src="<?= $comment->picture ?>" alt="User" class="rounded-circle" width="80" height="80">
                                                <?php else : ?>
                                                    <img src="<?= base_url('uploads/profile_pictures/' . $comment->picture) ?>" alt="User" class="rounded-circle" width="80" height="80">
                                                <?php endif; ?>
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
                </div>
            </div>
        </div>
    </section>
    <!-- Property Details Section End -->

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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>


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

            $(document).ready(function() {
                // Inisialisasi carousel
                $('.carousel').carousel();
            });
        </script>

</body>

</html>