<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Manajemen Ujian Online</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Ujian</h6>
            <a href="<?= base_url('admin/ujian/tambah'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Ujian
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul & Mapel</th>
                            <th>Kelas Tujuan</th>
                            <th>Guru Pembuat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ujian as $u): ?>
                            <tr>
                                <td>
                                    <strong><?= $u['judul_ujian']; ?></strong><br>
                                    <small class="text-muted"><?= $u['mapel']; ?></small>
                                </td>
                                <td>
                                    <span class="badge bg-info text-white p-2"><?= $u['kode_kelas'] ? $u['kode_kelas'] : 'N/A'; ?></span>
                                </td>
                                <td><?= $u['nama_guru']; ?></td>
                                <td>
                                    <?php if ($u['status'] == 'aktif'): ?>
                                        <span class="badge bg-success text-white">Aktif</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary text-white">Tidak Aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="d-none d-lg-block">
                                        <?php if ($u['status'] == 'tidak_aktif'): ?>
                                            <a href="<?= base_url('admin/ujian/set_status/' . $u['id'] . '/aktif'); ?>" class="btn btn-success btn-sm" title="Aktifkan Ujian"><i class="fas fa-check-circle"></i></a>
                                        <?php else: ?>
                                            <a href="<?= base_url('admin/ujian/set_status/' . $u['id'] . '/tidak_aktif'); ?>" class="btn btn-secondary btn-sm" title="Nonaktifkan Ujian"><i class="fas fa-times-circle"></i></a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('admin/ujian/kelola_soal/' . $u['id']); ?>" class="btn btn-primary btn-sm" title="Kelola Soal"><i class="fas fa-list-ul"></i></a>
                                        <a href="<?= base_url('admin/ujian/hasil_ujian/' . $u['id']); ?>" class="btn btn-info btn-sm" title="Lihat Hasil"><i class="fas fa-poll-h"></i></a>
                                        <a href="<?= base_url('admin/ujian/edit/' . $u['id']); ?>" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('admin/ujian/hapus/' . $u['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')" title="Hapus"><i class="fas fa-trash"></i></a>
                                    </div>
                                    <div class="dropdown d-lg-none">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Aksi</button>
                                        <div class="dropdown-menu">
                                            <?php if ($u['status'] == 'tidak_aktif'): ?>
                                                <a class="dropdown-item" href="<?= base_url('admin/ujian/set_status/' . $u['id'] . '/aktif'); ?>">Aktifkan</a>
                                            <?php else: ?>
                                                <a class="dropdown-item" href="<?= base_url('admin/ujian/set_status/' . $u['id'] . '/tidak_aktif'); ?>">Nonaktifkan</a>
                                            <?php endif; ?>
                                            <a class="dropdown-item" href="<?= base_url('admin/ujian/kelola_soal/' . $u['id']); ?>">Kelola Soal</a>
                                            <a class="dropdown-item" href="<?= base_url('admin/ujian/hasil_ujian/' . $u['id']); ?>">Lihat Hasil</a>
                                            <a class="dropdown-item" href="<?= base_url('admin/ujian/edit/' . $u['id']); ?>">Edit</a>
                                            <a class="dropdown-item" href="<?= base_url('admin/ujian/hapus/' . $u['id']); ?>" onclick="return confirm('Yakin?')">Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>