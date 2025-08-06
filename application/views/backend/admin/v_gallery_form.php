<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">

            <?= form_open_multipart('admin/gallery/tambah_aksi'); ?>

            <div class="form-group mb-3">
                <label for="judul_foto">Judul</label>
                <input type="text" id="judul_foto" name="judul_foto" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="tipe">Tipe Media</label>
                <select name="tipe" id="tipe" class="form-control">
                    <option value="gambar">Gambar</option>
                    <option value="youtube">Video YouTube</option>
                </select>
            </div>

            <div id="input-gambar" class="form-group mb-3">
                <label class="form-label">Upload Gambar</label>
                <input type="file" name="nama_file" class="form-control">
                <small class="form-text text-muted">Format: JPG, PNG, JPEG. Max: 2MB.</small>
            </div>

            <div id="input-youtube" class="form-group mb-3" style="display: none;">
                <label for="youtube_link">Link Video YouTube</label>
                <input type="text" id="youtube_link" name="youtube_link" class="form-control" placeholder="Contoh: https://www.youtube.com/watch?v=xxxxxxxxxxx">
            </div>

            <a href="<?= base_url('admin/gallery'); ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>

            <?= form_close(); ?>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tipeSelect = document.getElementById('tipe');
        const inputGambar = document.getElementById('input-gambar');
        const inputYoutube = document.getElementById('input-youtube');
        const inputGambarFile = inputGambar.querySelector('input[type=file]');
        const inputYoutubeLink = inputYoutube.querySelector('input[type=text]');

        tipeSelect.addEventListener('change', function() {
            if (this.value === 'gambar') {
                inputGambar.style.display = 'block';
                inputYoutube.style.display = 'none';
                inputGambarFile.required = true;
                inputYoutubeLink.required = false;
            } else {
                inputGambar.style.display = 'none';
                inputYoutube.style.display = 'block';
                inputGambarFile.required = false;
                inputYoutubeLink.required = true;
            }
        });

        // Panggil event change sekali saat halaman dimuat untuk set kondisi awal
        tipeSelect.dispatchEvent(new Event('change'));
    });
</script>