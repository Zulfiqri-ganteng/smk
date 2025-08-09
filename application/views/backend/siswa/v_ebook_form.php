<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Tulisan</label>
                    <input type="text" class="form-control" name="judul" value="<?= isset($ebook) ? $ebook['judul'] : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="isi_cerita" class="form-label">Isi Cerita</label>
                    <textarea class="form-control" name="isi_cerita" rows="15" required><?= isset($ebook) ? $ebook['isi_cerita'] : ''; ?></textarea>
                </div>
                <hr>
                <a href="<?= base_url('siswa/ebook'); ?>" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>