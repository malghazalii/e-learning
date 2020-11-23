<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('users/templates/header');
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/dashboard');
        $this->load->view('users/templates/footer');

    }
}
