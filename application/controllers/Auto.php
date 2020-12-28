<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auto extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function Auto($id_absen, $nis)
  {
    $data = [
      'id_absen' => $id_absen,
      'nis' => $nis,
      'status' => '4'
    ];
    $this->db->insert('tr_absen_siswa', $data);
    if ($this->db->affected_rows() > 0) {
      echo "<script>window.location=history.go(-1);</script>";
    }
    // redirect('Auth');
  }
  public function Auto1($id_absen, $nip)
  {
    $data = [
      'id_absen' => $id_absen,
      'nip' => $nip,
      'status' => '4'
    ];

    $this->db->insert('tr_absen_guru', $data);
    if ($this->db->affected_rows() > 0) {
      echo "<script>window.location=history.go(-1);</script>";
    }
  }
  public function Auto2($id_kuis, $nis)
  {
    $sql = "SELECT MAX(id_ujian) as s FROM ikut_ujian";
    $s = $this->db->query($sql)->row();
    $data = [
      'id_ujian' => $s->s + 1,
      'nis' => $nis,
      'id_kuis' => $id_kuis,
      'nilai' => 0,
      'status' => '2'
    ];

    $this->db->insert('ikut_ujian', $data);
    if ($this->db->affected_rows() > 0) {
      echo "<script>window.location=history.go(-1);</script>";
    }
  }
  public function Auto3($id_tugas, $nis)
  {
    $data = [
      'id_tugas' => $id_tugas,
      'nis' => $nis,
      'status' => '3',
      'nilai' => 0
    ];

    $this->db->insert('jawaban_tugas', $data);
    if ($this->db->affected_rows() > 0) {
      echo "<script>window.location=history.go(-1);</script>";
    }
  }
}
