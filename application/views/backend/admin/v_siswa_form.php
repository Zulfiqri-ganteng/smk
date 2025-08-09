<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= isset($siswa_data) ? base_url('admin/siswa/update_aksi') : base_url('admin/siswa/tambah_aksi'); ?>" method="post" enctype="multipart/form-data">

                <?php if (isset($siswa_data)): ?>
                    <input type="hidden" name="id_siswa" value="<?= $siswa_data['id']; ?>">
                    <input type="hidden" name="foto_lama" value="<?= $siswa_data['foto']; ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <label>Nama Lengkap Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" value="<?= isset($siswa_data) ? $siswa_data['nama_siswa'] : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label>NIS (akan menjadi username)</label>
                    <input type="text" name="nis" class="form-control" value="<?= isset($siswa_data) ? $siswa_data['nis'] : ''; ?>" required <?= isset($siswa_data) ? 'readonly' : ''; ?>>
                </div>
                <div class="mb-3">
                    <label>Tanggal Lahir (akan menjadi password default ddmmyyyy)</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="<?= isset($siswa_data) ? $siswa_data['tanggal_lahir'] : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label>Kelas</label>
                    <select name="kelas" class="form-control" required>
                        <option value="">-- Pilih Kelas --</option>
                        <?php foreach ($kelas_list as $k): ?>
                            <option value="<?= $k['kode_kelas']; ?>" <?= (isset($siswa_data) && $siswa_data['kelas'] == $k['kode_kelas']) ? 'selected' : ''; ?>>
                                <?= $k['kode_kelas']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Peringkat Prestasi</label>
                    <select name="juara" class="form-control">
                        <option value="0">-- Bukan Juara --</option>
                        <option value="1" <?= (isset($siswa_data) && $siswa_data['juara'] == 1) ? 'selected' : ''; ?>>Juara 1</option>
                        <option value="2" <?= (isset($siswa_data) && $siswa_data['juara'] == 2) ? 'selected' : ''; ?>>Juara 2</option>
                        <option value="3" <?= (isset($siswa_data) && $siswa_data['juara'] == 3) ? 'selected' : ''; ?>>Juara 3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Siswa</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <a href="<?= base_url('admin/siswa'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>