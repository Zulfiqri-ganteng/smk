<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function index()
    {
        $this->load->model('M_Siswa');
        $data['judul'] = 'Siswa Berprestasi';
        $data['siswa_berprestasi'] = $this->M_Siswa->get_siswa_berprestasi(12);

        $this->load->view('templates/header', $data);
        // Pastikan memuat file view yang benar
        $this->load->view('frontend/v_siswa', $data);
        $this->load->view('templates/footer');
    }
}
