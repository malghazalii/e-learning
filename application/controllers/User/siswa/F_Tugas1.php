<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_Tugas1 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login_siswa();
    }
    public function index()
    {
        $data['title'] = 'Foem Tugas';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/f_tugas1');
        $this->load->view('users/templates/footer');
        $this->load->view('auto');
    }
}
