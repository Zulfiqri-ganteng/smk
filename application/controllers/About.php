<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Tentang Kami';

        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_about', $data); // Pastikan Anda memiliki view ini
        $this->load->view('templates/footer');
    }
}
