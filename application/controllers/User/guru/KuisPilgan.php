<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KuisPilgan extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Ujian Pilihan Ganda';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/create_event/kuispilgan');
        $this->load->view('users/templates/footer');
    }
}
