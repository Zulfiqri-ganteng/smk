<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah File Gallery (Foto/Video)</h1>
    
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('admin/gallery/proses_upload'); ?>" method="post" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label>Judul File</label>
                    <input type="text" name="judul_foto" class="form-control" value="<?= set_value('judul_foto'); ?>" required>
                </div>

                <div class="mb-3">
                    <label>Pilih File (Foto atau Video)</label>
                    <input type="file" name="file_gallery" class="form-control" required>
                    <small class="form-text text-muted">Format yang diizinkan: JPG, PNG, GIF, MP4, MOV, AVI. Ukuran maksimal: 100MB.</small>
                </div>

                <a href="<?= base_url('admin/gallery'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Upload File</button>
            </form>
        </div>
    </div>
</div>