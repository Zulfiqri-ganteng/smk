<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-book-open me-2"></i><?= $judul; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Mata Pelajaran</h6>
            <a href="<?= base_url('admin/mapel/tambah'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Mapel
            </a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-5">
                    <form action="<?= base_url('admin/mapel'); ?>" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari mapel..." name="keyword" value="<?= $this->input->get('keyword'); ?>">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 ms-auto text-end">
                    <a href="<?= base_url('admin/mapel?sort=asc'); ?>" class="btn btn-outline-secondary btn-sm <?= $sort == 'asc' ? 'active' : '' ?>">A-Z <i class="fas fa-sort-alpha-down"></i></a>
                    <a href="<?= base_url('admin/mapel?sort=desc'); ?>" class="btn btn-outline-secondary btn-sm <?= $sort == 'desc' ? 'active' : '' ?>">Z-A <i class="fas fa-sort-alpha-up"></i></a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Mata Pelajaran</th>
                            <th>Kode Mapel</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mapel as $m): ?>
                            <tr>
                                <td><?= $m['nama_mapel']; ?></td>
                                <td><?= $m['kode_mapel']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/mapel/edit/' . $m['id']); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('admin/mapel/hapus/' . $m['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fas fa-trash"></i></a>
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