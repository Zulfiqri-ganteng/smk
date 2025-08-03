<footer class="main-footer pt-5 pb-4 mt-auto">
    <div class="container text-center text-md-start">
        <div class="row text-center text-md-start">

            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="mb-4 footer-title">SMK Galajuara</h5>
                <p>
                    Lembaga pendidikan kejuruan yang berdedikasi untuk mencetak generasi muda yang kompeten, kreatif, dan berakhlak mulia.
                </p>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="mb-4 footer-title">Tautan Cepat</h5>
                <p><a href="<?= base_url('guru'); ?>" class="footer-link">Staf Guru</a></p>
                <p><a href="<?= base_url('gallery'); ?>" class="footer-link">Galeri</a></p>
                <p><a href="<?= base_url('pengumuman'); ?>" class="footer-link">Pengumuman</a></p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="mb-4 footer-title">Kontak</h5>
                <p><i class="fas fa-home me-3"></i>Jl. Pendidikan No. 123, Bekasi</p>
                <p><i class="fas fa-envelope me-3"></i>info@smkgalajuara.sch.id</p>
                <p><i class="fas fa-phone me-3"></i>(021) 1234 5678</p>
            </div>
        </div>

        <hr class="mb-4" style="border-color: rgba(255,255,255,0.2);">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-8">
                <p class="mb-0">&copy; <?= date('Y'); ?> SMK Galajuara Kota Bekasi, Design By <a href="https://www.instagram.com/zufieee/" target="_blank" rel="noopener noreferrer" class="footer-link fw-bold">Zulfiqri,S.Kom</a>.</p>
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="text-center text-md-end">
                    <a href="#" class="footer-link me-4"><i class="fab fa-facebook-f social-icon"></i></a>
                    <a href="#" class="footer-link me-4"><i class="fab fa-twitter social-icon"></i></a>
                    <a href="#" class="footer-link me-4"><i class="fab fa-instagram social-icon"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>

<?php if (isset($judul) && $judul == 'Login'): ?>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS("particles-js", {
            /* ... konfigurasi particlesJS Anda ... */
        });
    </script>
<?php endif; ?>


<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
    // Inisialisasi AOS
    AOS.init({
        duration: 1000,
        once: true,
    });

    // Inisialisasi GLightbox dengan lebar yang sudah diatur
    const lightbox = GLightbox({
        selector: '.glightbox',
        width: '900px',
        height: 'auto'
    });

    // Inisialisasi PureCounter
    new PureCounter();
</script>

</body>

</html> ```