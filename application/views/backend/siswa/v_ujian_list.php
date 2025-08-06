<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ujian yang Tersedia</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Ujian</th>
                            <th>Mata Pelajaran</th>
                            <th>Durasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($ujian_tersedia)): ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada ujian yang tersedia saat ini.</td>
                            </tr>
                        <?php else: ?>
                            <?php $no = 1; foreach($ujian_tersedia as $ujian): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $ujian['judul_ujian']; ?></td>
                                <td><?= $ujian['mapel']; ?></td>
                                <td><?= $ujian['waktu_menit']; ?> Menit</td>
                                <td>
                                    <?php if($ujian['sudah_dikerjakan'] > 0): ?>
                                        <button class="btn btn-success btn-sm" disabled><i class="fas fa-check"></i> Selesai</button>
                                    <?php else: ?>
                                        <a href="<?= base_url('siswa/ujian/kerjakan/' . $ujian['id']); ?>" 
                                           class="btn btn-primary btn-sm" 
                                           onclick="return confirm('Apakah Anda yakin ingin memulai ujian ini? Waktu akan berjalan setelah Anda klik OK.')">
                                           <i class="fas fa-edit"></i> Kerjakan
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>