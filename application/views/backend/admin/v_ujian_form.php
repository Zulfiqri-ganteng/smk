<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label>Judul Ujian</label>
                    <input type="text" name="judul_ujian" class="form-control" value="<?= isset($ujian) ? $ujian['judul_ujian'] : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label>Mata Pelajaran</label>
                    <select name="mapel" class="form-control" required>
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        <?php foreach ($mapel_list as $m): ?>
                            <option value="<?= $m['nama_mapel']; ?>" <?= (isset($ujian) && $ujian['mapel'] == $m['nama_mapel']) ? 'selected' : ''; ?>>
                                <?= $m['nama_mapel']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Ditujukan untuk Kelas</label>
                    <select name="kelas_id" class="form-control" required>
                        <option value="">-- Pilih Kelas --</option>
                        <?php foreach ($kelas_list as $k): ?>
                            <option value="<?= $k['id']; ?>" <?= (isset($ujian) && $ujian['kelas_id'] == $k['id']) ? 'selected' : ''; ?>>
                                <?= $k['kode_kelas']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Mulai</label>
                        <input type="datetime-local" name="tanggal_mulai" class="form-control" value="<?= isset($ujian) ? date('Y-m-d\TH:i', strtotime($ujian['tanggal_mulai'])) : ''; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Selesai</label>
                        <input type="datetime-local" name="tanggal_selesai" class="form-control" value="<?= isset($ujian) ? date('Y-m-d\TH:i', strtotime($ujian['tanggal_selesai'])) : ''; ?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Durasi (Menit)</label>
                    <input type="number" name="waktu_menit" class="form-control" value="<?= isset($ujian) ? $ujian['waktu_menit'] : ''; ?>" required>
                </div>
                <a href="<?= base_url('admin/ujian'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>