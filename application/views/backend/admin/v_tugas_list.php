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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Judul Tugas</th>
                            <th>Kelas Tujuan</th>
                            <th>Deadline</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tugas_list as $t): ?>
                            <tr>
                                <td><?= $t['judul_tugas']; ?></td>
                                <td><?= $t['kelas_tujuan']; ?></td>
                                <td><?= date('d M Y, H:i', strtotime($t['deadline'])); ?></td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('admin/tugas/hapus/' . $t['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>