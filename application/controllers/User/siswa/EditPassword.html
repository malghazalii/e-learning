<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditPassword extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Edit password';

        $this->load->view('users/siswa/editpassword');
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
            $this->load->view('users/siswa/editpassword');
        } else {
            $nis = $this->session->userdata('nis');
            $pw = $this->input->post('password');
            $pw1 = $this->input->post('password1');

            $siswa = "SELECT * FROM siswa WHERE nis=$nis";
            $s = $this->db->query($siswa)->row();

            if ($s->password == md5($pw)) {
                $this->db->set('password', md5($pw1));
                $this->db->where('nis', $nis);
                $this->db->update('siswa');

                echo "<script>alert('Data berhasil di simpan');</script>";
                echo "<script>window.location='" . site_url('User/siswa/dashboard') . "';</script>";
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah !</div>');
                redirect('user/siswa/editpassword');
            }
        }
    }
}
