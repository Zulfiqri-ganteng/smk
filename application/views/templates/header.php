<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($judul) ? $judul : 'SMK Galajuara'; ?> | SMK Galajuara</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body>

    <?php
    // Bagian ini akan memuat navbar Anda
    $this->load->view('templates/navbar');
    ?>

    <main id="main">