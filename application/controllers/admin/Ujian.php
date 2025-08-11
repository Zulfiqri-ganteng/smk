<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php';

class Ujian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_Ujian');
        $this->load->model('M_Kelas');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['judul'] = 'Manajemen Ujian Online';
        $data['ujian'] = $this->M_Ujian->get_all_ujian_admin();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_ujian_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Ujian Baru';
        
        $this->load->model('M_Mapel');
        $data['mapel_list'] = $this->M_Mapel->get_all_mapel();
        $data['kelas_list'] = $this->M_Kelas->get_all_kelas();
        $this->form_validation->set_rules('judul_ujian', 'Judul Ujian', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_ujian_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $data_insert = [
                'judul_ujian' => $this->input->post('judul_ujian'),
                'mapel' => $this->input->post('mapel'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_selesai' => $this->input->post('tanggal_selesai'),
                'waktu_menit' => $this->input->post('waktu_menit'),
                'kelas_id' => $this->input->post('kelas_id'),
                'guru_id' => 1 // Asumsi admin sebagai guru default
            ];
            $this->M_Ujian->insert_ujian($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Ujian baru berhasil ditambahkan!</div>');
            redirect('admin/ujian');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Ujian';
        $this->load->model('M_Mapel');
        $data['mapel_list'] = $this->M_Mapel->get_all_mapel();
        $data['ujian'] = $this->M_Ujian->get_ujian_by_id($id);
        $this->load->model('M_Kelas');
        $data['kelas_list'] = $this->M_Kelas->get_all_kelas();

        $this->load->model('M_Mapel'); // Muat model mapel
        $data['mapel_list'] = $this->M_Mapel->get_all_mapel(); // Ambil daftar mapel

        $this->load->view('templates/header_admin', $data);

        $this->form_validation->set_rules('judul_ujian', 'Judul Ujian', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_ujian_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $data_update = [
                'judul_ujian' => $this->input->post('judul_ujian'),
                'mapel' => $this->input->post('mapel'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_selesai' => $this->input->post('tanggal_selesai'),
                'waktu_menit' => $this->input->post('waktu_menit'),
                'kelas_id' => $this->input->post('kelas_id'),
            ];
            $this->M_Ujian->update_ujian($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data ujian berhasil diperbarui!</div>');
            redirect('admin/ujian');
        }
    }

    public function hapus($id)
    {
        $this->M_Ujian->delete_ujian($id);
        $this->M_Ujian->delete_soal_by_ujian_id($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data ujian dan semua soalnya berhasil dihapus!</div>');
        redirect('admin/ujian');
    }

    public function kelola_soal($id_ujian)
    {
        $data['judul'] = 'Kelola Soal Ujian';
        $data['ujian'] = $this->M_Ujian->get_ujian_by_id($id_ujian);
        $data['soal'] = $this->M_Ujian->get_soal_by_ujian_id($id_ujian, false);

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_soal_list', $data);
        $this->load->view('templates/footer_admin');
    }

    // Ganti fungsi tambah_soal() di file application/controllers/admin/Ujian.php
    // dengan kode di bawah ini.

    public function tambah_soal($id_ujian)
    {
        $data['judul'] = 'Tambah Soal Baru';
        $data['id_ujian'] = $id_ujian;
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_soal_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $nama_gambar = null;
            if (!empty($_FILES['gambar_soal']['name'])) {
                if ($this->_do_upload()) {
                    $nama_gambar = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
                    redirect('admin/ujian/tambah_soal/' . $id_ujian);
                    return;
                }
            }
            $data_insert = [
                'ujian_id'      => $id_ujian,
                'pertanyaan'    => $this->input->post('pertanyaan'),
                'opsi_a'        => $this->input->post('opsi_a'),
                'opsi_b'        => $this->input->post('opsi_b'),
                'opsi_c'        => $this->input->post('opsi_c'),
                'opsi_d'        => $this->input->post('opsi_d'),
                'opsi_e'        => $this->input->post('opsi_e'),
                'jawaban_benar' => $this->input->post('jawaban_benar'),
                'gambar_soal'   => $nama_gambar
            ];
            $this->M_Ujian->insert_soal($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Soal baru berhasil ditambahkan!</div>');
            redirect('admin/ujian/kelola_soal/' . $id_ujian);
        }
    }
    public function simpan_soal()
    {
        $id_ujian = $this->input->post('ujian_id');
        $nama_gambar = null; // Default nama gambar adalah null

        // Cek apakah ada file gambar yang diupload
        if (!empty($_FILES['gambar_soal']['name'])) {
            // Konfigurasi untuk upload gambar soal
            $config['upload_path']   = './assets/images/soal/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size']      = 2048; // 2MB
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_soal')) {
                // Jika upload berhasil, ambil nama filenya
                $upload_data = $this->upload->data();
                $nama_gambar = $upload_data['file_name'];
            } else {
                // Jika upload gagal, tampilkan error dan batalkan penyimpanan
                $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
                redirect('admin/ujian/tambah_soal/' . $id_ujian);
                return; // Hentikan eksekusi
            }
        }

        // Siapkan data untuk dimasukkan ke database
        $data = [
            'ujian_id'      => $id_ujian,
            'pertanyaan'    => $this->input->post('pertanyaan'),
            'gambar_soal'   => $nama_gambar, // Masukkan nama gambar (atau null jika tidak ada)
            'opsi_a'        => $this->input->post('opsi_a'),
            'opsi_b'        => $this->input->post('opsi_b'),
            'opsi_c'        => $this->input->post('opsi_c'),
            'opsi_d'        => $this->input->post('opsi_d'),
            'opsi_e'        => $this->input->post('opsi_e'),
            'jawaban_benar' => $this->input->post('jawaban_benar')
        ];

        $this->M_Ujian->insert_soal($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Soal berhasil ditambahkan!</div>');
        redirect('admin/ujian/kelola_soal/' . $id_ujian);
    }

    public function edit_soal($id_soal)
    {
        $data['judul'] = 'Edit Soal';
        $data['soal'] = $this->M_Ujian->get_soal_by_id($id_soal);
        $data['id_ujian'] = $data['soal']['ujian_id'];
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_soal_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $nama_gambar = $data['soal']['gambar_soal'];
            if (!empty($_FILES['gambar_soal']['name'])) {
                if ($this->_do_upload()) {
                    if ($nama_gambar) {
                        @unlink(FCPATH . 'assets/images/soal/' . $nama_gambar);
                    }
                    $nama_gambar = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
                    redirect('admin/ujian/edit_soal/' . $id_soal);
                    return;
                }
            }
            $data_update = [
                'pertanyaan'    => $this->input->post('pertanyaan'),
                'opsi_a'        => $this->input->post('opsi_a'),
                'opsi_b'        => $this->input->post('opsi_b'),
                'opsi_c'        => $this->input->post('opsi_c'),
                'opsi_d'        => $this->input->post('opsi_d'),
                'opsi_e'        => $this->input->post('opsi_e'),
                'jawaban_benar' => $this->input->post('jawaban_benar'),
                'gambar_soal'   => $nama_gambar,
            ];
            $this->M_Ujian->update_soal($id_soal, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Soal berhasil diperbarui!</div>');
            redirect('admin/ujian/kelola_soal/' . $data['soal']['ujian_id']);
        }
    }
    //fungsi update soal
    public function update_soal()
    {
        $id_soal = $this->input->post('id_soal');
        $id_ujian = $this->input->post('ujian_id');

        // Mengambil nama gambar lama dari database
        $soal_lama = $this->M_Ujian->get_soal_by_id($id_soal);
        $nama_gambar = $soal_lama['gambar_soal'];

        // Cek jika ada gambar baru yang diupload
        if (!empty($_FILES['gambar_soal']['name'])) {
            $config['upload_path']   = './assets/images/soal/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size']      = 2048; // 2MB
            $config['encrypt_name']  = TRUE;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_soal')) {
                // Hapus gambar lama jika ada
                if ($nama_gambar) {
                    unlink(FCPATH . 'assets/images/soal/' . $nama_gambar);
                }
                // Ambil nama gambar baru
                $nama_gambar = $this->upload->data('file_name');
            } else {
                // Jika upload gagal, kembali dengan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
                redirect('admin/ujian/edit_soal/' . $id_soal);
                return;
            }
        }

        $data_update = [
            'pertanyaan'    => $this->input->post('pertanyaan'),
            'gambar_soal'   => $nama_gambar,
            'opsi_a'        => $this->input->post('opsi_a'),
            'opsi_b'        => $this->input->post('opsi_b'),
            'opsi_c'        => $this->input->post('opsi_c'),
            'opsi_d'        => $this->input->post('opsi_d'),
            'opsi_e'        => $this->input->post('opsi_e'),
            'jawaban_benar' => $this->input->post('jawaban_benar'),
        ];

        $this->M_Ujian->update_soal($id_soal, $data_update);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Soal berhasil diperbarui!</div>');
        redirect('admin/ujian/kelola_soal/' . $id_ujian);
    }

    public function hapus_soal($id_soal, $id_ujian)
    {
        // Ambil data soal untuk mendapatkan nama file gambar
        $soal = $this->M_Ujian->get_soal_by_id($id_soal);
        if ($soal && $soal['gambar_soal']) {
            // Hapus file gambar dari folder
            $file_path = FCPATH . 'assets/images/soal/' . $soal['gambar_soal'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        // Hapus data soal dari database
        $this->M_Ujian->delete_soal($id_soal);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Soal berhasil dihapus!</div>');
        redirect('admin/ujian/kelola_soal/' . $id_ujian);
    }

    public function hasil_ujian($id_ujian)
    {
        $data['judul'] = 'Laporan Hasil Ujian';
        $data['ujian'] = $this->M_Ujian->get_ujian_by_id($id_ujian);
        $data['hasil'] = $this->M_Ujian->get_hasil_ujian_lengkap($id_ujian);

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_ujian_hasil_list', $data);
        $this->load->view('templates/footer_admin');
    }
    public function import_soal($id_ujian)
    {
        // Buat folder 'uploads/csv/' di root folder proyek Anda
        $config['upload_path'] = './uploads/csv/';
        $config['allowed_types'] = 'csv';
        $config['file_name'] = 'soal_' . time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_csv')) {
            $file_data = $this->upload->data();
            $file_path = './uploads/csv/' . $file_data['file_name'];

            // Baca file CSV
            $csv_file = fopen($file_path, 'r');

            // Lewati baris header
            fgetcsv($csv_file);

            // Loop untuk membaca setiap baris data
            while (($row = fgetcsv($csv_file)) !== FALSE) {
                $data_insert = [
                    'ujian_id' => $id_ujian,
                    'pertanyaan' => $row[0],
                    'opsi_a' => $row[1],
                    'opsi_b' => $row[2],
                    'opsi_c' => $row[3],
                    'opsi_d' => $row[4],
                    'opsi_e' => $row[5],
                    'jawaban_benar' => $row[6],
                ];
                $this->M_Ujian->insert_soal($data_insert);
            }

            fclose($csv_file);
            unlink($file_path); // Hapus file setelah diproses

            $this->session->set_flashdata('message', '<div class="alert alert-success">Soal berhasil diimpor!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
        }

        redirect('admin/ujian/kelola_soal/' . $id_ujian);
    }
    //kode ini berfungsi untuk imprt word versi lebih pintar
    public function import_word($id_ujian)
    {
        $config['upload_path']   = './uploads/word/';
        $config['allowed_types'] = 'docx';
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_word')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
            redirect('admin/ujian/kelola_soal/' . $id_ujian);
            return;
        }

        $file_data = $this->upload->data();
        $file_path = FCPATH . 'uploads/word/' . $file_data['file_name'];

        try {
            $phpWord = \PhpOffice\PhpWord\IOFactory::load($file_path);
            $questions = [];
            $all_text_elements = [];

            // 1. Kumpulkan semua baris teks dari dokumen ke dalam sebuah array
            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    if (method_exists($element, 'getText')) {
                        $text = trim($element->getText());
                        if (!empty($text)) {
                            $all_text_elements[] = $text;
                        }
                    }
                }
            }

            $soal_block = [];
            // 2. Loop melalui setiap baris teks yang sudah terkumpul
            foreach ($all_text_elements as $text) {
                // 3. Cek jika baris ini adalah Kunci Jawaban, ini adalah AKHIR dari satu soal
                if (preg_match('/^(?:Kunci\s*)?Jawaban\s*:?\s*([A-E])/i', $text, $matches)) {
                    // Jika ada blok soal yang terkumpul sebelumnya, proses blok tersebut
                    if (count($soal_block) >= 6) { // Minimal ada 1 pertanyaan + 5 opsi
                        $jawaban_benar = strtoupper($matches[1]);

                        // Baris pertama adalah pertanyaan (hapus nomor di depannya)
                        $pertanyaan = preg_replace('/^(\d+)[\.\)]\s*/', '', $soal_block[0]);

                        // 5 baris berikutnya adalah opsi (hapus huruf di depannya)
                        $opsi_a = preg_replace('/^[a-zA-Z][\.\)]\s*/', '', $soal_block[1]);
                        $opsi_b = preg_replace('/^[a-zA-Z][\.\)]\s*/', '', $soal_block[2]);
                        $opsi_c = preg_replace('/^[a-zA-Z][\.\)]\s*/', '', $soal_block[3]);
                        $opsi_d = preg_replace('/^[a-zA-Z][\.\)]\s*/', '', $soal_block[4]);
                        $opsi_e = preg_replace('/^[a-zA-Z][\.\)]\s*/', '', $soal_block[5]);

                        $questions[] = [
                            'ujian_id'      => $id_ujian,
                            'pertanyaan'    => $pertanyaan,
                            'opsi_a'        => $opsi_a,
                            'opsi_b'        => $opsi_b,
                            'opsi_c'        => $opsi_c,
                            'opsi_d'        => $opsi_d,
                            'opsi_e'        => $opsi_e,
                            'jawaban_benar' => $jawaban_benar,
                        ];
                    }
                    // Reset blok untuk soal berikutnya
                    $soal_block = [];
                } else {
                    // 4. Jika bukan baris jawaban, kumpulkan baris ini sebagai bagian dari soal
                    $soal_block[] = $text;
                }
            }

            if (!empty($questions)) {
                $this->db->insert_batch('soal_ujian', $questions);
            }

            unlink($file_path);
            $this->session->set_flashdata('message', '<div class="alert alert-success">' . count($questions) . ' soal berhasil diimpor!</div>');
        } catch (Exception $e) {
            if (file_exists($file_path)) unlink($file_path);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal membaca file. Error: ' . $e->getMessage() . '</div>');
        }
        redirect('admin/ujian/kelola_soal/' . $id_ujian);
    }
    // TAMBAHKAN FUNGSI BARU INI
    public function upload_gambar_tinymce()
    {
        $config['upload_path']   = './assets/images/soal_konten/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size']      = 2048; // 2MB
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            // Jika upload gagal, kirim pesan error dalam format JSON
            $this->output->set_status_header(400);
            echo json_encode(['error' => $this->upload->display_errors('', '')]);
        } else {
            // Jika upload berhasil, kirim lokasi file dalam format JSON
            $data = $this->upload->data();
            $location = base_url('assets/images/soal_konten/' . $data['file_name']);
            echo json_encode(['location' => $location]);
        }
    }
    // FUNGSI BANTU UNTUK UPLOAD GAMBAR SOAL
    private function _do_upload()
    {
        $config['upload_path']   = './assets/images/soal/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;
        $this->upload->initialize($config);
        return $this->upload->do_upload('gambar_soal');
    }
    public function set_status($id_ujian, $status)
    {
        $this->M_Ujian->update_ujian($id_ujian, ['status' => $status]);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Status ujian berhasil diubah!</div>');
        redirect('admin/ujian');
    }
}
