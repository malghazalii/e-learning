<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    //cek_login_siswa();
  }
  public function index()
  {
    $nis = $this->session->userdata('nis');

    $siswa = "SELECT * FROM siswa JOIN penjurusan on penjurusan.id_jurusan = siswa.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE siswa.nis=$nis";

    $s = $this->db->query($siswa)->row();

    $querytugas = "SELECT *, tugas_siswa.nama as NAMA FROM tugas_siswa JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar 
    JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE NOT EXISTS
    (SELECT * FROM jawaban_tugas WHERE tugas_siswa.id_tugas=jawaban_tugas.id_tugas and jawaban_tugas.nis=$nis) ";


    $tugastelat = "SELECT *, tugas_siswa.nama as NAMA FROM jawaban_tugas JOIN tugas_siswa on tugas_siswa.id_tugas = jawaban_tugas.id_tugas JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar 
    JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE jawaban_tugas.nis = $nis and jawaban_tugas.status = 3";

    $querymapel = "SELECT * FROM mengajar JOIN guru on guru.nip = mengajar.nip 
    JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan 
    JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_jurusan = $nis";

    $querykuis = "SELECT * FROM kuis JOIN mengajar on mengajar.id_mengajar = kuis.id_mengajar 
    JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_jurusan = $s->id_jurusan";

    $queryabsen = "SELECT * FROM absen_siswa 
    JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar
    JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan
    JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
    JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel
    WHERE NOT EXISTS
    (SELECT * FROM tr_absen_siswa WHERE absen_siswa.id_absen = tr_absen_siswa.id_absen AND tr_absen_siswa.nis = $nis)
    AND penjurusan.id_jurusan = $s->id_jurusan";

    $data['title'] = 'Dashboard';
    $data['data'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nis')])->row_array();
    $data['siswa'] = $this->db->query($siswa)->row();
    $data['absensi'] = $this->db->query($queryabsen)->result();
    $data['absen'] = $this->db->query($queryabsen)->row();
    $data['mapel'] = $this->db->query($querymapel)->result();
    $data['tugastelat'] = $this->db->query($tugastelat)->result();
    $data['tugas'] = $this->db->query($querytugas)->result();
    $data['tugass'] = $this->db->query($querytugas)->row();
    $data['kuis'] = $this->db->query($querykuis)->result();
    $data['kuiss'] = $this->db->query($querykuis)->row();
    $this->load->view('users/templates/header', $data);
    $this->load->view('users/templates/navsiswa');
    $this->load->view('users/siswa/dashboard');
    $this->load->view('users/templates/footer');
    $this->load->view('auto');
  }
}
