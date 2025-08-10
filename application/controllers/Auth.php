<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Auth');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('level')) {
            redirect(strtolower($this->session->userdata('level')) . '/dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Login';
            $this->load->view('templates/header', $data);
            $this->load->view('v_login');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->M_Auth->get_user($username);

        if ($user) {
            if (password_verify($password, trim($user['password']))) {
                $data_session = [
                    'id_user' => $user['id'],
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'nama_lengkap' => $user['nama_lengkap']
                ];
                $this->session->set_userdata($data_session);

                redirect(strtolower($user['level']) . '/dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
