<div class="page-title-section">
    <div class="container">
        <h1>Pengumuman Sekolah</h1>
    </div>
</div>

<div class="container py-5">
    <?php if (!empty($pengumuman)): ?>
        <?php foreach ($pengumuman as $p): ?>
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title"><?= $p['judul']; ?></h4>
                    <p class="card-subtitle mb-2 text-muted">
                        <i class="fas fa-calendar-alt"></i> <?= date('d F Y', strtotime($p['tanggal'])); ?>
                    </p>
                    <hr>
                    <p class="card-text"><?= nl2br($p['isi']); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center text-muted">Belum ada pengumuman.</p>
    <?php endif; ?>
</div>