<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_datasiswa');
    $this->load->model('Guru/m_absensi');
    $this->load->helper(array('url', 'download'));
    //cek_login_guru();
  }
  public function index()
  {
    $nip = $this->session->userdata('nip');

    $querytugas = "SELECT *, tugas_siswa.nama as NAMA, tugas_siswa.tanggal_berakhir as TANGGAL FROM tugas_siswa JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar 
    JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.nip = $nip ORDER BY tugas_siswa.id_tugas DESC";

    $querymapel = "SELECT * FROM mengajar JOIN guru on guru.nip = mengajar.nip 
    JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan 
    JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.nip=$nip";

    $queryabsen = "SELECT * FROM absen_siswa JOIN mengajar on mengajar.id_mengajar = absen_siswa.id_mengajar JOIN guru on guru.nip = mengajar.nip 
    JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan 
    JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.nip=$nip ORDER BY absen_siswa.id_absen DESC";

    $querykuis = "SELECT * FROM kuis JOIN mengajar on mengajar.id_mengajar = kuis.id_mengajar 
    JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.nip=$nip ORDER BY kuis.id_kuis DESC";

    $data['title'] = "Dashboard";
    $data['tugas'] = $this->db->query($querytugas)->result();
    $data['absen'] = $this->db->query($queryabsen)->result();
    $data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['mapel'] = $this->db->query($querymapel)->result();
    $data['kuis'] = $this->db->query($querykuis)->result();
    $this->load->view('users/templates/header', $data);
    $this->load->view('users/templates/navguru', $data);
    $this->load->view('users/guru/dashboard', $data);
    $this->load->view('users/templates/footer');
  }

  public function indexid($id)
  {
    force_download('assets/users/upload/' . $id, NULL);
  }

  public function mapel($id)
  {
    $nip = $this->session->userdata('nip');

    $querytugas = "SELECT *, tugas_siswa.nama as NAMA, tugas_siswa.tanggal_berakhir as TANGGAL FROM tugas_siswa JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar 
    JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.nip = $nip AND mata_pelajaran.id_mapel=$id ORDER BY tugas_siswa.id_tugas DESC";

    $querymapel = "SELECT * FROM mengajar JOIN guru on guru.nip = mengajar.nip 
    JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan 
    JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.nip=$nip";


    $querykuis = "SELECT * FROM kuis JOIN mengajar on mengajar.id_mengajar = kuis.id_mengajar 
    JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.nip=$nip AND mata_pelajaran.id_mapel=$id ORDER BY kuis.id_kuis DESC";

    $data['title'] = "Dashboard";
    $data['tugas'] = $this->db->query($querytugas)->result();
    $data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['mapel'] = $this->db->query($querymapel)->result();
    $data['kuis'] = $this->db->query($querykuis)->result();
    $this->load->view('users/templates/header', $data);
    $this->load->view('users/templates/navguru', $data);
    $this->load->view('users/guru/dashboard_id', $data);
    $this->load->view('users/templates/footer');
  }

  public function historitugas()
  {
    $nip = $this->session->userdata('nip');

    $querytugas = "SELECT *, tugas_siswa.nama as NAMA, tugas_siswa.tanggal_berakhir as TANGGAL FROM tugas_siswa JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar 
    JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.nip = $nip ORDER BY tugas_siswa.id_tugas DESC";

    $querymapel = "SELECT * FROM mengajar JOIN guru on guru.nip = mengajar.nip 
    JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan 
    JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.nip=$nip";

    $data['title'] = "Dashboard Histori Tugas";
    $data['tugass'] = $this->db->query($querytugas)->result();
    $data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['mapel'] = $this->db->query($querymapel)->result();
    $this->load->view('users/templates/header', $data);
    $this->load->view('users/templates/navguru', $data);
    $this->load->view('users/guru/dashboard', $data);
    $this->load->view('users/templates/footer');
  }

  public function historikuis()
  {
    $nip = $this->session->userdata('nip');

    $querymapel = "SELECT * FROM mengajar JOIN guru on guru.nip = mengajar.nip 
    JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan 
    JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.nip=$nip";

    $querykuis = "SELECT * FROM kuis JOIN mengajar on mengajar.id_mengajar = kuis.id_mengajar 
    JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
    JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.nip=$nip ORDER BY kuis.id_kuis DESC";

    $data['title'] = "Dashboard Histori Kuis";
    $data['kuiss'] = $this->db->query($querykuis)->result();
    $data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['mapel'] = $this->db->query($querymapel)->result();
    $this->load->view('users/templates/header', $data);
    $this->load->view('users/templates/navguru', $data);
    $this->load->view('users/guru/dashboard', $data);
    $this->load->view('users/templates/footer');
  }
}
