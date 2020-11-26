<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/dashboard');
        $this->load->view('users/templates/footer');

    }
}
