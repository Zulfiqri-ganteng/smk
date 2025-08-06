<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    public function index()
    {
        $data['judul'] = 'Hubungi Kami';
        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_kontak', $data);
        $this->load->view('templates/footer');
    }
}