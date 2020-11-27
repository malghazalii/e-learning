<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksi_absensi extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Absensi';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/aksi_absensi');
        $this->load->view('users/templates/footer');

    }
}
