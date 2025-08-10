<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-book me-2"></i><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="list-group">
                <?php if (!empty($tugas_list)): foreach ($tugas_list as $t) : ?>
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?= $t['judul_tugas']; ?></h5>
                                <div>
                                    <?php
                                    $status = $t['status_pengerjaan'];
                                    $badge = 'bg-secondary';
                                    if ($status == 'Sudah Dikumpulkan') {
                                        $badge = 'bg-warning text-dark';
                                    }
                                    if ($status == 'Sudah Dinilai') {
                                        $badge = 'bg-success';
                                    }
                                    ?>
                                    <span class="badge <?= $badge; ?>"><?= $status ? $status : 'Belum Dikerjakan'; ?></span>
                                </div>
                            </div>
                            <p class="mb-1 text-muted">Deadline: <?= date('d F Y', strtotime($t['deadline'])); ?></p>
                            <a href="<?= base_url('siswa/tugas/detail/' . $t['id']); ?>" class="btn btn-info btn-sm mt-2">
                                <i class="fas fa-eye me-1"></i> Lihat Detail & Kumpulkan
                            </a>
                        </div>
                    <?php endforeach;
                else: ?>
                    <p class="text-center">Belum ada tugas untuk kelas Anda.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>