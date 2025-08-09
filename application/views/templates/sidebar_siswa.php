<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('siswa/dashboard'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-graduate"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SISWA PANEL</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('siswa/dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Kegiatan
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('siswa/ujian'); ?>">
            <i class="fas fa-fw fa-file-alt"></i><span>Ujian Online</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('siswa/tugas'); ?>">
            <i class="fas fa-fw fa-book"></i><span>Tugas Harian</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('siswa/ebook'); ?>">
            <i class="fas fa-fw fa-book-open"></i><span>E-Book Saya</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>