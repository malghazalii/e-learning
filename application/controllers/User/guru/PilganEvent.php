<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PilganEvent extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Pilgan Event';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/create_event/pilihanganda');
        $this->load->view('users/templates/footer');

    }
}
