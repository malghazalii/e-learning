<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditPassword extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Edit password';

        $this->load->view('users/guru/editpassword');
    }

    public function simpan()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Field tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[6]|matches[password2]', [
            'required' => 'Field tidak boleh kosong',
            'min_length' => 'Minimal password 6 karakter',
            'matches' => 'Password tidak cocok dengan konfirmasi password'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[6]|matches[password1]', [
            'required' => 'Field tidak boleh kosong',
            'min_length' => 'Minimal password 6 karakter',
            'matches' => 'Password tidak cocok dengan password baru'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('users/guru/editpassword');
        } else {
            $nip = $this->session->userdata('nip');
            $pw = $this->input->post('password');
            $pw1 = $this->input->post('password1');

            $guru = "SELECT * FROM guru WHERE nip=$nip";
            $g = $this->db->query($guru)->row();

            if ($g->password == md5($pw)) {
                $this->db->set('password', md5($pw1));
                $this->db->where('nip', $nip);
                $this->db->update('guru');

                echo "<script>alert('Data berhasil di simpan');</script>";
                echo "<script>window.location = '" . site_url('User / Guru / dashboard') . "';</script>";
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah !</div>');
                redirect('user/guru/editpassword');
            }
        }
    }
}