<header class="site-navbar js-sticky-header site-navbar-target" role="banner">

  <div class="container">
    <div class="row align-items-center position-relative">


      <div class="site-logo">
        <a href="<?= base_url('User') ?>" class="text-black"><span class="text-primary">Wisata Jimbaran</a>
      </div>

      <div class="col-12">
        <nav class="site-navigation text-right ml-auto " role="navigation">

          <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
            <li><a href="<?= base_url('User') ?>" class="nav-link">Utama</a></li>
            <li><a href="#services-section" class="nav-link">Tentang</a></li>


            <li class="has-children">
              <a href="#about-section" class="nav-link">fitur</a>
              <ul class="dropdown arrow-top">
                <li><a href="<?= base_url('User/akomodasi_penginapan') ?>" class="nav-link">Penginapan</a></li>
                <li><a href="<?= base_url('User/objek_wisata') ?>" class="nav-link">Objek Wisata</a></li>
                <li><a href="<?= base_url('User/restoran') ?>" class="nav-link">Restoran</a></li>
                <li><a href="<?= base_url('User/rekreasi_wisata') ?>" class="nav-link">Tempat Rekreasi</a></li>
              </ul>
            </li>


            <?php if (session()->has('email')) : ?>
              <!-- Jika user sudah login -->
              <li class="has-children">
                <a href="#about-section" class="nav-link">
                  <img src="<?= base_url('uploads/profile_pictures/' . session('picture')) ?>" alt="User" class="rounded-circle" width="30" height="30">
                </a>
                <ul class="dropdown arrow-top" style="max-width: 150px;">
                  <li><a href="<?= base_url('Auth/profileSettings') ?>" class="nav-link">Pengaturan</a></li>
                  <li><a href="<?= base_url('User/pesanan') ?>" class="nav-link">Pesanan Saya</a></li>
                  <li><a href="<?= base_url('Auth/logout') ?>" class="nav-link">Keluar</a></li>
                </ul>
              </li>
            <?php else : ?>
              <!-- Jika user belum login -->
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Auth') ?>">
                  <button class="btn btn-primary" type="button">Login</button>
                </a>
              </li>
            <?php endif; ?>


          </ul>
        </nav>
      </div>

      <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

    </div>
  </div>

</header>