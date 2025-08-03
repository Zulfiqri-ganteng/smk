<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Manajemen Gallery</h1>
    <p class="mb-4">Kelola foto dan video yang akan ditampilkan di halaman galeri publik.</p>
    
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Gallery</h6>
            <a href="<?= base_url('admin/gallery/tambah') ?>" class="btn btn-primary btn-sm float-right">
                <i class="fas fa-plus"></i> Tambah File
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul File</th>
                            <th>Preview</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($gallery as $g) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $g['judul_foto']; ?></td>
                            <td>
                                <?php
                                    // Logika untuk membedakan gambar dan video
                                    $file_extension = pathinfo($g['nama_file'], PATHINFO_EXTENSION);
                                    $image_types = ['jpg', 'png', 'jpeg', 'gif'];
                                    $video_types = ['mp4', 'mov', 'avi', 'wmv'];

                                    if (in_array(strtolower($file_extension), $image_types)) {
                                        // Jika file adalah gambar, tampilkan thumbnail
                                        $file_path = base_url('assets/images/gallery/' . $g['nama_file']);
                                        echo '<img src="' . $file_path . '" width="100" class="img-thumbnail">';
                                    } elseif (in_array(strtolower($file_extension), $video_types)) {
                                        // Jika file adalah video, tampilkan ikon video
                                        echo '<i class="fas fa-video fa-3x text-primary"></i> <br><small>Video File</small>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/gallery/hapus/' . $g['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus file ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>