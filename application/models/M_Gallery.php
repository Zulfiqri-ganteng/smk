<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Gallery extends CI_Model
{

    public function get_all_photos()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('gallery')->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('gallery', ['id' => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('gallery', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('gallery', ['id' => $id]);
    }
}
