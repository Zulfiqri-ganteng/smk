<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"><?= $tugas['judul_tugas']; ?></h5>
        </div>
        <div class="card-body">
            <p><strong>Deadline:</strong> <span class="badge bg-danger text-white"><?= date('d F Y, H:i', strtotime($tugas['deadline'])); ?> WIB</span></p>
            <hr>
            <h6>Deskripsi Tugas:</h6>
            <p><?= nl2br($tugas['deskripsi']); ?></p>

            <hr>

            <?php if ($jawaban): ?>
                <h5 class="mt-4">Jawaban Anda</h5>
                <p>Anda sudah mengumpulkan tugas ini pada <?= date('d F Y, H:i', strtotime($jawaban['tanggal_kumpul'])); ?> WIB.</p>
                <div class="alert alert-warning">Tugas Anda sedang menunggu penilaian dari guru.</div>
            <?php else: ?>
                <h5 class="mt-4">Kumpulkan Jawaban</h5>
                <form action="<?= base_url('siswa/tugas/kumpul_jawaban/' . $tugas['id']); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Upload File Jawaban</label>
                        <input type="file" name="file_jawaban" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-upload me-1"></i> Kumpul Tugas
                    </button>
                </form>
            <?php endif; ?>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('siswa/tugas'); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>