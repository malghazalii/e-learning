<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UploadMateri extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Upload Materi';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/uploadmateri');
        $this->load->view('users/templates/footer');

    }
}
