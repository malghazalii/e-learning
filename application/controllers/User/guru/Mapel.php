<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Mata Pelajaran';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/mapel');
        $this->load->view('users/templates/footer');

    }
}
