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
    $this->load->view('admin/login');
  }

  public function login()
  {
    $nip = $this->input->post('nip');
    $password = $this->input->post('password');

    $user = $this->db->get_where('admin', ['nip' => $nip])->row_array();

    if ($user) {
      if (md5($password) == $user['password']) {
        $data = [
          'nip' => $user['nip']
        ];
        $this->session->set_userdata($data);
        redirect('Admin/datasiswa');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle">  </i> Username atau Password salah!</div>');
        redirect('Admin/auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle">  </i> Username atau Password salah!</div>');
      redirect('Admin/auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('nip');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check">  </i>Anda berhasil logout!</div>');
    redirect('Admin/auth');
  }
  public function blokS()
  {
    $data['title'] = 'akses ditolak';
    $data['link'] = base_url('User/Siswa/Dashboard');
    $this->load->view('Admin/templates/header', $data);
    $this->load->view('blok', $data);
    $this->load->view('Admin/templates/footer');
  }
  public function blokG()
  {
    $data['title'] = 'akses ditolak';
    $data['link'] = base_url('User/Guru/Dashboard');
    $this->load->view('Admin/templates/header', $data);
    $this->load->view('blok', $data);
    $this->load->view('Admin/templates/footer');
  }
  public function blokA()
  {
    $data['title'] = 'akses ditolak';
    $data['link'] = base_url('Admin/datasiswa');
    $this->load->view('Admin/templates/header', $data);
    $this->load->view('blok', $data);
    $this->load->view('Admin/templates/footer');
  }
}
