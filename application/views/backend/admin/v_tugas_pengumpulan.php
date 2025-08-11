<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <p>Tugas: <strong><?= $tugas['judul_tugas']; ?></strong></p>
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>File Jawaban</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pengumpulan as $p): ?>
                        <tr>
                            <td><?= $p['nama_lengkap']; ?></td>
                            <td><?= $p['kelas']; ?></td>
                            <td><a href="<?= base_url('uploads/jawaban_tugas/' . $p['file_jawaban']); ?>" download>Unduh</a></td>
                            <td>
                                <form action="#" method="post">
                                    <input type="number" name="nilai" value="<?= $p['nilai']; ?>" class="form-control">
                                </form>
                            </td>
                            <td><button type="submit" class="btn btn-primary btn-sm">Simpan Nilai</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>