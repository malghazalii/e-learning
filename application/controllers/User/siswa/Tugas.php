<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Tugas';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/tugas');
        $this->load->view('users/templates/footer');
        // $this->load->view('auto');
    }

    public function updateData($id)
    {
        $nis = $this->session->userdata('nis');

        $data = [
            'id_tugas' => $id,
            'nis' => $nis,
            'status' => '3'
        ];

        $this->db->insert('jawaban_tugas', $data);

        redirect('User/Siswa/Dashboard');
    }
}
