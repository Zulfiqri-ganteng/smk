<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_Gallery');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    // Fungsi canggih untuk mengambil ID video dari berbagai jenis URL YouTube
    private function _get_youtube_id($url)
    {
        preg_match('%(?:youtube(?:-nocookie)?\\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\\.be/)([^"&?/ ]{11})%i', $url, $match);
        return isset($match[1]) ? $match[1] : false;
    }

    public function index()
    {
        $data['judul'] = 'Manajemen Galeri';
        $data['gallery'] = $this->M_Gallery->get_all_photos();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('backend/admin/v_gallery_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Media Galeri';
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('backend/admin/v_gallery_form', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah_aksi()
    {
        $tipe = $this->input->post('tipe');
        $data = [
            'judul_foto' => $this->input->post('judul_foto'),
            'tipe' => $tipe
        ];

        if ($tipe == 'gambar') {
            $config['upload_path'] = './assets/images/gallery/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('nama_file')) {
                $data['nama_file'] = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('admin/gallery/tambah');
                return;
            }
        } elseif ($tipe == 'youtube') {
            $youtube_id = $this->_get_youtube_id($this->input->post('youtube_link'));
            if ($youtube_id) {
                $data['youtube_id'] = $youtube_id;
                $data['nama_file'] = NULL; // Kosongkan nama file karena ini video
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Link YouTube tidak valid! Mohon salin link lengkap dari browser.</div>');
                redirect('admin/gallery/tambah');
                return;
            }
        }

        $this->M_Gallery->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Media baru berhasil ditambahkan!</div>');
        redirect('admin/gallery');
    }

    public function hapus($id)
    {
        $item = $this->M_Gallery->get_by_id($id); // Anda perlu membuat fungsi ini di M_Gallery
        if ($item && $item['tipe'] == 'gambar' && $item['nama_file'] != 'default.jpg') {
            // Hapus file gambar jika ada
            @unlink(FCPATH . 'assets/images/gallery/' . $item['nama_file']);
        }
        $this->M_Gallery->delete($id); // Anda perlu membuat fungsi ini di M_Gallery
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Media berhasil dihapus!</div>');
        redirect('admin/gallery');
    }
}
