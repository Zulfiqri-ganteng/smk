<div class="page-title-section">
    <div class="container">
        <h1><?= $judul; ?></h1>
        <p class="lead text-muted">Tenaga pendidik profesional yang berdedikasi untuk kemajuan siswa.</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row">

            <?php if (!empty($daftar_guru)): ?>
                <?php foreach ($daftar_guru as $guru): ?>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="teacher-card">
                            <img src="<?= base_url('assets/images/guru/' . $guru['foto']); ?>" class="teacher-img" alt="Foto <?= $guru['nama_guru']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $guru['nama_guru']; ?></h5>
                                <p class="card-subtitle"><?= $guru['mapel']; ?></p>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted fs-5 mt-4">Data guru belum tersedia.</p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>