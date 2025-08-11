<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label>Judul Tugas</label>
                    <input type="text" name="judul_tugas" class="form-control" value="<?= isset($tugas) ? $tugas['judul_tugas'] : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="5" required><?= isset($tugas) ? $tugas['deskripsi'] : ''; ?></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Untuk Kelas</label>
                        <select name="kelas_tujuan" class="form-control" required>
                            <option value="">-- Pilih Kelas --</option>
                            <?php foreach ($kelas_list as $k): ?>
                                <option value="<?= $k['kode_kelas']; ?>" <?= (isset($tugas) && $tugas['kelas_tujuan'] == $k['kode_kelas']) ? 'selected' : ''; ?>>
                                    <?= $k['kode_kelas']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Deadline</label>
                        <input type="datetime-local" name="deadline" class="form-control" value="<?= isset($tugas) ? date('Y-m-d\TH:i', strtotime($tugas['deadline'])) : ''; ?>" required>
                    </div>
                </div>
                <a href="<?= base_url('admin/tugas'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>