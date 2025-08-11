<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    public function index()
    {
        // 1. Muat model M_Guru
        $this->load->model('M_Guru');

        // 2. Siapkan data untuk view
        $data['judul'] = 'Staf Pendidik';
        $data['daftar_guru'] = $this->M_Guru->get_all_guru();

        // 3. Muat view
        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_guru', $data);
        $this->load->view('templates/footer');
    }
    public function daftar_jawaban($id_tugas)
    {
        $data['judul'] = 'Daftar Jawaban Siswa';
        $data['jawaban'] = $this->M_Tugas->get_jawaban_by_tugas($id_tugas);
        $this->load->view('guru/v_daftar_jawaban', $data);
    }

    public function nilai($id_jawaban)
    {
        $data['judul'] = 'Beri Nilai Tugas';
        $data['jawaban'] = $this->M_Tugas->get_jawaban_by_id($id_jawaban);
        $this->load->view('guru/v_form_nilai', $data);
    }

    public function simpan_nilai()
    {
        $id_jawaban = $this->input->post('id_jawaban');
        $nilai      = $this->input->post('nilai');
        $catatan    = $this->input->post('catatan');

        $this->M_Tugas->update_jawaban($id_jawaban, [
            'nilai'   => $nilai,
            'catatan' => $catatan
        ]);

        $this->session->set_flashdata('message', '<div class="alert alert-success">Nilai berhasil disimpan!</div>');
        redirect($_SERVER['HTTP_REFERER']); // kembali ke halaman sebelumnya
    }
}
