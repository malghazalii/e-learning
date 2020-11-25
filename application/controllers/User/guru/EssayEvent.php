<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EssayEvent extends CI_Controller
{
    public function index()
    {
        $this->load->view('users/templates/header');
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/create_event/esai');
        $this->load->view('users/templates/footer');

    }
}
