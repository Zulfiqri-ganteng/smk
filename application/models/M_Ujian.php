<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ujian extends CI_Model {
    
    // ======== FUNGSI UNTUK UJIAN ========
    public function get_all_ujian_admin() {
        $this->db->select('ujian_online.*, guru.nama_guru');
        $this->db->from('ujian_online');
        $this->db->join('guru', 'guru.id = ujian_online.guru_id', 'left');
        $this->db->order_by('tanggal_mulai', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_ujian_by_id($id) {
        return $this->db->get_where('ujian_online', ['id' => $id])->row_array();
    }

    public function insert_ujian($data) {
        return $this->db->insert('ujian_online', $data);
    }
    
    // ======== FUNGSI UNTUK SOAL ========
    public function get_soal_by_ujian_id($id_ujian, $acak = true) {
        $this->db->where('ujian_id', $id_ujian);
        if ($acak) {
            $this->db->order_by('id', 'RANDOM'); 
        } else {
            $this->db->order_by('id', 'ASC');
        }
        return $this->db->get('soal_ujian')->result_array();
    }

    public function get_soal_by_id($id_soal) {
        return $this->db->get_where('soal_ujian', ['id' => $id_soal])->row_array();
    }

    public function insert_soal($data) {
        return $this->db->insert('soal_ujian', $data);
    }

    public function update_soal($id_soal, $data) {
        return $this->db->update('soal_ujian', $data, ['id' => $id_soal]);
    }

    public function delete_soal($id_soal) {
        return $this->db->delete('soal_ujian', ['id' => $id_soal]);
    }

    // ... (Fungsi untuk sisi siswa bisa diletakkan di bawah sini) ...

    /**
     * Mengambil daftar ujian yang sedang aktif berdasarkan tanggal.
     */
    public function get_ujian_aktif() {
        $today = date('Y-m-d H:i:s');
        $this->db->where('tanggal_mulai <=', $today);
        $this->db->where('tanggal_selesai >=', $today);
        return $this->db->get('ujian_online')->result_array();
    }

    /**
     * Memeriksa apakah siswa sudah pernah mengerjakan ujian tertentu.
     */
    public function cek_sudah_mengerjakan($id_ujian, $id_siswa) {
        $this->db->where('ujian_id', $id_ujian);
        $this->db->where('siswa_id', $id_siswa);
        return $this->db->get('jawaban_siswa')->num_rows() > 0;
    }

    /**
     * Mengambil kunci jawaban dari sebuah ujian.
     */
    public function get_kunci_jawaban($id_ujian) {
        $this->db->select('id, jawaban_benar');
        $this->db->where('ujian_id', $id_ujian);
        return $this->db->get('soal_ujian')->result_array();
    }

    /**
     * Menyimpan hasil ujian siswa ke database.
     */
    public function insert_hasil_ujian($data) {
        return $this->db->insert('jawaban_siswa', $data);
    }

    // ... (setelah fungsi insert_ujian()) ...

public function update_ujian($id, $data) {
    return $this->db->update('ujian_online', $data, ['id' => $id]);
}

public function delete_ujian($id) {
    return $this->db->delete('ujian_online', ['id' => $id]);
}

public function delete_soal_by_ujian_id($id_ujian) {
    return $this->db->delete('soal_ujian', ['ujian_id' => $id_ujian]);
}
    
    /**
     * Mengambil hasil ujian spesifik dari seorang siswa.
     */
    public function get_hasil_ujian($id_ujian, $id_siswa) {
        $this->db->where('ujian_id', $id_ujian);
        $this->db->where('siswa_id', $id_siswa);
        return $this->db->get('jawaban_siswa')->row_array();
    }

    public function get_hasil_ujian_lengkap($id_ujian) {
    $this->db->select('jawaban_siswa.*, users.nama_lengkap, siswa.kelas');
    $this->db->from('jawaban_siswa');
    $this->db->join('users', 'users.id = jawaban_siswa.siswa_id');
    $this->db->join('siswa', 'siswa.nis = users.username'); // Asumsi username siswa = NIS
    $this->db->where('jawaban_siswa.ujian_id', $id_ujian);
    $this->db->order_by('nilai', 'DESC');
    return $this->db->get()->result_array();
}

}