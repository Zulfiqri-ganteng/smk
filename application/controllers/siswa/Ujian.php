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
        $this->load->model('M_Siswa');
        $this->load->model('M_Kelas');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Ujian Online';


        // Ambil profil siswa yang login
        $siswa = $this->M_Siswa->get_siswa_by_user_id($this->session->userdata('id_user'));

        // Ambil ID kelas dari nama kelas siswa
        $kelas = $this->M_Kelas->get_kelas_by_kode($siswa['kelas']);
        $kelas_id = $kelas ? $kelas['id'] : null;

        // Ambil ujian yang aktif dan sesuai kelas siswa
        $data['ujian_tersedia'] = $this->M_Ujian->get_ujian_aktif();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_ujian_list', $data);
        $this->load->view('templates/footer_admin');
    }
}
