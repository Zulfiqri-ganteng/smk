<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"><?= $tugas['judul_tugas']; ?></h5>
        </div>
        <div class="card-body">
            <p><strong>Deadline:</strong> <span class="badge bg-danger text-white"><?= date('d F Y, H:i', strtotime($tugas['deadline'])); ?> WIB</span></p>
            <hr>
            <h6>Deskripsi Tugas:</h6>
            <p><?= nl2br($tugas['deskripsi']); ?></p>

            <?php if ($tugas['file_tugas']) : ?>
                <hr>
                <h6>File Lampiran:</h6>
                <a href="<?= base_url('assets/files/tugas/' . $tugas['file_tugas']); ?>" class="btn btn-success" download>
                    <i class="fas fa-download me-1"></i> Unduh File Tugas
                </a>
            <?php endif; ?>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('siswa/tugas'); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>