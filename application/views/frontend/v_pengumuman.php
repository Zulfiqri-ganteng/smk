<div class="container my-5">
    <h2 class="text-center section-title"><?= $judul; ?></h2>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="list-group">
                 <?php if (!empty($pengumuman)) : foreach ($pengumuman as $p) : ?>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start mb-3 shadow-sm">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?= $p['judul']; ?></h5>
                            <small class="text-muted"><?= date('d M Y', strtotime($p['tanggal'])); ?></small>
                        </div>
                        <p class="mb-1"><?= word_limiter($p['isi'], 30); ?></p>
                        <!-- <small class="text-primary">Baca selengkapnya...</small> -->
                    </a>
                 <?php endforeach; else : ?>
                     <p class="text-center">Belum ada pengumuman.</p>
                 <?php endif; ?>
            </div>
        </div>
    </div>
</div>