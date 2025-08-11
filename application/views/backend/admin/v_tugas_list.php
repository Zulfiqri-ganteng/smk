<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-book me-2"></i><?= $judul; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Tugas yang Diberikan</h6>
            <a href="<?= base_url('admin/tugas/tambah'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Beri Tugas Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul Tugas</th>
                            <th>Kelas Tujuan</th>
                            <th>Deadline</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($tugas_list)): foreach ($tugas_list as $t): ?>
                                <tr>
                                    <td><?= $t['judul_tugas']; ?></td>
                                    <td><span class="badge bg-info text-white"><?= $t['kelas_tujuan']; ?></span></td>
                                    <td><?= date('d M Y, H:i', strtotime($t['deadline'])); ?> WIB</td>
                                    <td>
                                        <a href="<?= base_url('admin/tugas/penilaian/' . $t['id']); ?>" class="btn btn-info btn-sm" title="Lihat & Nilai Tugas">
                                            <i class="fas fa-check-double"></i> Nilai
                                            a>
                                            <a href="#" class="btn btn-warning btn-sm" title="Edit Tugas">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('admin/tugas/hapus/' . $t['id']); ?>" class="btn btn-danger btn-sm" title="Hapus Tugas" onclick="return confirm('Yakin ingin menghapus tugas ini?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr>
                                <td colspan="4" class="text-center">Belum ada tugas yang diberikan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>