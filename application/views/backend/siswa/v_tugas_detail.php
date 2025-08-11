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

            <?php if ($tugas['file_tugas']) : ?>
                <hr>
                <h6>File Lampiran dari Guru:</h6>
                <a href="<?= base_url('uploads/file_tugas/' . $tugas['file_tugas']); ?>" class="btn btn-success" download>
                    <i class="fas fa-download me-1"></i> Unduh File Tugas
                </a>
            <?php endif; ?>

            <hr>

            <?php if ($jawaban): ?>
                <h5 class="mt-4">Jawaban Anda</h5>
                <p>
                    Anda sudah mengumpulkan tugas ini pada <?= date('d F Y, H:i', strtotime($jawaban['tanggal_kumpul'])); ?> WIB.
                    <a href="<?= base_url('uploads/jawaban_tugas/' . $jawaban['file_jawaban']); ?>" class="ms-3" download><i class="fas fa-download"></i> Unduh Jawaban Anda</a>
                </p>

                <?php if ($jawaban['status'] == 'Sudah Dinilai'): ?>
                    <div class="alert alert-success">
                        <h6 class="alert-heading">Tugas Sudah Dinilai!</h6>
                        <p>Nilai: <strong><?= $jawaban['nilai']; ?></strong></p>
                        <hr>
                        <p class="mb-0">Komentar Guru: <?= $jawaban['komentar_guru'] ? nl2br($jawaban['komentar_guru']) : '-'; ?></p>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning">
                        <i class="fas fa-spinner fa-spin me-2"></i>
                        Tugas Anda sedang menunggu penilaian dari guru.
                    </div>
                <?php endif; ?>

            <?php else: ?>
                <h5 class="mt-4">Kumpulkan Jawaban</h5>
                <form action="<?= base_url('siswa/tugas/kumpul_jawaban/' . $tugas['id']); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Upload File Jawaban</label>
                        <input type="file" name="file_jawaban" class="form-control" required>
                        <small class="form-text text-muted">Format yang diizinkan: PDF, DOC, DOCX, ZIP, RAR, JPG, PNG. Maks: 5MB.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-upload me-1"></i> Kumpul Tugas
                    </button>
                    <p class="text-muted small mt-2">
                        <i class="fas fa-info-circle me-1"></i>
                        Catatan: Pastikan file yang Anda unggah sudah benar. Tugas yang sudah dikumpulkan tidak dapat diubah kembali.
                    </p>
                </form>
            <?php endif; ?>

        </div>
        <div class="card-footer">
            <a href="<?= base_url('siswa/tugas'); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Tugas
            </a>
        </div>
    </div>
</div>