<h3><?= $judul ?></h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>NIS</th>
            <th>File Jawaban</th>
            <th>Status</th>
            <th>Nilai</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($jawaban as $j): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $j->nama_siswa ?></td>
                <td><?= $j->nis ?></td>
                <td>
                    <a href="<?= base_url('uploads/jawaban_tugas/' . $j->file_jawaban) ?>" target="_blank" class="btn btn-info btn-sm">Download</a>
                </td>
                <td><?= $j->status ?></td>
                <td><?= $j->nilai !== NULL ? $j->nilai : '-' ?></td>
                <td>
                    <a href="<?= site_url('guru/tugas/nilai/' . $j->id) ?>" class="btn btn-success btn-sm">Beri Nilai</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>