<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
        <div id="live-clock" class="d-none d-sm-block text-gray-700"><i class="fas fa-calendar-alt"></i>&nbsp;<span class="fw-bold"></span></div>
        <ul class="navbar-nav ml-auto">
        </ul>
    </nav> -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">WebDev</div>


    </a>
    <hr class="sidebar-divider my-0">


    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Manajemen Data
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Utama</span>
        </a>
        <div id="collapseData" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('admin/guru'); ?>">Data Guru</a>
                <a class="collapse-item" href="<?= base_url('admin/siswa'); ?>">Data Siswa</a>
                <a class="collapse-item" href="<?= base_url('admin/kelas'); ?>">Data Kelas</a>
                <a class="collapse-item" href="<?= base_url('admin/mapel'); ?>">Data Mapel</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKonten">
            <i class="fas fa-fw fa-desktop"></i>
            <span>Konten Website</span>
        </a>
        <div id="collapseKonten" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('admin/pengumuman'); ?>">Pengumuman</a>
                <a class="collapse-item" href="<?= base_url('admin/gallery'); ?>">Gallery</a>
                <a class="collapse-item" href="<?= base_url('admin/ebook'); ?>">E-Book</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkademik">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Akademik</span>
        </a>
        <div id="collapseAkademik" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('admin/ujian'); ?>">Manajemen Ujian</a>
                <a class="collapse-item" href="<?= base_url('admin/ppdb'); ?>">Manajemen PPDB</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Pengaturan
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Sistem</span>
        </a>
        <div id="collapsePengaturan" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#"><i class="fas fa-user-edit fa-fw me-2"></i> Profil Admin</a>
                <a class="collapse-item" href="#"><i class="fas fa-key fa-fw me-2"></i> Ganti Password</a>
                <a class="collapse-item" href="#"><i class="fas fa-database fa-fw me-2"></i> Backup Database</a>
                <a class="collapse-item" href="#"><i class="fas fa-cog fa-fw me-2"></i> Pengaturan Web</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>


</ul>