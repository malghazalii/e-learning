<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MataPelajaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login_siswa();
    }
    public function index()
    {
        $data['title'] = 'Mata Pelajaran';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/matapelajaran');
        $this->load->view('users/templates/footer');
    }
}
