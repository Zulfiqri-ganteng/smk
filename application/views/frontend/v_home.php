<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url('assets/images/slider/slider1.png'); ?>" class="d-block w-100" alt="Kegiatan Belajar">
            <div class="carousel-caption d-none d-md-block">
                <h5>Pendidikan Berkualitas</h5>
                <p>Menyediakan lingkungan belajar yang modern dan kondusif untuk prestasi.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('assets/images/slider/slider2.png'); ?>" class="d-block w-100" alt="Prestasi Siswa">
            <div class="carousel-caption d-none d-md-block">
                <h5>Generasi Kompeten</h5>
                <p>Mencetak lulusan yang siap bersaing di dunia kerja dan industri.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('assets/images/slider/slider3.png'); ?>" class="d-block w-100" alt="Ekstrakurikuler">
            <div class="carousel-caption d-none d-md-block">
                <h5>Kreatif dan Berkarakter</h5>
                <p>Mengembangkan bakat dan minat siswa melalui kegiatan ekstrakurikuler.</p>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<section class="py-5">
    ...

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center">
                    <img id="foto-kepsek" src="<?= base_url('assets/images/kepala_sekolah.jpg') ?>" class="img-fluid rounded-circle shadow" alt="Kepala Sekolah">
                </div>
                <div class="col-md-8">
                    <h2 class="section-title">Sambutan Kepala Sekolah</h2>
                    <p class="text-muted">Selamat datang di website resmi SMK Galajuara. Kami berkomitmen untuk menyediakan pendidikan kejuruan berkualitas yang relevan dengan kebutuhan industri. Melalui website ini, kami berharap dapat memberikan informasi yang lengkap mengenai kegiatan dan prestasi sekolah kami.</p>
                    <p><strong>Nama Kepala Sekolah, S.Pd., M.M.</strong></p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 section-bg">
        <div class="container">
            <h2 class="text-center section-title">Jurusan Unggulan</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 p-4 jurusan-card">
                        <div class="icon"><i class="fas fa-laptop-code"></i></div>
                        <h4 class="fw-bold">Teknik Komputer & Jaringan (TKJ)</h4>
                        <p class="text-muted">Mempelajari perakitan, instalasi, dan perbaikan komputer serta administrasi jaringan.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 p-4 jurusan-card">
                        <div class="icon"><i class="fas fa-camera-retro"></i></div>
                        <h4 class="fw-bold">Desain Komunikasi Visuak (DKV)</h4>
                        <p class="text-muted">Mengembangkan kreativitas dalam desain grafis, animasi, dan produksi video.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 p-4 jurusan-card">
                        <div class="icon"><i class="fas fa-cash-register"></i></div>
                        <h4 class="fw-bold">Akuntansi & Keuangan Lembaga (AKL)</h4>
                        <p class="text-muted">Menyiapkan tenaga profesional di bidang pembukuan, perpajakan, dan manajemen keuangan.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 p-4 jurusan-card">
                        <div class="icon"><i class="fas fa-briefcase"></i></div>
                        <h4 class="fw-bold">Manajemen Perkantoran (MP)</h4>
                        <p class="text-muted">Mempelajari administrasi, pengarsipan, dan teknologi untuk operasional kantor modern.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card h-100 p-4 jurusan-card">
                        <div class="icon"><i class="fas fa-pills"></i></div>
                        <h4 class="fw-bold">Farmasi</h4>
                        <p class="text-muted">Mendidik calon asisten tenaga kefarmasian yang kompeten di bidang pelayanan farmasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Pengumuman Terbaru</h2>
            <div class="row">
                <?php if (!empty($pengumuman_terbaru)) : foreach ($pengumuman_terbaru as $p) : ?>
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm h-100">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold" style="color: #0A2647;"><?= $p['judul']; ?></h5>
                                    <p class="card-text text-muted small"><i class="fas fa-calendar-alt me-2"></i><?= date('d F Y', strtotime($p['tanggal'])); ?></p>
                                    <p class="card-text"><?= word_limiter($p['isi'], 20); ?></p>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <a href="<?= base_url('pengumuman'); ?>" class="btn btn-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                else: ?>
                    <p class="text-center text-muted">Belum ada pengumuman terbaru.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>