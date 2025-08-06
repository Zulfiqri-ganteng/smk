<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow text-center">
                <div class="card-header bg-success text-white">
                    <h4>Ujian Telah Selesai!</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Hasil Ujian: <?= $hasil['judul_ujian']; ?></h5>
                    <p class="card-text">Mata Pelajaran: <?= $hasil['mapel']; ?></p>

                    <div class="my-4">
                        <p class="mb-0">Skor Anda:</p>
                        <h1 class="display-3 font-weight-bold text-success"><?= $hasil['nilai']; ?></h1>
                        <p>Jumlah Jawaban Benar: <?= $hasil['jumlah_benar']; ?></p>
                    </div>

                    <a href="<?= base_url('siswa/ujian'); ?>" class="btn btn-primary">Kembali ke Daftar Ujian</a>
                </div>
            </div>
        </div>
    </div>
</div>