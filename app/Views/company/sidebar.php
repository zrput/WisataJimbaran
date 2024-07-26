<div class="sidebar">
    <div class="profile">
        <?php if (session('picture')) : ?>
            <img src="<?= base_url('uploads/admincompic/' . session('picture')) ?>" alt="Profile Picture">
        <?php else : ?>
            <img src="<?= base_url('uploads/admincompic/' . "def.jpg") ?>" alt="test">
        <?php endif; ?>
        <h5 class="dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
            <?= session('username') ?>
        </h5>
        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item" href="#" style="color: black;">Settings</a></li>
            <li><a class="dropdown-item" href="<?= base_url('Auth/logout') ?>" style="color: black;">Logout</a></li>
        </ul>
    </div>
    <form id="dataForm" action="<?= base_url('Main_company/data_company') ?>" method="post" style="display:none; ">
        <input type="hidden" name="id" value="<?= session('id') ?>">
    </form>
    <?php if (session('role') === 'akomodasi') : ?>
        <a href="<?= base_url('Main_company') ?>" class="<?= ($page == 'dashboard') ? 'active' : '' ?>">Dashboard</a>
        <a class="<?= ($page == 'update-data') ? 'active' : '' ?>" onclick="document.getElementById('dataForm').submit();">Add & Update Data</a>
        <a href="#">Reports</a>
    <?php elseif (session('role') === 'restoran') : ?>
        <a href="<?= base_url('Main_company') ?>" class="<?= ($page == 'dashboard') ? 'active' : '' ?>">Dashboard</a>
        <a class="<?= ($page == 'update-data') ? 'active' : '' ?>" onclick="document.getElementById('dataForm').submit();">Add & Update Data</a>
        <form id="reservationForm" action="<?= base_url('Main_company/reservation') ?>" method="post" style="display:none;">
            <input type="hidden" name="id" value="<?= session('id') ?>">
        </form>
        <a class="<?= ($page == 'reservation') ? 'active' : '' ?>" onclick="document.getElementById('reservationForm').submit();">Reservation</a>
        <a href="<?= base_url('PdfController/reservasi_pdf/' . session('id')) ?>">Reports</a>
    <?php endif; ?>
</div>