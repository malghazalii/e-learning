<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_datasiswa');
    cek_login_admin();
  }

  public function index()
  {
    $jumlahsiswa = "SELECT COUNT(nis) AS jumlah FROM siswa";
    $jumlahguru = "SELECT COUNT(nip) AS jml FROM guru";
    $data['jumlahguru'] = $this->db->query($jumlahguru)->row();
    $data['jumlahsiswa'] = $this->db->query($jumlahsiswa)->row();
    $data['title'] = 'Dashboard';
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/dashboard', $data);
    $this->load->view('admin/templates/footer', $data);
  }
}
?>