<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login_siswa();
    }
    public function index()
    {
        $nis = $this->session->userdata('nis');

        $querysiswa = "SELECT * FROM siswa JOIN penjurusan on penjurusan.id_jurusan = siswa.id_jurusan 
        JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE siswa.nis=$nis";
        $siswa = $this->db->query($querysiswa)->row();

        $absen = "SELECT * FROM absen_siswa JOIN mengajar on mengajar.id_mengajar = absen_siswa.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas 
        WHERE mengajar.id_jurusan=$siswa->id_jurusan";

        $querytugas = "SELECT *, tugas_siswa.nama as NAMA, tugas_siswa.tanggal_berakhir as TANGGAL FROM tugas_siswa 
        JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas 
        WHERE mengajar.id_jurusan=$siswa->id_jurusan";

        $querykuis = "SELECT * FROM kuis JOIN mengajar on mengajar.id_mengajar = kuis.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas 
        WHERE mengajar.id_jurusan=$siswa->id_jurusan";

        $data['title'] = 'Event';
        $data['data'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['absen'] = $this->db->query($absen)->result();
        $data['tugas'] = $this->db->query($querytugas)->result();
        $data['kuis'] = $this->db->query($querykuis)->result();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/event');
        $this->load->view('users/templates/footer');
    }
}
