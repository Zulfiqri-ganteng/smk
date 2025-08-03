</div>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SMK Galajuara <?= date('Y'); ?>, Design web By <a href="https://www.instagram.com/zufieee/" target="_blank" rel="noopener noreferrer">Zulfiqri,S.Kom</a> </span>
        </div>
    </div>
</footer>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js"></script>

<script src="https://cdn.tiny.cloud/1/sazqqx420mtiakkgrfmhedc1jue6x7t8a8rfy7eznpon938l/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>
    $(document).ready(function() {

        // Inisialisasi TinyMCE untuk Pertanyaan (dengan upload ke server)
        tinymce.init({
            selector: '#editor_pertanyaan',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            images_upload_url: '<?= base_url("admin/ujian/upload_gambar_tinymce") ?>'
        });

        // Inisialisasi TinyMCE untuk Opsi Jawaban (dengan upload ke server)
        tinymce.init({
            selector: '.editor-opsi',
            menubar: false,
            plugins: 'autolink link image lists',
            toolbar: 'undo redo | bold italic underline | link image',
            height: 150,
            images_upload_url: '<?= base_url("admin/ujian/upload_gambar_tinymce") ?>'
        });

        // Inisialisasi GLightbox
        const lightbox = GLightbox({
            selector: '.glightbox'
        });

        // Logika untuk Jam Live
        function updateClock() {
            var now = new Date();
            var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var tanggal = hari[now.getDay()] + ', ' + now.getDate() + ' ' + bulan[now.getMonth()] + ' ' + now.getFullYear();
            var jam = ('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2) + ':' + ('0' + now.getSeconds()).slice(-2);
            var dateTimeString = tanggal + ' | ' + jam + ' WIB';

            if ($('#live-clock span').length) {
                $('#live-clock span').html(dateTimeString);
            }
        }
        setInterval(updateClock, 1000);
        updateClock();

    });
</script>
</body>

</html>