<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auto extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function AbsenSiswa($id, $nis)
  {
    $data = [
      'id_absen' => $id,
      'nis' => $nis,
      'status' => '4'
    ];

    $this->db->insert('tr_absen_siswa', $data);
    redirect('Auth');
  }
}

