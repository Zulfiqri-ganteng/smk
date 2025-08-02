<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Proteksi halaman
        if ($this->session->userdata('level') != 'admin') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak punya akses ke halaman ini!</div>');
            redirect('auth');
        }
    }

    public function index() {
        $data['judul'] = 'Dashboard Admin';
        // Load model pengunjung
    $this->load->model('M_Pengunjung');
        
        // Mengambil data untuk statistik
         $data['jumlah_guru'] = $this->db->count_all('guru');
    $data['jumlah_siswa'] = $this->db->count_all('siswa');
    $data['jumlah_pengumuman'] = $this->db->count_all('pengumuman');
    $data['pengunjung_hari_ini'] = $this->M_Pengunjung->get_pengunjung_hari_ini();
    $data['total_pengunjung'] = $this->M_Pengunjung->get_total_pengunjung();
        $data['jumlah_gallery'] = $this->db->count_all('gallery');

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_dashboard', $data); // Buat view ini
        $this->load->view('templates/footer_admin');
    }
}