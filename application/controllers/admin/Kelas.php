<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_Kelas');
        $this->load->library('form_validation');
        $this->load->model('M_Siswa');
    }

    public function index()
    {
        $data['judul'] = 'Manajemen Data Kelas';
        $this->load->library('pagination');

        // Ambil keyword pencarian
        $keyword = $this->input->get('keyword');

        // Konfigurasi pagination
        $config['base_url'] = base_url('admin/kelas/index');
        $config['total_rows'] = $this->M_Kelas->count_all_kelas($keyword);
        $config['per_page'] = 5; // Tampilkan 5 data per halaman
        $config['num_links'] = 2;

        // Styling pagination
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-end">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(4);
        $data['kelas'] = $this->M_Kelas->get_kelas($config['per_page'], $data['start'], $keyword);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_kelas_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data Kelas';
        $kode_kelas = $this->input->post('tingkat') . ' ' . $this->input->post('nama_jurusan') . ' ' . $this->input->post('nomor_kelas');
        // Aturan validasi
        $this->form_validation->set_rules('kode_kelas_hidden', 'Kode Kelas', 'callback_cek_kode_kelas_unik');

        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_kelas_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $data_insert = [
                'tingkat' => $this->input->post('tingkat'),
                'nama_jurusan' => $this->input->post('nama_jurusan'),
                'kode_kelas' => $this->input->post('tingkat') . ' ' . $this->input->post('nama_jurusan') . ' ' . $this->input->post('nomor_kelas')
            ];
            $this->M_Kelas->insert_kelas($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Kelas baru berhasil ditambahkan!</div>');
            redirect('admin/kelas');
        }
    }

    public function hapus($id)
    {
        $this->M_Kelas->delete_kelas($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data kelas berhasil dihapus!</div>');
        redirect('admin/kelas');
    }
    public function edit($id)
    {
        $data['judul'] = 'Edit Data Kelas';
        $data['kelas'] = $this->M_Kelas->get_kelas_by_id($id);

        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_kelas_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $data_update = [
                'tingkat' => $this->input->post('tingkat'),
                'nama_jurusan' => $this->input->post('nama_jurusan'),
                'kode_kelas' => $this->input->post('tingkat') . ' ' . $this->input->post('nama_jurusan') . ' ' . $this->input->post('nomor_kelas')
            ];
            $this->M_Kelas->update_kelas($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data kelas berhasil diperbarui!</div>');
            redirect('admin/kelas');
        }
    }
    public function lihat_siswa($id_kelas)
    {
        $data['judul'] = 'Daftar Siswa per Kelas';
        $data['kelas_info'] = $this->M_Kelas->get_kelas_by_id($id_kelas);
        $data['siswa'] = $this->M_Siswa->get_siswa_by_kelas($data['kelas_info']['kode_kelas']);

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_siswa_per_kelas_list', $data); // Buat view ini
        $this->load->view('templates/footer_admin');
    }
    public function cek_kode_kelas_unik()
    {
        $kode_kelas = $this->input->post('tingkat') . ' ' . $this->input->post('nama_jurusan') . ' ' . $this->input->post('nomor_kelas');
        $is_unique = $this->db->where('kode_kelas', $kode_kelas)->get('kelas')->num_rows() == 0;

        if (!$is_unique) {
            $this->form_validation->set_message('cek_kode_kelas_unik', 'Kode Kelas sudah ada.');
            return FALSE;
        }
        return TRUE;
    }
}
