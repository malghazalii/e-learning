<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
      cek_login_siswa();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $dat = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nis')])->row_array();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/dashboard');
        $this->load->view('users/templates/footer');
    }
}
