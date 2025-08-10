<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kelas extends CI_Model
{
    public function get_all_kelas()
    {
        // ✅ CUKUP TAMBAHKAN BARIS INI
        $this->db->order_by('id', 'DESC');

        return $this->db->get('kelas')->result_array();
    }
    public function get_kelas($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('kode_kelas', $keyword);
            $this->db->or_like('tingkat', $keyword);
            $this->db->or_like('nama_jurusan', $keyword);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('kode_kelas', 'ASC');
        return $this->db->get('kelas')->result_array();
    }

    public function count_all_kelas($keyword = null)
    {
        if ($keyword) {
            $this->db->like('kode_kelas', $keyword);
            $this->db->or_like('tingkat', $keyword);
            $this->db->or_like('nama_jurusan', $keyword);
        }
        return $this->db->count_all_results('kelas');
    }

    public function get_kelas_by_id($id)
    {
        return $this->db->get_where('kelas', ['id' => $id])->row_array();
    }
    public function get_kelas_by_kode($kode_kelas)
    {
        return $this->db->get_where('kelas', ['kode_kelas' => $kode_kelas])->row_array();
    }

    public function insert_kelas($data)
    {
        return $this->db->insert('kelas', $data);
    }

    public function update_kelas($id, $data)
    {
        return $this->db->update('kelas', $data, ['id' => $id]);
    }

    public function delete_kelas($id)
    {
        return $this->db->delete('kelas', ['id' => $id]);
    }
}
