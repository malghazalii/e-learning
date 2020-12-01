<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Event';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/event');
        $this->load->view('users/templates/footer');
    }
}
