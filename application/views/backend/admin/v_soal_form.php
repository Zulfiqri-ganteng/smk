<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="<?= isset($soal) ? base_url('admin/ujian/update_soal') : base_url('admin/ujian/simpan_soal'); ?>" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="ujian_id" value="<?= isset($soal) ? $soal['ujian_id'] : $id_ujian; ?>">
                        <input type="hidden" name="id_soal" value="<?= isset($soal) ? $soal['id'] : ''; ?>">

                        <div class="mb-3">
                            <label class="form-label">Pertanyaan</label>
                            <textarea id="editor_pertanyaan" name="pertanyaan" class="form-control"><?= isset($soal) ? $soal['pertanyaan'] : ''; ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Gambar Pendukung Soal (Opsional)</label>
                            <input type="file" name="gambar_soal" class="form-control">
                            <?php if (isset($soal) && !empty($soal['gambar_soal'])): ?>
                                <div class="mt-2">
                                    <img src="<?= base_url('assets/images/soal/' . $soal['gambar_soal']); ?>" class="img-thumbnail" width="200">
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Opsi A</label>
                                <textarea name="opsi_a" class="form-control editor-opsi"><?= isset($soal) ? $soal['opsi_a'] : ''; ?></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Opsi B</label>
                                <textarea name="opsi_b" class="form-control editor-opsi"><?= isset($soal) ? $soal['opsi_b'] : ''; ?></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Opsi C</label>
                                <textarea name="opsi_c" class="form-control editor-opsi"><?= isset($soal) ? $soal['opsi_c'] : ''; ?></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Opsi D</label>
                                <textarea name="opsi_d" class="form-control editor-opsi"><?= isset($soal) ? $soal['opsi_d'] : ''; ?></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Opsi E</label>
                                <textarea name="opsi_e" class="form-control editor-opsi"><?= isset($soal) ? $soal['opsi_e'] : ''; ?></textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Jawaban Benar</label>
                            <select name="jawaban_benar" class="form-control" required>
                                <option value="">-- Pilih Jawaban --</option>
                                <option value="A" <?= (isset($soal) && $soal['jawaban_benar'] == 'A') ? 'selected' : ''; ?>>Opsi A</option>
                                <option value="B" <?= (isset($soal) && $soal['jawaban_benar'] == 'B') ? 'selected' : ''; ?>>Opsi B</option>
                                <option value="C" <?= (isset($soal) && $soal['jawaban_benar'] == 'C') ? 'selected' : ''; ?>>Opsi C</option>
                                <option value="D" <?= (isset($soal) && $soal['jawaban_benar'] == 'D') ? 'selected' : ''; ?>>Opsi D</option>
                                <option value="E" <?= (isset($soal) && $soal['jawaban_benar'] == 'E') ? 'selected' : ''; ?>>Opsi E</option>
                            </select>
                        </div>

                        <a href="<?= base_url('admin/ujian/kelola_soal/' . $id_ujian); ?>" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>