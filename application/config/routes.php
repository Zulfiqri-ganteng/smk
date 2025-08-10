<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['auth/register'] = 'Auth/register';

// Rute Halaman Publik
$route['guru'] = 'Guru';
$route['siswa'] = 'Siswa_web';

// Rute Backend Admin
$route['admin/dashboard'] = 'admin/Dashboard';
$route['admin/guru'] = 'admin/Guru';
$route['admin/siswa'] = 'admin/Siswa';
$route['admin/ujian/set_status/(:num)/(:any)'] = 'admin/Ujian/set_status/$1/$2';

// (Tambahkan rute admin lainnya di sini jika perlu)

// Rute Backend Siswa
$route['siswa/dashboard'] = 'siswa/Dashboard';
$route['siswa/ujian'] = 'siswa/Ujian';
$route['siswa/ujian/kerjakan/(:num)'] = 'siswa/Ujian/kerjakan/$1';
$route['siswa/ujian/hasil/(:num)'] = 'siswa/Ujian/hasil/$1';
// (Tambahkan rute siswa lainnya di sini jika perlu)