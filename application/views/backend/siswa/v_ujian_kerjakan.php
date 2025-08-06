<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ujian['judul_ujian']; ?></title>
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }

        .timer {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.2rem;
            font-weight: bold;
            z-index: 1000;
        }

        .card-soal {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div id="timer" class="timer">--:--</div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3><?= $ujian['judul_ujian']; ?></h3>
                        <p class="mb-0">Mata Pelajaran: <?= $ujian['mapel']; ?></p>
                    </div>
                    <div class="card-body">
                        <form id="form-ujian" action="<?= base_url('siswa/ujian/submit'); ?>" method="post">
                            <input type="hidden" name="id_ujian" value="<?= $ujian['id']; ?>">
                            <input type="hidden" name="id_siswa" value="<?= $id_siswa; ?>">

                            <?php $no = 1;
                            foreach ($soal as $s): ?>
                                <div class="card card-soal">
                                    <div class="card-body">
                                        <p><strong>Soal <?= $no++; ?>:</strong></p>
                                        <p><?= $s['pertanyaan']; ?></p>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jawaban[<?= $s['id']; ?>]" id="opsi_a_<?= $s['id']; ?>" value="A" required>
                                            <label class="form-check-label" for="opsi_a_<?= $s['id']; ?>">A. <?= $s['opsi_a']; ?></label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jawaban[<?= $s['id']; ?>]" id="opsi_b_<?= $s['id']; ?>" value="B">
                                            <label class="form-check-label" for="opsi_b_<?= $s['id']; ?>">B. <?= $s['opsi_b']; ?></label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jawaban[<?= $s['id']; ?>]" id="opsi_c_<?= $s['id']; ?>" value="C">
                                            <label class="form-check-label" for="opsi_c_<?= $s['id']; ?>">C. <?= $s['opsi_c']; ?></label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jawaban[<?= $s['id']; ?>]" id="opsi_d_<?= $s['id']; ?>" value="D">
                                            <label class="form-check-label" for="opsi_d_<?= $s['id']; ?>">D. <?= $s['opsi_d']; ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <button type="submit" class="btn btn-success w-100" onclick="return confirm('Apakah Anda yakin ingin menyelesaikan ujian ini?')">
                                Selesai & Kirim Jawaban
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const timerElement = document.getElementById('timer');
            const formUjian = document.getElementById('form-ujian');
            let waktuDetik = <?= $ujian['waktu_menit'] * 60; ?>;

            const timerInterval = setInterval(function() {
                waktuDetik--;
                let menit = Math.floor(waktuDetik / 60);
                let detik = waktuDetik % 60;

                timerElement.textContent = `${String(menit).padStart(2, '0')}:${String(detik).padStart(2, '0')}`;

                if (waktuDetik <= 0) {
                    clearInterval(timerInterval);
                    alert('Waktu habis! Jawaban Anda akan dikirim secara otomatis.');
                    formUjian.submit();
                }
            }, 1000);
        });
    </script>
</body>

</html>