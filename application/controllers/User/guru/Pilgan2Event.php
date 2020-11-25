<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pilgan2Event extends CI_Controller
{
    public function index()
    {
        $this->load->view('users/templates/header');
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/create_event/pilihanganda2');
        $this->load->view('users/templates/footer');

    }
}
