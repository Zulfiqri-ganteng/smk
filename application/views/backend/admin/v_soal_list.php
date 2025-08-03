<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Kelola Soal</h1>
    <p class="mb-4">Ujian: <strong><?= $ujian['judul_ujian']; ?></strong></p>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Soal</h6>
            <div>
                <a href="<?= base_url('admin/ujian/tambah_soal/' . $ujian['id']); ?>" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Soal
                </a>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importModal">
                    <i class="fas fa-file-excel"></i> Import dari Excel
                </button>
            </div>
        </div>
        <div class="card-body">
            <?php if (!empty($soal)): $i = 1;
                foreach ($soal as $s): ?>
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between">
                            <strong>Soal No. <?= $i++; ?></strong>
                            <div>
                                <a href="<?= base_url('admin/ujian/edit_soal/' . $s['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('admin/ujian/hapus_soal/' . $s['id'] . '/' . $ujian['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <?php if (!empty($s['gambar_soal'])): ?>
                                    <div class="col-md-4">
                                        <a href="<?= base_url('assets/images/soal/' . $s['gambar_soal']); ?>" class="glightbox">
                                            <img src="<?= base_url('assets/images/soal/' . $s['gambar_soal']); ?>" class="img-fluid rounded" alt="Gambar Soal">
                                        </a>
                                    </div>

                                    <div class="col-md-8 p-3">
                                        <!-- <p><?= $s['pertanyaan']; ?></p> -->
                                        <ul class="list-group">
                                            <li class="list-group-item" style="background-color: #d9500cff; color: #ffffff; font-weight: bold;"><?= $s['pertanyaan']; ?></li>
                                            <li class="list-group-item <?= $s['jawaban_benar'] == 'A' ? 'active' : ''; ?>">A. <?= $s['opsi_a']; ?></li>
                                            <li class="list-group-item <?= $s['jawaban_benar'] == 'B' ? 'active' : ''; ?>">B. <?= $s['opsi_b']; ?></li>
                                            <li class="list-group-item <?= $s['jawaban_benar'] == 'C' ? 'active' : ''; ?>">C. <?= $s['opsi_c']; ?></li>
                                            <li class="list-group-item <?= $s['jawaban_benar'] == 'D' ? 'active' : ''; ?>">D. <?= $s['opsi_d']; ?></li>
                                            <li class="list-group-item <?= $s['jawaban_benar'] == 'E' ? 'active' : ''; ?>">E. <?= $s['opsi_e']; ?></li>
                                        </ul>
                                    </div>

                                <?php else: ?>
                                    <div class="col-md-12 p-3">

                                        <ul class="list-group">
                                            <li class="list-group-item" style="background-color: #d9500cff; color: #ffffff; font-weight: bold;"><?= $s['pertanyaan']; ?></li>

                                            <li class="list-group-item <?= $s['jawaban_benar'] == 'A' ? 'active' : ''; ?>">A. <?= $s['opsi_a']; ?></li>
                                            <li class="list-group-item <?= $s['jawaban_benar'] == 'B' ? 'active' : ''; ?>">B. <?= $s['opsi_b']; ?></li>
                                            <li class="list-group-item <?= $s['jawaban_benar'] == 'C' ? 'active' : ''; ?>">C. <?= $s['opsi_c']; ?></li>
                                            <li class="list-group-item <?= $s['jawaban_benar'] == 'D' ? 'active' : ''; ?>">D. <?= $s['opsi_d']; ?></li>
                                            <li class="list-group-item <?= $s['jawaban_benar'] == 'E' ? 'active' : ''; ?>">E. <?= $s['opsi_e']; ?></li>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach;
            else: ?>
                <p class="text-center">Belum ada soal untuk ujian ini.</p>
            <?php endif; ?>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('admin/ujian'); ?>" class="btn btn-secondary">Kembali ke Daftar Ujian</a>
        </div>
    </div>
</div>

<div class="modal fade" id="importModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="importTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="csv-tab" data-toggle="tab" href="#csv" role="tab" aria-controls="csv" aria-selected="true">Dari Excel (CSV)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="word-tab" data-toggle="tab" href="#word" role="tab" aria-controls="word" aria-selected="false">Dari Word (DOCX)</a>
                    </li>
                </ul>

                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="csv" role="tabpanel" aria-labelledby="csv-tab">
                        <p class="text-muted small">Gunakan metode ini untuk mengimpor banyak soal sekaligus dengan format yang sudah terstruktur.</p>
                        <form action="<?= base_url('admin/ujian/import_soal/' . $ujian['id']); ?>" method="post" enctype="multipart/form-data">
                            <label class="font-weight-bold">Langkah 1: Unduh Template</label><br>
                            <a href="<?= base_url('assets/templates/template_soal.csv'); ?>" class="btn btn-secondary btn-sm mb-3" download>
                                <i class="fas fa-download"></i> Unduh Template CSV
                            </a>
                            <br>
                            <label class="font-weight-bold">Langkah 2: Pilih File</label>
                            <input type="file" name="file_csv" class="form-control" accept=".csv" required>
                            <hr>
                            <div class="text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Import dari CSV</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="word" role="tabpanel" aria-labelledby="word-tab">
                        <p class="text-muted small">Gunakan metode ini jika Anda sudah memiliki soal dalam format dokumen Word. Pastikan format penulisan di dalam file sudah sesuai.</p>
                        <form action="<?= base_url('admin/ujian/import_word/' . $ujian['id']); ?>" method="post" enctype="multipart/form-data">
                            <label class="font-weight-bold">Pilih File DOCX</label>
                            <input type="file" name="file_word" class="form-control" accept=".docx" required>
                            <p class="text-danger small mt-2">Peringatan: Format di dalam file .docx harus sangat presisi agar berhasil diimpor.</p>
                            <hr>
                            <div class="text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-info">Import dari Word</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>