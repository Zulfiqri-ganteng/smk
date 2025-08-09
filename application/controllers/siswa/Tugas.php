<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'siswa') {
            redirect('auth');
        }
        $this->load->model('M_Tugas');
        $this->load->model('M_Siswa');
    }

    public function index()
    {
        $data['judul'] = 'Tugas Harian';

        // Ambil data kelas siswa yang sedang login
        $user_id = $this->session->userdata('id_user');
        $profil_siswa = $this->M_Siswa->get_siswa_by_user_id($user_id);
        $kelas_siswa = $profil_siswa['kelas'];

        // Ambil daftar tugas berdasarkan kelas siswa
        $data['tugas'] = $this->M_Tugas->get_tugas_by_kelas($kelas_siswa);

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_tugas_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function detail($id_tugas)
    {
        $data['judul'] = 'Detail Tugas';
        $data['tugas'] = $this->M_Tugas->get_tugas_by_id($id_tugas);

        if (!$data['tugas']) {
            redirect('siswa/tugas');
        }

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_tugas_detail', $data);
        $this->load->view('templates/footer_admin');
    }
}
