<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CreateEvent extends CI_Controller
{
    public function index()
    {
        $this->load->view('users/templates/header');
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/create_event');
        $this->load->view('users/templates/footer');

    }
}
