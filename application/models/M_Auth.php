<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {
    public function get_user($username) {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }
}