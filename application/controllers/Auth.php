<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('users/templates/headerAuth', $data);
        $this->load->view('users/login');
        $this->load->view('users/templates/footer');
    }
    public function login()
    {
        $name = $this->input->post('name');
        $password = $this->input->post('password');

        $user = $this->db->get_where('siswa', ['nis' => $name])->row_array();
        $guru = $this->db->get_where('guru', ['nip' => $name])->row_array();
        if ($user) {
            if (md5($password) == $user['password']) {
                $data = [
                    'nis' => $user['nis']
                ];
                $this->session->set_userdata($data);
                redirect('User/Siswa/Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle">  </i> Username atau Password salah!</div>');
                redirect('Auth');
            }
        } else if ($guru) {
            if (md5($password) == $guru['password']) {
                $data = [
                    'nip' => $guru['nip']
                ];
                $this->session->set_userdata($data);
                redirect('User/Guru/Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle">  </i> Username atau Password salah!</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle">  </i> Username atau Password salah!</div>');
            redirect('Auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('nis');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check">  </i>Anda berhasil logout!</div>');
        redirect('Auth');
    }
    public function blok()
    {
        $data['title'] = 'akses ditolak';
        $this->load->view('Admin/templates/headerAuth', $data);
        $this->load->view('blok');
        $this->load->view('Admin/templates/footer');
    }
}
