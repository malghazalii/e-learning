<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BuatKuis extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Buat Kuis';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/templates/navPilihan');
        $this->load->view('users/guru/create_event/buatkuis');
        $this->load->view('users/templates/footer');

    }
}
