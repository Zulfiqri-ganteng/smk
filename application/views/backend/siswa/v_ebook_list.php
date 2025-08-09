<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">E-Book Saya</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Tulisan Saya</h6>
            <a href="<?= base_url('siswa/ebook/tambah'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> Tulis Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Tulisan</th>
                            <th>Tanggal Publikasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ebooks)): $i = 1;
                            foreach ($ebooks as $ebook) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $ebook['judul']; ?></td>
                                    <td><?= date('d F Y', strtotime($ebook['tgl_publish'])); ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('siswa/ebook/edit/' . $ebook['id']); ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                        <a href="<?= base_url('siswa/ebook/hapus/' . $ebook['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">
                                            <i class="fas fa-trash me-1"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr>
                                <td colspan="4" class="text-center">Anda belum menulis E-Book.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>