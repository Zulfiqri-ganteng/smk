<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Tugas extends CI_Model
{

    public function get_all_tugas()
    {
        return $this->db->order_by('id', 'DESC')->get('tugas_harian')->result_array();
    }

    public function insert_tugas($data)
    {
        return $this->db->insert('tugas_harian', $data);
    }

    public function delete_tugas($id)
    {
        return $this->db->delete('tugas_harian', ['id' => $id]);
    }

    // Untuk Siswa
    public function get_tugas_by_kelas_with_status($kelas, $siswa_id)
    {
        $this->db->select('t.*, j.status as status_pengerjaan');
        $this->db->from('tugas_harian as t');
        $this->db->join('tugas_jawaban as j', "t.id = j.tugas_id AND j.siswa_id = $siswa_id", 'left');
        $this->db->where('t.kelas_tujuan', $kelas);
        return $this->db->get()->result_array();
    }
    public function get_tugas_by_id($id)
    {
        return $this->db->get_where('tugas_harian', ['id' => $id])->row_array();
    }
    public function get_jawaban_by_tugas_dan_siswa($tugas_id, $siswa_id)
    {
        return $this->db->get_where('tugas_jawaban', ['tugas_id' => $tugas_id, 'siswa_id' => $siswa_id])->row_array();
    }
     
    public function insert_jawaban($data) {
        return $this->db->insert('tugas_jawaban', $data);
    }
}
