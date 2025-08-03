<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul; ?> | SMK Galajuara Kota Bekasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <?php if (isset($judul) && $judul == 'Login'): ?>
    <style>
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            background-color: #0A2647;
        }
        /* Ganti background body jika di halaman login */
        body {
            background-color: #0A2647;
        }
    </style>
    <?php endif; ?>

</head>
<body id="page-top">
    
    <?php if (isset($judul) && $judul == 'Login'): ?>
        <div id="particles-js"></div>
    <?php endif; ?>

    <?php $this->load->view('templates/navbar'); ?>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
        }
        .navbar-dark {
            background-color: #0A2647 !important; /* Biru Navy */
        }
        .navbar-brand, .nav-link {
            font-weight: 500;
        }
        .nav-link.active, .nav-link:hover {
            color: #FFD700 !important; /* Emas */
        }
        .btn-primary {
             background-color: #0A2647;
             border-color: #0A2647;
        }
         .btn-primary:hover {
             background-color: #081f38;
             border-color: #081f38;
        }
        .section-title {
            font-weight: 700;
            color: #0A2647;
            margin-bottom: 30px;
        }
        .card {
            border: none;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        /* Style untuk Hero Section */
    .hero-section {
        min-height: 90vh;
        background: linear-gradient(rgba(10, 38, 71, 0.7), rgba(10, 38, 71, 0.7)), url('<?= base_url("assets/images/gedung_sekolah.jpg") ?>') no-repeat center center;
        background-size: cover;
    }

    /* Style untuk Section dengan latar belakang abu-abu muda */
    .section-bg {
        background-color: #f8f9fa;
    }

    /* Style untuk kartu jurusan dengan ikon */
    .jurusan-card .icon {
        font-size: 3rem;
        color: #0A2647; /* Biru Navy */
        margin-bottom: 1rem;
    }
     /* Style untuk Slider (Carousel) */
    .carousel-item {
        height: 90vh; /* Tinggi slider di desktop (90% dari tinggi layar) */
        min-height: 400px;
    }

    .carousel-item img {
        /* Trik agar gambar selalu memenuhi slider tanpa gepeng/distorsi */
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ini bagian paling penting */
    }

    .carousel-caption {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        bottom: 3rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
    }

    /* Aturan khusus untuk layar kecil (HP) */
    @media (max-width: 767px) {
        .carousel-item {
            height: 50vh; /* Tinggi slider di HP menjadi setengah layar, agar tidak terlalu besar */
        }
        .carousel-caption h5 {
            font-size: 1.2rem;
        }
        .carousel-caption p {
            font-size: 0.9rem;
        }
    }
    /* Aturan untuk mengecilkan gambar di mode HP */
@media (max-width: 767px) {
    #foto-kepsek {
        max-width: 200px; /* Atur lebar maksimal gambar menjadi 200px */
        margin-bottom: 20px; /* Beri jarak bawah agar tidak terlalu mepet dengan teks */
    }
}
    </style>
</head>
<body>
