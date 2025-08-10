<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'siswa') {
            redirect('auth');
        }
        $this->load->model('M_Tugas');
        $this->load->model('M_Siswa');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['judul'] = 'Tugas Harian';
        $profil_siswa = $this->M_Siswa->get_siswa_by_user_id($this->session->userdata('id_user'));
        $data['tugas_list'] = $this->M_Tugas->get_tugas_by_kelas_with_status($profil_siswa['kelas'], $this->session->userdata('id_user'));

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_tugas_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function detail($id_tugas)
    {
        $data['judul'] = 'Detail Tugas';
        $data['tugas'] = $this->M_Tugas->get_tugas_by_id($id_tugas);
        $data['jawaban'] = $this->M_Tugas->get_jawaban_by_tugas_dan_siswa($id_tugas, $this->session->userdata('id_user'));

        if (!$data['tugas']) redirect('siswa/tugas'); // Pengaman jika tugas tidak ada

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_tugas_detail', $data);
        $this->load->view('templates/footer_admin');
    }

    public function kumpul_jawaban($id_tugas)
    {
        // Buat folder 'uploads/jawaban_tugas/' di root proyek Anda
        $config['upload_path']   = './uploads/jawaban_tugas/';
        $config['allowed_types'] = 'pdf|doc|docx|zip|rar|jpg|png';
        $config['encrypt_name']  = TRUE;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file_jawaban')) {
            $data_insert = [
                'tugas_id'      => $id_tugas,
                'siswa_id'      => $this->session->userdata('id_user'),
                'file_jawaban'  => $this->upload->data('file_name'),
                'status'        => 'Sudah Dikumpulkan'
            ];
            $this->M_Tugas->insert_jawaban($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Tugas berhasil dikumpulkan!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
        }
        redirect('siswa/tugas/detail/' . $id_tugas);
    }
}
