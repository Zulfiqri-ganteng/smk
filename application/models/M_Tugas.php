<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Tugas extends CI_Model
{

    // application/models/M_Tugas.php
    public function get_tugas_by_kelas($kelas)
    {
        return $this->db->get_where('tugas_harian', ['kelas_tujuan' => $kelas])->result_array();
    }
    public function get_tugas_by_id($id)
    {
        return $this->db->get_where('tugas_harian', ['id' => $id])->row_array();
    }
}
