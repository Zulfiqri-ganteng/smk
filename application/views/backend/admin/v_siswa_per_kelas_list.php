<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Siswa</h1>
    <p class="mb-4">Kelas: <strong><?= $kelas_info['kode_kelas']; ?></strong></p>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($siswa as $s): ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $s['nis']; ?></td>
                                <td><?= $s['nama_siswa']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('admin/kelas'); ?>" class="btn btn-secondary">Kembali ke Daftar Kelas</a>
        </div>
    </div>
</div>