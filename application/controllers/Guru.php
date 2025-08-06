<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    public function index()
    {
        // 1. Muat model M_Guru
        $this->load->model('M_Guru');

        // 2. Siapkan data untuk view
        $data['judul'] = 'Staf Pendidik';
        $data['daftar_guru'] = $this->M_Guru->get_all_guru();

        // 3. Muat view
        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_guru', $data);
        $this->load->view('templates/footer');
    }
}
