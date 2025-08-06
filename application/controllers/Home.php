<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Siswa');
        $this->load->model('M_Guru');
        $this->load->model('M_Pengumuman');
    }

    public function index()
    {
        // Memuat model yang kita butuhkan
        $this->load->model('M_Siswa');
        $this->load->model('M_Guru');
        $this->load->model('M_Pengumuman');

        // Menyiapkan data untuk dikirim ke view
        $data['judul'] = 'Selamat Datang';

        // Mengambil data siswa berprestasi
        $data['siswa_berprestasi'] = $this->M_Siswa->get_siswa_berprestasi(3);

        // Mengambil data pengumuman terbaru (TAMBAHAN BARU)
        $data['pengumuman_terbaru'] = $this->M_Pengumuman->get_pengumuman_terbaru(3);

        // Memuat view dan mengirim semua data
        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_home', $data);
        $this->load->view('templates/footer');
    }
}
