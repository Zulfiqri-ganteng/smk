<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Siswa');
    }

    public function index() {
        $data['judul'] = 'Siswa Berprestasi';
        // Mengambil data siswa yang ditandai sebagai 'terbaik'
        $data['siswa_terbaik'] = $this->M_Siswa->get_siswa_terbaik();
        
        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_siswa', $data);
        $this->load->view('templates/footer');
    }
}