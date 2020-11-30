<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_datasiswa');
    $this->load->model('Guru/m_absensi');
    //cek_login_guru();
  }
  public function index()
  {
    $nip = $this->session->userdata('nip');

    $querytryabsen = "SELECT * FROM `tr_absen_guru` join absen_guru on absen_guru.id_absen = tr_absen_guru.id_absen 
    WHERE absen_guru.is_active=1 and tr_absen_guru.nip=$nip";

    $data['title'] = 'Dashboard';
    $data['absensi'] = $this->db->query($querytryabsen)->row();
    $this->load->view('users/templates/header', $data);
    $this->load->view('users/templates/navguru', $data);
    $this->load->view('users/guru/dashboard');
    $this->load->view('users/templates/footer');
  }
}
