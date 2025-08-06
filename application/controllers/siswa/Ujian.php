<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Pastikan siswa sudah login
        if ($this->session->userdata('level') != 'siswa') {
            redirect('auth');
        }
        $this->load->model('M_Ujian');
        $this->load->model('M_Siswa'); // Kita butuh ini untuk mendapatkan ID siswa
    }

    // Halaman daftar ujian yang tersedia
    public function index()
    {
        $data['judul'] = 'Daftar Ujian Online';

        // Ambil data siswa yang sedang login dari tabel users
        $user_id = $this->session->userdata('id_user');
        $siswa = $this->M_Siswa->get_siswa_by_user_id($user_id);

        if (!$siswa) {
            // Handle jika data siswa tidak ditemukan
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data siswa tidak ditemukan!</div>');
            redirect('siswa/dashboard');
        }

        $data['siswa_id'] = $siswa['id'];
        $data['ujian_tersedia'] = $this->M_Ujian->get_ujian_tersedia($data['siswa_id']);

        $this->load->view('templates/header_siswa', $data); // Asumsi ada header khusus siswa
        $this->load->view('backend/siswa/v_ujian_list', $data);
        $this->load->view('templates/footer_siswa', $data); // Asumsi ada footer khusus siswa
    }

    // Halaman untuk mengerjakan ujian
    public function kerjakan($id_ujian)
    {
        $user_id = $this->session->userdata('id_user');
        $siswa = $this->M_Siswa->get_siswa_by_user_id($user_id);

        // Cek apakah siswa sudah pernah mengerjakan ujian ini
        if ($this->M_Ujian->cek_sudah_mengerjakan($id_ujian, $siswa['id'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Anda sudah pernah mengerjakan ujian ini!</div>');
            redirect('siswa/ujian');
        }

        $data['judul'] = 'Pengerjaan Ujian';
        $data['ujian'] = $this->M_Ujian->get_detail_ujian($id_ujian);
        $data['soal'] = $this->M_Ujian->get_soal_by_ujian($id_ujian);
        $data['id_siswa'] = $siswa['id'];

        // Acak urutan soal
        shuffle($data['soal']);

        if (!$data['ujian'] || !$data['soal']) {
            redirect('siswa/ujian');
        }

        $this->load->view('backend/siswa/v_ujian_kerjakan', $data);
    }

    // Proses submit jawaban
    public function submit()
    {
        $id_ujian = $this->input->post('id_ujian');
        $id_siswa = $this->input->post('id_siswa');
        $jawaban_post = $this->input->post('jawaban'); // Array jawaban dari form

        if (empty($jawaban_post)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum menjawab satu soal pun!</div>');
            redirect('siswa/ujian/kerjakan/' . $id_ujian);
        }

        // Panggil model untuk menghitung nilai dan menyimpan hasil
        $hasil_id = $this->M_Ujian->hitung_dan_simpan_jawaban($id_ujian, $id_siswa, $jawaban_post);

        // Redirect ke halaman hasil
        redirect('siswa/ujian/hasil/' . $hasil_id);
    }

    // Halaman untuk menampilkan hasil ujian
    public function hasil($id_jawaban_siswa)
    {
        $data['judul'] = 'Hasil Ujian';
        $data['hasil'] = $this->M_Ujian->get_hasil_ujian($id_jawaban_siswa);

        if (!$data['hasil']) {
            redirect('siswa/ujian');
        }

        $this->load->view('templates/header_siswa', $data);
        $this->load->view('backend/siswa/v_ujian_hasil', $data);
        $this->load->view('templates/footer_siswa', $data);
    }
}
