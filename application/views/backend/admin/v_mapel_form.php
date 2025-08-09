<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label>Nama Mata Pelajaran</label>
                    <input type="text" name="nama_mapel" class="form-control" value="<?= isset($mapel) ? $mapel['nama_mapel'] : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label>Kode Mapel (Singkatan)</label>
                    <input type="text" name="kode_mapel" class="form-control" value="<?= isset($mapel) ? $mapel['kode_mapel'] : ''; ?>" required>
                </div>
                <a href="<?= base_url('admin/mapel'); ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>