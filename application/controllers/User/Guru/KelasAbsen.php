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
  public function Tampil($id)
  {
    $nip = $this->session->userdata('nip');
    $data['tanggal'] = date('Y-m-d');

    // $queryAbsen = "SELECT * FROM `absen_siswa`";
    $queryAbsen = "SELECT * FROM `absen_siswa` 
    JOIN mengajar on mengajar.id_mengajar=absen_siswa.id_mengajar
    JOIN guru ON guru.nip=mengajar.nip
    JOIN mata_pelajaran ON mata_pelajaran.id_mapel=mengajar.id_mapel
    JOIN penjurusan on penjurusan.id_jurusan=mengajar.id_jurusan
    JOIN kelas ON kelas.id_kelas=penjurusan.id_kelas
    WHERE mengajar.nip = $nip";

    $queryMengajar = "SELECT * FROM mengajar 
    JOIN guru ON guru.nip=mengajar.nip
    JOIN mata_pelajaran ON mata_pelajaran.id_mapel=mengajar.id_mapel
    JOIN penjurusan on penjurusan.id_jurusan=mengajar.id_jurusan
    JOIN kelas ON kelas.id_kelas=penjurusan.id_kelas
    WHERE mengajar.nip = $nip AND mengajar.id_mengajar=$id";

    $data['absen'] = $this->db->query($queryAbsen)->result();
    $data['mengajar'] = $this->db->query($queryMengajar)->row();

    $data['title'] = 'Buat Absen';
    $this->load->view('users/templates/header', $data);
    $this->load->view('users/templates/navguru');
    $this->load->view('users/guru/create_absensi');
    $this->load->view('users/templates/footer');
  }
  public function TampilU($id)
  {
    $nip = $this->session->userdata('nip');

    // $queryAbsen = "SELECT * FROM `absen_siswa`";
    $queryAbsen = "SELECT * FROM `absen_siswa` 
    JOIN mengajar on mengajar.id_mengajar=absen_siswa.id_mengajar
    JOIN guru ON guru.nip=mengajar.nip
    JOIN mata_pelajaran ON mata_pelajaran.id_mapel=mengajar.id_mapel
    JOIN penjurusan on penjurusan.id_jurusan=mengajar.id_jurusan
    JOIN kelas ON kelas.id_kelas=penjurusan.id_kelas
    WHERE mengajar.nip = $nip";

    $queryMengajar = "SELECT * FROM `absen_siswa` 
    JOIN mengajar on mengajar.id_mengajar=absen_siswa.id_mengajar
    JOIN guru ON guru.nip=mengajar.nip
    JOIN mata_pelajaran ON mata_pelajaran.id_mapel=mengajar.id_mapel
    JOIN penjurusan on penjurusan.id_jurusan=mengajar.id_jurusan
    JOIN kelas ON kelas.id_kelas=penjurusan.id_kelas
    WHERE absen_siswa.id_absen = $id";

    $data['absen'] = $this->db->query($queryAbsen)->result();
    $data['mengajar'] = $this->db->query($queryMengajar)->row();
    $tanggal = $this->db->query($queryMengajar)->row();
    $data['tanggal'] = $tanggal->tanggal;
    

    $data['title'] = 'Buat Absen';
    $this->load->view('users/templates/header', $data);
    $this->load->view('users/templates/navguru');
    $this->load->view('users/guru/update_absensi');
    $this->load->view('users/templates/footer');
  }
  public function Input($id)
  {

    $jam = $this->input->post('jam');
    $tanggal = $this->input->post('tanggal');

    $waktu = $tanggal . " " . $jam;
    $data = [
      'id_mengajar' => $id,
      'tanggal' => $waktu,
    ];
    if ($jam == "" || $tanggal == "") {
      echo "<script>alert('Tanggal atau Jam tidak boleh kosong');</script>";
      echo "<script>window.location='" . site_url('User/Guru/KelasAbsen/Tampil/' . $id) . "';</script>";
    } else {
      $this->db->insert('absen_siswa', $data);
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('data Berhasil Di simpan');</script>";
        echo "<script>window.location='" . site_url('User/Guru/KelasAbsen') . "';</script>";
      }
    }
  }
  public function update($id)
  {
    $jam = $this->input->post('jam');
    $tanggal = $this->input->post('tanggal');

    $waktu = $tanggal . " " . $jam;

    $data = [
      'tanggal' => $waktu
    ];
    if ($jam == "" || $tanggal == "") {
      echo "<script>alert('Tanggal atau Jam tidak boleh kosong');</script>";
      echo "<script>window.location='" . site_url('User/Guru/KelasAbsen/TampilU/' . $id) . "';</script>";
    } else {
      $this->db->where('id_absen', $id)->update('absen_siswa', $data);
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('data Berhasil Di simpan');</script>";
        echo "<script>window.location='" . site_url('User/Guru/KelasAbsen') . "';</script>";
      }
    }
  }

  public function Delete($id)
  {
    $this->db->where('id_absen', $id)->delete('absen_siswa');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data yang anda pilih telah terhapus</div>');
    redirect('User/Guru/KelasAbsen');
  }
}
