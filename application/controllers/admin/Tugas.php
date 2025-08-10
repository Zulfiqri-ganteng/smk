<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_Tugas');
        $this->load->model('M_Kelas');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Manajemen Tugas Harian';
        $data['tugas_list'] = $this->M_Tugas->get_all_tugas();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_tugas_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah()
    {
        $data['judul'] = 'Beri Tugas Baru';
        $data['kelas_list'] = $this->M_Kelas->get_all_kelas();
        $this->form_validation->set_rules('judul_tugas', 'Judul Tugas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_tugas_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $data_insert = [
                'judul_tugas' => $this->input->post('judul_tugas'),
                'deskripsi' => $this->input->post('deskripsi'),
                'kelas_tujuan' => $this->input->post('kelas_tujuan'),
                'deadline' => $this->input->post('deadline'),
                'guru_id' => 1 // Asumsi admin
            ];
            $this->M_Tugas->insert_tugas($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Tugas baru berhasil diberikan!</div>');
            redirect('admin/tugas');
        }
    }

    public function edit($id)
    {
        // ... (fungsi edit bisa ditambahkan di sini) ...
    }

    public function hapus($id)
    {
        $this->M_Tugas->delete_tugas($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Tugas berhasil dihapus!</div>');
        redirect('admin/tugas');
    }
}
