<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $judul; ?></title>
    <link href="<?= base_url('assets/sb-admin-2/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            /* Penting agar berada di belakang konten */
        }
    </style>
    <style>
        /* ======================================================= */
        /* ANIMASI BACKGROUND                      */
        /* ======================================================= */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            /* Warna Latar Belakang Gelap diatur di sini */
            background-color: #212529;
        }

        /* ======================================================= */
        /* DARK MODE UTAMA                       */
        /* ======================================================= */

        /* Latar belakang konten dibuat transparan agar animasi terlihat */
        #content-wrapper,
        #content {
            background-color: transparent !important;
        }

        /* Menyesuaikan Warna Topbar dan Footer */
        .topbar,
        footer.sticky-footer {
            background-color: #343a40 !important;
            /* Warna abu-abu gelap seperti kartu */
        }

        /* Mengubah warna teks copyright di footer agar terlihat */
        footer.sticky-footer .copyright {
            color: #8a8a8a;
        }

        /* Mengubah warna dasar dari template */
        :root {
            --bs-gray-100: #4a4a4a;
            --bs-gray-200: #5a5a5a;
            --bs-gray-300: #6a6a6a;
            --bs-gray-400: #7a7a7a;
            --bs-gray-500: #8a8a8a;
            --bs-gray-600: #adb5bd;
            --bs-gray-700: #ced4da;
            --bs-gray-800: #dee2e6;
            --bs-gray-900: #f8f9fa;
        }

        .card,
        footer.sticky-footer,
        .topbar,
        .modal-content {
            background-color: #343a40;
        }

        .card,
        .modal-header,
        .modal-footer,
        .table,
        .table-bordered,
        .table-bordered th,
        .table-bordered td {
            border-color: #495057;
        }

        .table,
        .modal-content {
            color: #ced4da;
        }

        .form-control {
            background-color: #495057;
            color: #f8f9fa;
            border-color: #6a6a6a;
        }

        .form-control:focus {
            background-color: #495057;
            color: #f8f9fa;
            border-color: #80bdff;
        }

        /* ======================================================= */
        /* WARNA SIDEBAR                      */
        /* ======================================================= */
        .sidebar.accordion {
            background-color: #0A2647;
            background-image: linear-gradient(180deg, #0d2c54 10%, #0a2647 100%);
        }

        .sidebar .nav-item .nav-link {
            color: rgba(255, 255, 255, 0.8);
        }

        .sidebar .nav-item .nav-link i {
            color: rgba(255, 255, 255, 0.5);
        }

        .sidebar .nav-item.active .nav-link,
        .sidebar .nav-item .nav-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-item.active .nav-link i,
        .sidebar .nav-item .nav-link:hover i {
            color: #ffffff;
        }

        .sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.15);
        }

        .sidebar .sidebar-heading {
            color: rgba(255, 255, 255, 0.4);
        }
    </style>
</head>

<body id="page-top">
    <div id="particles-js"></div>

    <div id="wrapper">