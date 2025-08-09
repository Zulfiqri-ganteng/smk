<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Manajemen Data Kelas</h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kelas</h6>
            <a href="<?= base_url('admin/kelas/tambah'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Kelas
            </a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-5">
                    <form action="<?= base_url('admin/kelas'); ?>" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari data kelas..." name="keyword">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i> Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Kelas</th>
                            <th>Tingkat</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kelas as $k): ?>
                            <tr>
                                <td><?= $k['kode_kelas']; ?></td>
                                <td><?= $k['tingkat']; ?></td>
                                <td><?= $k['nama_jurusan']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/kelas/lihat_siswa/' . $k['id']); ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-users"></i> Lihat Siswa
                                    </a>
                                    <a href="<?= base_url('admin/kelas/edit/' . $k['id']); ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?= base_url('admin/kelas/hapus/' . $k['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <?= $pagination; ?>
            </div>
        </div>
    </div>
</div>