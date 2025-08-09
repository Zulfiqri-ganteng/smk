<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-file-alt me-2"></i><?= $judul; ?></h1>

    <?php if (!empty($ujian_tersedia)): ?>
        <div class="row">
            <?php foreach ($ujian_tersedia as $u): ?>
                <div class="col-md-6 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-primary"><?= $u['judul_ujian']; ?></h5>
                            <p class="card-text mb-1"><i class="fas fa-book fa-fw me-2 text-gray-400"></i><strong>Mata Pelajaran:</strong> <?= $u['mapel']; ?></p>
                            <p class="card-text"><i class="fas fa-clock fa-fw me-2 text-gray-400"></i><strong>Durasi:</strong> <?= $u['waktu_menit']; ?> Menit</p>
                            <div class="mt-auto">
                                <a href="<?= base_url('siswa/ujian/kerjakan/' . $u['id']); ?>" class="btn btn-primary">
                                    <i class="fas fa-play-circle me-1"></i> Mulai Kerjakan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center mt-5">
            <i class="fas fa-cloud-moon fa-4x text-gray-400 mb-3"></i>
            <h4>Tidak Ada Ujian Aktif</h4>
            <p class="text-muted">Saat ini tidak ada jadwal ujian yang tersedia untuk Anda.</p>
        </div>
    <?php endif; ?>
</div>