<h3><?= $judul ?></h3>
<p><b>Nama Siswa:</b> <?= $jawaban->nama_siswa ?> (<?= $jawaban->nis ?>)</p>
<p><b>File Jawaban:</b>
    <a href="<?= base_url('uploads/jawaban_tugas/' . $jawaban->file_jawaban) ?>" target="_blank">Download</a>
</p>

<form method="post" action="<?= site_url('guru/tugas/simpan_nilai') ?>">
    <input type="hidden" name="id_jawaban" value="<?= $jawaban->id ?>">

    <div class="mb-3">
        <label>Nilai:</label>
        <input type="number" name="nilai" class="form-control" value="<?= $jawaban->nilai ?>" required>
    </div>

    <div class="mb-3">
        <label>Catatan:</label>
        <textarea name="catatan" class="form-control"><?= $jawaban->catatan ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Nilai</button>
</form>