<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-check-double me-2"></i><?= $judul; ?></h1>
    <p class="mb-4">Tugas: <strong><?= $tugas['judul_tugas']; ?></strong></p>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa yang Sudah Mengumpulkan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>File Jawaban</th>
                            <th>Nilai (0-100)</th>
                            <th>Komentar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($jawaban_siswa)): foreach ($jawaban_siswa as $j): ?>
                                <tr>
                                    <td><?= $j['nama_lengkap']; ?> (<?= $j['kelas']; ?>)</td>
                                    <td>
                                        <a href="<?= base_url('uploads/jawaban_tugas/' . $j['file_jawaban']); ?>" class="btn btn-info btn-sm" download>
                                            <i class="fas fa-download"></i> Unduh Jawaban
                                        </a>
                                    </td>
                                    <form action="<?= base_url('admin/tugas/simpan_nilai/' . $j['id']); ?>" method="post">
                                        <input type="hidden" name="id_tugas" value="<?= $tugas['id']; ?>">
                                        <td>
                                            <input type="number" name="nilai" class="form-control form-control-sm" value="<?= $j['nilai']; ?>" min="0" max="100" style="width: 80px;">
                                        </td>
                                        <td>
                                            <textarea name="komentar_guru" class="form-control form-control-sm" rows="1"><?= $j['komentar_guru']; ?></textarea>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fas fa-save"></i> Simpan
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Belum ada siswa yang mengumpulkan tugas ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('admin/tugas'); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>