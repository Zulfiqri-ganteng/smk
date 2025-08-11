<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Tugas extends CI_Model
{

    // =======================================================
    // FUNGSI UNTUK PANEL ADMIN
    // =======================================================

    /**
     * Mengambil semua tugas yang pernah dibuat untuk ditampilkan di list admin.
     */
    public function get_all_tugas()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('tugas_harian')->result_array();
    }


    /**
     * Menyimpan data tugas baru ke database.
     */
    public function insert_tugas($data)
    {
        return $this->db->insert('tugas_harian', $data);
    }



    /**
     * Menghapus data tugas dari database.
     */
    public function delete_tugas($id)
    {
        return $this->db->delete('tugas_harian', ['id' => $id]);
    }

    /**
     * Mengambil semua data jawaban siswa untuk satu tugas spesifik (untuk halaman penilaian).
     */
    public function get_jawaban_by_tugas_id($tugas_id)
    {
        $this->db->select('tj.*, u.nama_lengkap, s.kelas');
        $this->db->from('tugas_jawaban as tj');
        $this->db->join('users as u', 'u.id = tj.siswa_id');
        $this->db->join('siswa as s', 's.user_id = u.id');
        $this->db->where('tj.tugas_id', $tugas_id);
        return $this->db->get()->result_array();
    }

    /**
     * Memperbarui data jawaban siswa (untuk menyimpan nilai dan komentar).
     */
    public function update_jawaban($id_jawaban, $data)
    {
        return $this->db->update('tugas_jawaban', $data, ['id' => $id_jawaban]);
    }


    // =======================================================
    // FUNGSI UNTUK PANEL SISWA
    // =======================================================

    /**
     * Mengambil daftar tugas untuk kelas siswa, lengkap dengan status pengerjaannya.
     */
    public function get_tugas_by_kelas_with_status($kelas, $siswa_id)
    {
        $this->db->select('t.*, j.status as status_pengerjaan');
        $this->db->from('tugas_harian as t');
        $this->db->join('tugas_jawaban as j', "t.id = j.tugas_id AND j.siswa_id = $siswa_id", 'left');
        $this->db->where('t.kelas_tujuan', $kelas);
        $this->db->order_by('t.id', 'DESC');
        return $this->db->get()->result_array();
    }

    /**
     * Mengambil data jawaban yang sudah dikumpulkan oleh siswa tertentu untuk tugas tertentu.
     */
    public function get_jawaban_by_tugas_dan_siswa($tugas_id, $siswa_id)
    {
        return $this->db->get_where('tugas_jawaban', ['tugas_id' => $tugas_id, 'siswa_id' => $siswa_id])->row_array();
    }

    /**
     * Menyimpan file jawaban yang diunggah oleh siswa.
     */
    public function insert_jawaban($data)
    {
        return $this->db->insert('tugas_jawaban', $data);
    }
    public function get_tugas_by_id($id)
    {
        return $this->db->get_where('tugas_harian', ['id' => $id])->row_array();
    }

    public function update_tugas($id, $data)
    {
        return $this->db->update('tugas_harian', $data, ['id' => $id]);
    }
}
