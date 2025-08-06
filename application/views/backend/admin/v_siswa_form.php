<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">

            <?php
            if ($siswa_data) {
                // Form edit, action ke update_aksi
                echo form_open_multipart('admin/siswa/update_aksi');
            } else {
                // Form tambah, action ke tambah_aksi
                echo form_open_multipart('admin/siswa/tambah_aksi');
            }
            ?>
            <?php if ($siswa_data): ?>
                <input type="hidden" name="id_siswa" value="<?= $siswa_data['id']; ?>">
                <input type="hidden" name="foto_lama" value="<?= $siswa_data['foto']; ?>">
            <?php endif; ?>

            <h5 class="text-primary">Data Diri Siswa</h5>
            <hr>
            <div class="form-group mb-3">
                <label for="nama_siswa">Nama Lengkap Siswa</label>
                <input type="text" id="nama_siswa" name="nama_siswa" class="form-control" value="<?= $siswa_data ? $siswa_data['nama_siswa'] : set_value('nama_siswa'); ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="nis">NIS</label>
                <input type="text" id="nis" name="nis" class="form-control" value="<?= $siswa_data ? $siswa_data['nis'] : set_value('nis'); ?>" required <?= $siswa_data ? 'readonly' : ''; ?>>
            </div>
            <div class="form-group mb-3">
                <label for="kelas">Kelas</label>
                <input type="text" id="kelas" name="kelas" class="form-control" value="<?= $siswa_data ? $siswa_data['kelas'] : set_value('kelas'); ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="juara">Peringkat Prestasi</label>
                <select name="juara" id="juara" class="form-control">
                    <option value="0">-- Bukan Juara --</option>
                    <option value="1" <?= ($siswa_data && $siswa_data['juara'] == 1) ? 'selected' : ''; ?>>Juara 1</option>
                    <option value="2" <?= ($siswa_data && $siswa_data['juara'] == 2) ? 'selected' : ''; ?>>Juara 2</option>
                    <option value="3" <?= ($siswa_data && $siswa_data['juara'] == 3) ? 'selected' : ''; ?>>Juara 3</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Foto Siswa</label>
                <?php if ($siswa_data && $siswa_data['foto'] != 'default.jpg'): ?>
                    <div class="mb-2">
                        <img src="<?= base_url('assets/images/siswa/' . $siswa_data['foto']); ?>" width="100" class="img-thumbnail">
                    </div>
                <?php endif; ?>
                <input type="file" name="foto" class="form-control">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto. Format: JPG, PNG, JPEG. Max: 2MB.</small>
            </div>

            <?php if (!$siswa_data): ?>
                <br>
                <h5 class="text-primary">Buat Akun Login untuk Siswa</h5>
                <hr>
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            <?php endif; ?>

            <br>
            <a href="<?= base_url('admin/siswa'); ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>

            <?php echo form_close(); ?>

        </div>
    </div>
</div>