<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'siswa') {
            redirect('auth');
        }
        $this->load->model('M_Ujian');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Ujian Online';

        // Ambil data siswa yang login untuk mengetahui kelasnya
        $this->load->model('M_Siswa');
        $siswa = $this->M_Siswa->get_siswa_by_user_id($this->session->userdata('id_user'));
        $kelas_id = $this->M_Siswa->get_kelas_id_by_kode($siswa['kelas']);

        // Ambil ujian yang aktif dan sesuai dengan kelas siswa
        $data['ujian_tersedia'] = $this->M_Ujian->get_ujian_aktif_by_kelas($kelas_id);

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_ujian_list', $data);
        $this->load->view('templates/footer_admin');
    }
}
