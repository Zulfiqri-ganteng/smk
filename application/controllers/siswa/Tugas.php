<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Pengecekan sesi, pastikan hanya siswa yang bisa akses
        if ($this->session->userdata('level') != 'siswa') {
            redirect('auth');
        }
        // Memuat model yang dibutuhkan
        $this->load->model('M_Tugas');
        $this->load->model('M_Siswa');
        $this->load->library('upload');
    }

    /**
     * Menampilkan halaman daftar tugas.
     */
    public function index()
    {
        $data['judul'] = 'Tugas Harian';

        // Ambil profil siswa yang sedang login untuk mengetahui kelasnya
        $profil_siswa = $this->M_Siswa->get_siswa_by_user_id($this->session->userdata('id_user'));

        // Ambil daftar tugas berdasarkan kelas siswa, lengkap dengan status pengerjaannya
        $data['tugas_list'] = $this->M_Tugas->get_tugas_by_kelas_with_status($profil_siswa['kelas'], $this->session->userdata('id_user'));

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_tugas_list', $data);
        $this->load->view('templates/footer_admin');
    }

    /**
     * Menampilkan halaman detail tugas dan form untuk mengumpulkan jawaban.
     */
    public function detail($id_tugas)
    {
        $data['judul'] = 'Detail Tugas';
        $data['tugas'] = $this->M_Tugas->get_tugas_by_id($id_tugas);
        $data['jawaban'] = $this->M_Tugas->get_jawaban_by_tugas_dan_siswa($id_tugas, $this->session->userdata('id_user'));

        // Pengaman jika tugas tidak ditemukan
        if (!$data['tugas']) {
            redirect('siswa/tugas');
        }

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_tugas_detail', $data);
        $this->load->view('templates/footer_admin');
    }

    /**
     * Memproses file jawaban yang diunggah oleh siswa.
     */
    public function kumpul_jawaban($id_tugas)
    {
        // Konfigurasi untuk proses upload file
        $config['upload_path']   = './uploads/jawaban_tugas/';
        $config['allowed_types'] = 'pdf|doc|docx|zip|rar|jpg|jpeg|png';
        $config['max_size']      = 5120; // 5MB
        $config['encrypt_name']  = TRUE;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file_jawaban')) {
            // Jika upload berhasil, simpan data ke database
            $data_insert = [
                'tugas_id'      => $id_tugas,
                'siswa_id'      => $this->session->userdata('id_user'),
                'file_jawaban'  => $this->upload->data('file_name'),
                'status'        => 'Sudah Dikumpulkan'
            ];
            $this->M_Tugas->insert_jawaban($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Tugas berhasil dikumpulkan!</div>');
        } else {
            // Jika upload gagal, tampilkan pesan error
            $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
        }
        redirect('siswa/tugas/detail/' . $id_tugas);
    }
}
