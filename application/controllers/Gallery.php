<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{

    public function index()
    {
        $this->load->model('M_Gallery');
        $data['judul'] = 'Galeri Kegiatan';
        $data['daftar_foto'] = $this->M_Gallery->get_all_photos();

        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_gallery', $data);
        $this->load->view('templates/footer');
    }
}
