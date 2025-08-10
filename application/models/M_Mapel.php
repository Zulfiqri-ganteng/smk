<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Mapel extends CI_Model
{

    private $table = 'mapel';

    public function get_mapel($limit, $start, $keyword = null, $sort = 'asc')
    {
        if ($keyword) {
            $this->db->like('nama_mapel', $keyword);
            $this->db->or_like('kode_mapel', $keyword);
        }
        $this->db->order_by('nama_mapel', $sort);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result_array();
    }

    public function count_all_mapel($keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_mapel', $keyword);
            $this->db->or_like('kode_mapel', $keyword);
        }
        return $this->db->count_all_results($this->table);
    }

    public function get_mapel_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function insert_mapel($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_mapel($id, $data)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete_mapel($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
    public function get_all_mapel()
    {
        return $this->db->order_by('nama_mapel', 'ASC')->get('mapel')->result_array();
    }
}
