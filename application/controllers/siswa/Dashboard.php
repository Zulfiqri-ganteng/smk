<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'siswa') {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Dashboard Siswa';

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_dashboard', $data);
        $this->load->view('templates/footer_admin');
    }
}
