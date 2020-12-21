<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login_siswa();
    }
    public function index()
    {
        $data['title'] = 'Tugas';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/tugas');
        $this->load->view('users/templates/footer');
    }
}
