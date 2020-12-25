<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    public function index()
    {

        $data['title'] = 'Absensi';
        $data['data'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nis')])->row_array();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/templates/navAbsensi');
        $this->load->view('users/siswa/absensi');
        $this->load->view('users/templates/footer');
        $this->load->view('auto');
    }

    public function absen($id)
    {
        $nis = $this->session->userdata('nis');

        $queryabsen = "SELECT * FROM absen_siswa JOIN mengajar on mengajar.id_mengajar = absen_siswa.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas 
        WHERE id_absen=$id";

        $trabsensiswa = "SELECT * FROM tr_absen_siswa WHERE tr_absen_siswa.id_absen=$id and tr_absen_siswa.nis=$nis";

        $data['title'] = 'Absensi';
        $data['data'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['absen'] = $this->db->query($queryabsen)->row();
        $data['trabsen'] = $this->db->query($trabsensiswa)->row();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/absensi');
        $this->load->view('users/templates/footer');
    }

    public function simpanData($id)
    {
        $nis = $this->session->userdata('nis');
        $status = $this->input->post('status');

        if ($status == null) {
            echo "<script>alert('Pilih salah satu status absen');</script>";
            echo "<script>window.location='" . site_url('User/Siswa/Absensi/absen/' . $id) . "';</script>";
        } else {
            $data = [
                'id_absen' => $id,
                'nis' => $nis,
                'status' => $status
            ];

            $insert = $this->db->insert('tr_absen_siswa', $data);

            if ($insert) {
                echo "<script>alert('Data berhasil di simpan');</script>";
                echo "<script>window.location='" . site_url('User/Siswa/Absensi/absen/' . $id) . "';</script>";
            }
        }
    }

    public function inputData($id)
    {
        $nis = $this->session->userdata('nis');

        $queryabsen = "SELECT * FROM absen_siswa JOIN mengajar on mengajar.id_mengajar = absen_siswa.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas 
        WHERE id_absen=$id";

        $trabsensiswa = "SELECT * FROM tr_absen_siswa WHERE tr_absen_siswa.id_absen=$id and tr_absen_siswa.nis=$nis";

        $data['title'] = 'Absensi';
        $data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['absen'] = $this->db->query($queryabsen)->row();
        $data['trabsen'] = $this->db->query($trabsensiswa)->row();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/aksi_absensi');
        $this->load->view('users/templates/footer');
    }
}
