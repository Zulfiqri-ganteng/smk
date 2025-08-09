<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_Siswa');
        $this->load->model('M_Kelas');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['judul'] = 'Manajemen Data Siswa';
        $data['siswa'] = $this->M_Siswa->get_all_siswa();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('backend/admin/v_siswa_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data Siswa';
        $data['siswa_data'] = null;
        $data['kelas_list'] = $this->M_Kelas->get_all_kelas();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('backend/admin/v_siswa_form', $data);
        $this->load->view('templates/footer_admin');
    }


    public function tambah_aksi()
    {
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required|trim');
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim|is_unique[siswa.nis]|is_unique[users.username]');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $this->db->trans_start();

            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $password_default = date('dmY', strtotime($tanggal_lahir));
            $data_user = [
                'username'     => $this->input->post('nis', true),
                'password'     => password_hash($password_default, PASSWORD_DEFAULT),
                'nama_lengkap' => $this->input->post('nama_siswa', true),
                'level'        => 'siswa'
            ];
            $this->db->insert('users', $data_user);
            $user_id = $this->db->insert_id();

            $foto_siswa = 'default.jpg';
            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './assets/images/siswa/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                if ($this->upload->do_upload('foto')) {
                    $foto_siswa = $this->upload->data('file_name');
                }
            }

            $data_siswa = [
                'user_id'       => $user_id,
                'nis'           => $this->input->post('nis', true),
                'nama_siswa'    => $this->input->post('nama_siswa', true),
                'kelas'         => $this->input->post('kelas', true),
                'tanggal_lahir' => $tanggal_lahir,
                'juara'         => $this->input->post('juara'),
                'foto'          => $foto_siswa
            ];
            $this->db->insert('siswa', $data_siswa);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan.</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data siswa dan akun login berhasil dibuat!</div>');
            }
            redirect('admin/siswa');
        }
    }

    public function edit($id_siswa)
    {
        $data['judul'] = 'Edit Data Siswa';
        $data['siswa_data'] = $this->M_Siswa->get_siswa_by_id($id_siswa);
        $data['kelas_list'] = $this->M_Kelas->get_all_kelas();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('backend/admin/v_siswa_form', $data);
        $this->load->view('templates/footer_admin');
    }
    public function update_aksi()
    {
        $id_siswa = $this->input->post('id_siswa');
        $foto_lama = $this->input->post('foto_lama');
        $foto_baru = $foto_lama;

        // ----- LOGIKA UPLOAD FOTO SAAT EDIT -----
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './assets/images/siswa/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                // Hapus foto lama jika bukan default
                if ($foto_lama != 'default.jpg') {
                    @unlink(FCPATH . 'assets/images/siswa/' . $foto_lama);
                }
                $foto_baru = $this->upload->data('file_name');
            }
        }
        // ----- AKHIR LOGIKA UPLOAD -----

        $update_data_siswa = [
            'nama_siswa' => $this->input->post('nama_siswa', true),
            'nis'        => $this->input->post('nis', true),
            'kelas'      => $this->input->post('kelas', true),
            'juara'      => $this->input->post('juara', true),
            'foto'       => $foto_baru // Update dengan nama foto baru/lama
        ];
        $this->M_Siswa->update_siswa($id_siswa, $update_data_siswa);

        $data_siswa = $this->M_Siswa->get_siswa_by_id($id_siswa);
        $this->db->where('id', $data_siswa['user_id']);
        $this->db->update('users', ['nama_lengkap' => $this->input->post('nama_siswa', true)]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data siswa berhasil diperbarui!</div>');
        redirect('admin/siswa');
    }

    // Fungsi hapus sudah benar, tidak perlu diubah
    public function hapus($id_siswa)
    {
        $siswa = $this->M_Siswa->get_siswa_by_id($id_siswa);
        if ($siswa) {
            if ($siswa['foto'] != 'default.jpg') {
                @unlink(FCPATH . 'assets/images/siswa/' . $siswa['foto']);
            }
            $this->M_Siswa->delete_siswa($id_siswa);
            $this->db->where('id', $siswa['user_id']);
            $this->db->delete('users');
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data siswa dan akun terkait berhasil dihapus!</div>');
        redirect('admin/siswa');
    }
}
