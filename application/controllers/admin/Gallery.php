<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_Gallery');
        $this->load->library('form_validation');
        // Library 'upload' akan di-load nanti saat dibutuhkan
    }

    public function index() {
        $data['judul'] = 'Manajemen Gallery';
        $data['gallery'] = $this->M_Gallery->get_all_gallery();
        
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_gallery_list', $data);
        $this->load->view('templates/footer_admin');
    }

    // Mengganti nama fungsi 'tambah' menjadi 'tambah_aksi' untuk proses
    public function tambah() {
        $data['judul'] = 'Tambah File Gallery';
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_gallery_form', $data);
        $this->load->view('templates/footer_admin');
    }
    
    // Fungsi ini khusus untuk menangani proses upload setelah form disubmit
    public function proses_upload() {
        $this->form_validation->set_rules('judul_foto', 'Judul File', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah(); // Kembali ke form jika judul kosong
        } else {
            // ----- PERUBAHAN UTAMA ADA DI SINI -----

            // 1. Arahkan ke folder baru untuk video
            $config['upload_path'] = './assets/videos/'; 
            
            // 2. Izinkan tipe file gambar DAN video
            $config['allowed_types'] = 'jpg|png|jpeg|gif|mp4|mov|avi|wmv';
            
            // 3. Naikkan batas ukuran file (contoh: 100MB)
            $config['max_size'] = '102400'; // 100MB dalam Kilobyte
            
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            // 'file_gallery' adalah nama dari input file di form Anda
            if ($this->upload->do_upload('file_gallery')) {
                $data_gallery = [
                    'judul_foto' => $this->input->post('judul_foto', true),
                    'nama_file' => $this->upload->data('file_name'),
                ];
                $this->M_Gallery->insert_gallery($data_gallery);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">File berhasil diupload!</div>');
                redirect('admin/gallery');
            } else {
                // Jika upload gagal, tampilkan pesan error dari library upload
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('admin/gallery/tambah');
            }
        }
    }

    public function hapus($id) {
        $file_data = $this->M_Gallery->get_gallery_by_id($id);
        if ($file_data) {
            $nama_file = $file_data['nama_file'];
            $extension = pathinfo($nama_file, PATHINFO_EXTENSION);
            $image_types = ['jpg', 'png', 'jpeg', 'gif'];
            $video_types = ['mp4', 'mov', 'avi', 'wmv'];

            // Tentukan path berdasarkan tipe file untuk menghapus file yang benar
            if (in_array($extension, $image_types)) {
                $file_path = './assets/images/gallery/' . $nama_file;
            } elseif (in_array($extension, $video_types)) {
                $file_path = './assets/videos/' . $nama_file;
            } else {
                // Default path jika ada tipe file lain
                 $file_path = './assets/images/gallery/' . $nama_file;
            }

            if (file_exists($file_path)) {
                unlink($file_path);
            }
            
            $this->M_Gallery->delete_gallery($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">File berhasil dihapus!</div>');
        }
        redirect('admin/gallery');
    }
}