<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Siswa</h1>
    </div>

    <div class="alert alert-success shadow">
        <h4 class="alert-heading">Halo, <?= $this->session->userdata('nama_lengkap'); ?>!</h4>
        <p>Selamat datang di halaman dashboard Anda. Di sini Anda dapat mengakses semua fitur yang tersedia seperti mengerjakan ujian, melihat tugas, dan lainnya.</p>
        <hr>
        <p class="mb-0">Silakan pilih salah satu menu di bawah untuk memulai.</p>
    </div>

    <div class="row">

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="<?= base_url('siswa/ujian'); ?>" class="text-decoration-none">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Modul Utama</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Ujian Online</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-alt fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <a href="#" class="text-decoration-none">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Aktivitas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Lihat Tugas</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tasks fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <a href="#" class="text-decoration-none">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Akun Saya</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Profil Saya</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-circle fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>

</div>