<div class="page-title-section">
    <div class="container">
        <h1>Siswa Berprestasi</h1>
        <p class="lead text-muted">Para siswa yang telah menunjukkan dedikasi dan meraih pencapaian gemilang.</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row d-flex">
            <?php if (!empty($siswa_berprestasi)): ?>
                <?php foreach ($siswa_berprestasi as $siswa): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="student-card">
                            <img src="<?= base_url('assets/images/siswa/' . $siswa['foto']); ?>" class="student-card__image" alt="Foto <?= $siswa['nama_siswa']; ?>">
                            <div class="student-card__overlay">
                                <h4 class="student-card__title"><?= $siswa['nama_siswa']; ?></h4>
                                <p class="student-card__subtitle"><?= $siswa['kelas']; ?></p>
                            </div>
                            <?php if ($siswa['juara'] > 0): ?>
                                <div class="student-card__badge">
                                    <i class="fas fa-trophy"></i> Juara <?= $siswa['juara']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted fs-5 mt-4">Data siswa berprestasi belum tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>