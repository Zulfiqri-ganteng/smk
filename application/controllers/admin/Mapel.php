<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_Mapel');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['judul'] = 'Manajemen Mata Pelajaran';
        $keyword = $this->input->get('keyword');
        $sort = $this->input->get('sort') ? $this->input->get('sort') : 'asc';

        $config['base_url'] = base_url('admin/mapel/index');
        $config['total_rows'] = $this->M_Mapel->count_all_mapel($keyword);
        $config['per_page'] = 10;
        $config['reuse_query_string'] = TRUE;
        // ... (Styling pagination seperti modul kelas) ...

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(4);
        $data['mapel'] = $this->M_Mapel->get_mapel($config['per_page'], $data['start'], $keyword, $sort);
        $data['pagination'] = $this->pagination->create_links();
        $data['sort'] = $sort;

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_mapel_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Mata Pelajaran';
        $this->form_validation->set_rules('nama_mapel', 'Nama Mapel', 'required|is_unique[mapel.nama_mapel]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_mapel_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->M_Mapel->insert_mapel([
                'nama_mapel' => $this->input->post('nama_mapel'),
                'kode_mapel' => $this->input->post('kode_mapel')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Mata pelajaran baru berhasil ditambahkan!</div>');
            redirect('admin/mapel');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Mata Pelajaran';
        $data['mapel'] = $this->M_Mapel->get_mapel_by_id($id);
        $this->form_validation->set_rules('nama_mapel', 'Nama Mapel', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_mapel_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->M_Mapel->update_mapel($id, [
                'nama_mapel' => $this->input->post('nama_mapel'),
                'kode_mapel' => $this->input->post('kode_mapel')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Mata pelajaran berhasil diperbarui!</div>');
            redirect('admin/mapel');
        }
    }

    public function hapus($id)
    {
        $this->M_Mapel->delete_mapel($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Mata pelajaran berhasil dihapus!</div>');
        redirect('admin/mapel');
    }
}
