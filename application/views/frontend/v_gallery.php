<div class="container-fluid gallery-section">
    <div class="container py-5">
        <h2 class="text-center section-title" data-aos="fade-up"><?= $judul; ?></h2>
        
        <div class="row g-4">
            <?php if (!empty($gallery)) : foreach($gallery as $g) : ?>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <?php
                        $file_extension = strtolower(pathinfo($g['nama_file'], PATHINFO_EXTENSION));
                        $image_types = ['jpg', 'png', 'jpeg', 'gif'];
                        $video_types = ['mp4', 'mov', 'avi', 'wmv'];

                        // Menentukan path dan ikon berdasarkan tipe file
                        $file_path = '';
                        $icon_class = 'fas fa-search-plus'; // Default ikon untuk gambar
                        if (in_array($file_extension, $image_types)) {
                            $file_path = base_url('assets/images/gallery/' . $g['nama_file']);
                        } elseif (in_array($file_extension, $video_types)) {
                            $file_path = base_url('assets/videos/' . $g['nama_file']);
                            $icon_class = 'fas fa-play'; // Ikon untuk video
                        }
                    ?>
                    
                    <a href="<?= $file_path; ?>" class="glightbox gallery-item" data-title="<?= $g['judul_foto']; ?>">
                        
                        <?php if (in_array($file_extension, $image_types)) : ?>
                            <img src="<?= $file_path; ?>" alt="<?= $g['judul_foto']; ?>">
                        <?php else : ?>
                             <video muted preload="metadata">
                                <source src="<?= $file_path; ?>#t=0.5" type="video/<?= $file_extension; ?>">
                            </video>
                        <?php endif; ?>

                        <div class="gallery-overlay">
                            <div class="gallery-overlay-content">
                                <div class="icon"><i class="<?= $icon_class; ?>"></i></div>
                                <h5><?= $g['judul_foto']; ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; else : ?>
                <div class="col-12">
                    <p class="text-center">Belum ada file di galeri.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>