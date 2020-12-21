<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pilgan2Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login_guru();
    }
    public function index()
    {
        $data['title'] = 'Pilgan2Event';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/create_event/pilihanganda2');
        $this->load->view('users/templates/footer');
    }
}
