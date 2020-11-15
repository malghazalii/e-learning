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
    $this->form_validation->set_rules('nip', 'Nip', 'required', [
      'required' => 'Field tidak boleh kosong'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required', [
      'required' => 'Field tidak boleh kosong'
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view('admin/login');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $nip = $this->input->post('nip');
    $password = $this->input->post('password');

    $user = $this->db->get_where('admin', ['nip' => $nip])->row_array();

    if ($user) {
      if ($password == $user['password']) {
        $data = [
          'nip' => $user['nip']
        ];
        $this->session->set_userdata($data);
        redirect('Admin/datasiswa');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
        redirect('Admin/auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username salah!</div>');
      redirect('Admin/auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('nip');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout!</div>');
    redirect('Admin/auth');
  }
}
