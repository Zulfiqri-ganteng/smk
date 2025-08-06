<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Siswa extends CI_Model
{

    private $table = 'siswa';

    /**
     * Mengambil semua data siswa.
     * @param int|null $limit Batasan jumlah data yang diambil.
     * @return array
     */
    public function get_all_siswa($limit = null)
    {
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->order_by('nama_siswa', 'ASC');
        return $this->db->get($this->table)->result_array();
    }

    /**
     * Mengambil data siswa berprestasi.
     * @param int $limit Batasan jumlah data yang diambil.
     * @return array
     */
    // Ganti fungsi lama Anda (get_siswa_terbaik) dengan fungsi yang benar ini
    public function get_siswa_berprestasi($limit = 3)
    {
        $this->db->where('juara >', 0); // Menggunakan kolom 'juara' yang baru
        $this->db->limit($limit);
        $this->db->order_by('juara', 'ASC'); // Urutkan dari Juara 1, 2, 3

        // Tambahkan pengecekan sebelum return
        $query = $this->db->get('siswa');
        if ($query) {
            return $query->result_array();
        } else {
            return false; // Return false jika query gagal
        }
    }

    /**
     * Mengambil satu data siswa berdasarkan ID.
     * @param int $id ID siswa.
     * @return array
     */
    public function get_siswa_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    /**
     * Menyimpan data siswa baru ke database.
     * @param array $data Data siswa yang akan disimpan.
     * @return bool
     */
    public function insert_siswa($data)
    {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Memperbarui data siswa di database.
     * @param int $id ID siswa yang akan diperbarui.
     * @param array $data Data baru untuk siswa.
     * @return bool
     */
    public function update_siswa($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Menghapus data siswa dari database.
     * @param int $id ID siswa yang akan dihapus.
     * @return bool
     */
    public function delete_siswa($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    public function get_siswa_by_user_id($user_id)
    {
        // Asumsi di tabel 'siswa' ada kolom 'user_id' yang berelasi dengan tabel 'users'
        return $this->db->get_where('siswa', ['user_id' => $user_id])->row_array();
    }
}
