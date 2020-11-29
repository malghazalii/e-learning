<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelasAbsen extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_absen_siswa');
    //cek_login_admin();
  }
  public function index()
  {
    //sessiom
    $nip = $this->session->userdata('nip');
    //query mengajar
    $queryMengajar = "SELECT * FROM mengajar 
    JOIN guru ON guru.nip = mengajar.nip
    JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel
    JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
    JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
    WHERE mengajar.nip = $nip";
    // $queryAbsen = "SELECT * FROM `absen_siswa`";
    $queryAbsen = "SELECT * FROM `absen_siswa` 
    JOIN mengajar on mengajar.id_mengajar=absen_siswa.id_mengajar
    JOIN guru ON guru.nip=mengajar.nip
    JOIN mata_pelajaran ON mata_pelajaran.id_mapel=mengajar.id_mapel
    JOIN penjurusan on penjurusan.id_jurusan=mengajar.id_jurusan
    JOIN kelas ON kelas.id_kelas=penjurusan.id_kelas
    WHERE mengajar.nip = $nip";

    $data['title'] = 'Buat Absen';
    $data['mengajar'] = $this->db->query($queryMengajar)->result();
    $data['absen'] = $this->db->query($queryAbsen)->result();
    // $data['absen'] = $this->db->query($queryAbsen)->result();

    $this->load->view('users/templates/header', $data);
    $this->load->view('users/templates/navguru');
    $this->load->view('users/guru/kelasAbsen');
    $this->load->view('users/templates/footer');
  }
}
