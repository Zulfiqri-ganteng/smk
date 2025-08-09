<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Rute Halaman Publik
$route['guru'] = 'Guru';
$route['siswa'] = 'Siswa_web/index';
// (Tambahkan rute publik lain jika perlu)

// Rute Backend Admin
$route['admin/dashboard'] = 'admin/Dashboard';
$route['admin/guru'] = 'admin/Guru';
$route['admin/siswa'] = 'admin/Siswa';
// (Tambahkan rute admin lain)

// Rute Backend Siswa
$route['siswa/dashboard'] = 'siswa/Dashboard';
$route['siswa/ujian'] = 'siswa/Ujian';
// (Tambahkan rute siswa lain)