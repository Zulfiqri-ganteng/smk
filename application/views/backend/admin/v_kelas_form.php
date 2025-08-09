<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label>Tingkat</label>
                    <select name="tingkat" class="form-control" required>
                        <option value="X" <?= (isset($kelas) && $kelas['tingkat'] == 'X') ? 'selected' : ''; ?>>X</option>
                        <option value="XI" <?= (isset($kelas) && $kelas['tingkat'] == 'XI') ? 'selected' : ''; ?>>XI</option>
                        <option value="XII" <?= (isset($kelas) && $kelas['tingkat'] == 'XII') ? 'selected' : ''; ?>>XII</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Nama Jurusan</label>
                    <select name="nama_jurusan" class="form-control" required>
                        <option value="TKJ" <?= (isset($kelas) && $kelas['nama_jurusan'] == 'TKJ') ? 'selected' : ''; ?>>Teknik Komputer & Jaringan</option>
                        <option value="DKV" <?= (isset($kelas) && $kelas['nama_jurusan'] == 'DKV') ? 'selected' : ''; ?>>Desain Komunikasi Visual</option>
                        <option value="AKL" <?= (isset($kelas) && $kelas['nama_jurusan'] == 'AKL') ? 'selected' : ''; ?>>Akuntansi & Keuangan Lembaga</option>
                        <option value="MP" <?= (isset($kelas) && $kelas['nama_jurusan'] == 'MP') ? 'selected' : ''; ?>>Manajemen Perkantoran</option>
                        <option value="Farmasi" <?= (isset($kelas) && $kelas['nama_jurusan'] == 'Farmasi') ? 'selected' : ''; ?>>Farmasi</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Nomor Kelas (Contoh: 1, 2, atau A, B)</label>
                    <?php
                    $nomor_kelas = isset($kelas) ? preg_replace('/^\S+\s\S+\s/', '', $kelas['kode_kelas']) : '';
                    ?>
                    <input type="text" name="nomor_kelas" class="form-control" value="<?= $nomor_kelas; ?>" required>
                </div>
                <a href="<?= base_url('admin/kelas'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>