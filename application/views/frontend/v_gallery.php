<div class="page-title-section">
    <div class="container">
        <h1><?= $judul; ?></h1>
        <p class="lead text-muted">Momen dan kegiatan yang terdokumentasi di sekolah kami.</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row">
            <?php if (!empty($daftar_foto)): ?>
                <?php foreach ($daftar_foto as $item): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="gallery-item">
                            <?php if ($item['tipe'] == 'gambar'): ?>
                                <a href="<?= base_url('assets/images/gallery/' . $item['nama_file']); ?>" class="glightbox" data-gallery="gallery-school" data-title="<?= $item['judul_foto']; ?>">
                                    <img src="<?= base_url('assets/images/gallery/' . $item['nama_file']); ?>" class="img-fluid" alt="<?= $item['judul_foto']; ?>" style="height: 250px; width: 100%; object-fit: cover;">
                                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                                </a>
                            <?php elseif ($item['tipe'] == 'youtube' && $item['youtube_id']): ?>
                                <a href="https://img.youtube.com/vi/YOUTUBE_ID/hqdefault.jpg8<?= $item['youtube_id']; ?>" class="glightbox" data-gallery="gallery-school" data-title="<?= $item['judul_foto']; ?>">
                                    <img src="https://img.youtube.com/vi/YOUTUBE_ID/hqdefault.jpg9<?= $item['youtube_id']; ?>/hqdefault.jpg" class="img-fluid" alt="<?= $item['judul_foto']; ?>" style="height: 250px; width: 100%; object-fit: cover;">
                                    <div class="gallery-overlay"><i class="fas fa-play-circle"></i></div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted fs-5 mt-4">Belum ada media di galeri.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>