<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['auth/register'] = 'Auth/register';

// Rute untuk Frontend
// $route['guru'] = 'guru/index';
// $route['siswa'] = 'siswa/index';
// $route['pengumuman'] = 'pengumuman/index';
// $route['gallery'] = 'gallery/index';
// $route['ebook'] = 'ebook/index';
// $route['kontak'] = 'kontak/index';
// $route['about'] = 'about/index';

// Rute untuk Backend Admin
$route['admin'] = 'admin/dashboard';
$route['admin/guru'] = 'admin/guru';
$route['admin/siswa'] = 'admin/siswa';

// Rute untuk Backend Siswa
$route['siswa/dashboard'] = 'siswa/dashboard';
$route['siswa/profile'] = 'siswa/profil';
$route['guru'] = 'Guru/index';

$route['siswa/ujian'] = 'siswa/ujian/index';
$route['siswa/ujian/kerjakan/(:num)'] = 'siswa/ujian/kerjakan/$1';
$route['siswa/ujian/hasil/(:num)'] = 'siswa/ujian/hasil/$1';