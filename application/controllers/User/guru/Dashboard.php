<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
      $this->load->model('m_datasiswa');
      cek_login_guru();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/dashboard');
        $this->load->view('users/templates/footer');

    }
}
