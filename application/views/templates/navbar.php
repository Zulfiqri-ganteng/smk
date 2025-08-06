<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo SMK Galajuara" width="35" height="35" class="d-inline-block align-text-top me-2">
            <span class="fw-bold">SMK GALAJUARA</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(1) == 'home' || $this->uri->segment(1) == '') ? 'active' : ''; ?>" href="<?= base_url('home'); ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($this->uri->segment(1) == 'about' || $this->uri->segment(1) == 'guru' || $this->uri->segment(1) == 'siswa') ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown">Profil Sekolah</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('about'); ?>">Tentang Kami</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('guru'); ?>">Data Guru</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('siswa'); ?>">Siswa Berprestasi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(1) == 'akademik') ? 'active' : ''; ?>" href="#">Akademik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(1) == 'humas') ? 'active' : ''; ?>" href="#">Humas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(1) == 'ekskul') ? 'active' : ''; ?>" href="#">Ekskul</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($this->uri->segment(1) == 'pengumuman' || $this->uri->segment(1) == 'gallery' || $this->uri->segment(1) == 'ebook') ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown">Informasi</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('pengumuman'); ?>">Pengumuman</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('gallery'); ?>">Galeri</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('ebook'); ?>">E-Book</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning <?= ($this->uri->segment(1) == 'ppdb') ? 'active' : ''; ?>" href="<?= base_url('ppdb'); ?>">PPDB</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(1) == 'kontak') ? 'active' : ''; ?>" href="<?= base_url('kontak'); ?>">Kontak</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if ($this->session->userdata('level')) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> <?= $this->session->userdata('nama_lengkap'); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="<?= base_url($this->session->userdata('level') . '/dashboard'); ?>">Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Logout</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sign-in" href="<?= base_url('auth'); ?>">
                            <i class="fas fa-sign-in-alt me-1"></i> Sign In
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>