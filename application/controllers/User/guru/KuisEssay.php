<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KuisEssay extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Kuis Pilihan Essay';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/create_event/kuisessay');
        $this->load->view('users/templates/footer');

    }
}
