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
        <?php if (session('role') === 'akomodasi') : ?>
            <a href="<?= base_url('Main_company') ?>" class="<?= ($page == 'dashboard') ? 'active' : '' ?>">Dashboard</a>
            <a href="<?= base_url('Main_company/form_company') ?>" class="<?= ($page == 'update-data') ? 'active' : '' ?>">Update Data</a>
            <a href="#">Reports</a>
        <?php elseif (session('role') === 'restoran') : ?>
            <a href="<?= base_url('Main_company') ?>" class="<?= ($page == 'dashboard') ? 'active' : '' ?>">Dashboard</a>
            <a href="<?= base_url('Main_company/form_company/') ?>" class="<?= ($page == 'update-data') ? 'active' : '' ?>">Update Data</a>
            <a href="<?= base_url('Main_company/reservation/3') ?>" class="<?= ($page == 'reservation') ? 'active' : '' ?>">Reservation</a>
            <a href="#">Reports</a>
        <?php endif; ?>
    </div>
