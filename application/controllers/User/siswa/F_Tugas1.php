<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_Tugas1 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login_siswa();
    }
    public function index()
    {
        $data['title'] = 'Foem Tugas';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/f_tugas1');
        $this->load->view('users/templates/footer');
        $this->load->view('auto');
    }

    public function tugas($id)
    {
        $nis = $this->session->userdata('nis');

        $querytugas = "SELECT *, tugas_siswa.nama as NAMA, tugas_siswa.tanggal_berakhir as TANGGAL FROM tugas_siswa JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE tugas_siswa.id_tugas = $id";

        $jawabantugas = "SELECT *, jawaban_tugas.file as FILEsiswa FROM jawaban_tugas JOIN tugas_siswa on tugas_siswa.id_tugas = jawaban_tugas.id_tugas 
        JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas 
        JOIN siswa on siswa.nis = jawaban_tugas.nis WHERE jawaban_tugas.nis=$nis and jawaban_tugas.id_tugas=$id";

        $data['title'] = 'Foem Tugas';
        $data['data'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['tugas'] = $this->db->query($querytugas)->row();
        $data['jawaban'] = $this->db->query($jawabantugas)->row();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/f_tugas1');
        $this->load->view('users/templates/footer');
    }

    public function tugas1($id)
    {
        $nis = $this->session->userdata('nis');

        $querytugas = "SELECT *, tugas_siswa.nama as NAMA, tugas_siswa.tanggal_berakhir as TANGGAL FROM tugas_siswa JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE tugas_siswa.id_tugas = $id";

        $jawabantugas = "SELECT * FROM jawaban_tugas JOIN tugas_siswa on tugas_siswa.id_tugas = jawaban_tugas.id_tugas 
        JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas 
        JOIN siswa on siswa.nis = jawaban_tugas.nis WHERE jawaban_tugas.nis=$nis and jawaban_tugas.id_tugas=$id";

        $data['title'] = 'Foem Tugas';
        $data['data'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['tugas'] = $this->db->query($querytugas)->row();
        $data['jawaban'] = $this->db->query($jawabantugas)->row();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/f_tugas2');
        $this->load->view('users/templates/footer');
    }

    public function indexid($id)
    {
        force_download('assets/users/upload/' . $id, NULL);
    }

    public function tambahdata($id)
    {
        $nis = $this->session->userdata('nis');

        $text = $this->input->post('text');
        $file = $_FILES['file_input']['name'];

        $config['upload_path']        =    './assets/users/upload';
        $config['allowed_types']    =    'pdf|docx|pptx|jpg|jpeg|png';
        $config['max_size']            =    10048;

        $this->load->library('upload', $config);

        if (@$_FILES['file_input']['name'] == null && $text == null) {
            echo "<script>alert('Isi salah satu form');</script>";
            echo "<script>window.location='" . site_url('User/Siswa/F_Tugas1/tugas1/' . $id) . "';</script>";
        } else {
            if (@$_FILES['file_input']['name'] != null) {
                if ($this->upload->do_upload('file_input')) {
                    $data = array(
                        'id_tugas' => $id,
                        'nis' => $nis,
                        'file' => $file,
                        'tgl_kirim' => date('Y-m-d H:i:s'),
                        'status' => 1
                    );

                    $this->db->insert('jawaban_tugas', $data);

                    if ($this->db->affected_rows() > 0) {
                        echo "<script>alert('Data berhasil di simpan');</script>";
                        echo "<script>window.location='" . site_url('User/Siswa/F_tugas1/tugas/' . $id) . "';</script>";
                    }
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    echo "<script>alert('Format file salah');</script>";
                    echo "<script>window.location='" . site_url('User/Siswa/F_Tugas1/tugas1/' . $id) . "';</script>";
                }
            } else {
                $data = array(
                    'id_tugas' => $id,
                    'nis' => $nis,
                    'text' => $text,
                    'tgl_kirim' => date('Y-m-d H:i:s'),
                    'status' => 1
                );

                $this->db->insert('jawaban_tugas', $data);

                if ($this->db->affected_rows() > 0) {
                    echo "<script>alert('Data berhasil di simpan');</script>";
                    echo "<script>window.location='" . site_url('User/Siswa/F_tugas1/tugas/' . $id) . "';</script>";
                }
                echo "<script>window.location='" . site_url('User/Siswa/F_tugas1/tugas/' . $id) . "';</script>";
            }
        }
    }

    public function editdata($id)
    {
        $nis = $this->session->userdata('nis');

        $text = $this->input->post('text');
        $idjawaban3 = $this->input->post('idjawaban3');
        $status3 = $this->input->post('status3');
        $file = $_FILES['file_input']['name'];

        $config['upload_path']        =    './assets/users/upload';
        $config['allowed_types']    =    'pdf|docx|pptx|jpg|jpeg|png';
        $config['max_size']            =    10048;

        $this->load->library('upload', $config);

        if (@$_FILES['file_input']['name'] == null && $text == null) {
            echo "<script>alert('Isi salah satu form');</script>";
            echo "<script>window.location='" . site_url('User/Siswa/F_Tugas1/tugas1/' . $id) . "';</script>";
        } else {
            if ($status3 == 3) {
                if (@$_FILES['file_input']['name'] != null) {
                    if ($this->upload->do_upload('file_input')) {
                        $data = array(
                            'id_tugas' => $id,
                            'nis' => $nis,
                            'file' => $file,
                            'tgl_kirim' => date('Y-m-d H:i:s'),
                            'status' => 2
                        );

                        $this->db->where('id_jawaban', $idjawaban3)->update('jawaban_tugas', $data);

                        if ($this->db->affected_rows() > 0) {
                            echo "<script>alert('Data berhasil di simpan');</script>";
                            echo "<script>window.location='" . site_url('User/Siswa/F_tugas1/tugas/' . $id) . "';</script>";
                        }
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                        echo "<script>alert('Format file salah');</script>";
                        echo "<script>window.location='" . site_url('User/Siswa/F_Tugas1/tugas1/' . $id) . "';</script>";
                    }
                } else {
                    $data = array(
                        'id_tugas' => $id,
                        'nis' => $nis,
                        'text' => $text,
                        'tgl_kirim' => date('Y-m-d H:i:s'),
                        'status' => 2
                    );

                    $this->db->where('id_jawaban', $idjawaban3)->update('jawaban_tugas', $data);

                    if ($this->db->affected_rows() > 0) {
                        echo "<script>alert('Data berhasil di simpan');</script>";
                        echo "<script>window.location='" . site_url('User/Siswa/F_tugas1/tugas/' . $id) . "';</script>";
                    }
                    echo "<script>window.location='" . site_url('User/Siswa/F_tugas1/tugas/' . $id) . "';</script>";
                }
            }

            if ($status3 == 2) {
                if (@$_FILES['file_input']['name'] != null) {
                    if ($this->upload->do_upload('file_input')) {
                        $data = array(
                            'id_tugas' => $id,
                            'nis' => $nis,
                            'file' => $file,
                            'tgl_kirim' => date('Y-m-d H:i:s'),
                            'status' => 2
                        );

                        $this->db->where('id_jawaban', $idjawaban3)->update('jawaban_tugas', $data);

                        if ($this->db->affected_rows() > 0) {
                            echo "<script>alert('Data berhasil di simpan');</script>";
                            echo "<script>window.location='" . site_url('User/Siswa/F_tugas1/tugas/' . $id) . "';</script>";
                        }
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                        echo "<script>alert('Format file salah');</script>";
                        echo "<script>window.location='" . site_url('User/Siswa/F_Tugas1/tugas1/' . $id) . "';</script>";
                    }
                } else {
                    $data = array(
                        'id_tugas' => $id,
                        'nis' => $nis,
                        'text' => $text,
                        'tgl_kirim' => date('Y-m-d H:i:s'),
                        'status' => 2
                    );

                    $this->db->where('id_jawaban', $idjawaban3)->update('jawaban_tugas', $data);

                    if ($this->db->affected_rows() > 0) {
                        echo "<script>alert('Data berhasil di simpan');</script>";
                        echo "<script>window.location='" . site_url('User/Siswa/F_tugas1/tugas/' . $id) . "';</script>";
                    }
                    echo "<script>window.location='" . site_url('User/Siswa/F_tugas1/tugas/' . $id) . "';</script>";
                }
            }

            if ($status3 == 1) {
                if (@$_FILES['file_input']['name'] != null) {
                    if ($this->upload->do_upload('file_input')) {
                        $data = array(
                            'id_tugas' => $id,
                            'nis' => $nis,
                            'file' => $file,
                            'tgl_kirim' => date('Y-m-d H:i:s'),
                            'status' => 1
                        );

                        $this->db->where('id_jawaban', $idjawaban3)->update('jawaban_tugas', $data);

                        if ($this->db->affected_rows() > 0) {
                            echo "<script>alert('Data berhasil di simpan');</script>";
                            echo "<script>window.location='" . site_url('User/Siswa/F_tugas1/tugas/' . $id) . "';</script>";
                        }
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                        echo "<script>alert('Format file salah');</script>";
                        echo "<script>window.location='" . site_url('User/Siswa/F_Tugas1/tugas1/' . $id) . "';</script>";
                    }
                } else {
                    $data = array(
                        'id_tugas' => $id,
                        'nis' => $nis,
                        'text' => $text,
                        'tgl_kirim' => date('Y-m-d H:i:s'),
                        'status' => 1
                    );

                    $this->db->where('id_jawaban', $idjawaban3)->update('jawaban_tugas', $data);

                    if ($this->db->affected_rows() > 0) {
                        echo "<script>alert('Data berhasil di simpan');</script>";
                        echo "<script>window.location='" . site_url('User/Siswa/F_tugas1/tugas/' . $id) . "';</script>";
                    }
                    echo "<script>window.location='" . site_url('User/Siswa/F_tugas1/tugas/' . $id) . "';</script>";
                }
            }
        }
    }
}
