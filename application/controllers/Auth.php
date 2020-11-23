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
        $this->form_validation->set_rules('nis', 'Nis', 'required|trim', [
            'required' => 'Field tidak boleh kosong'
          ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Field tidak boleh kosong'
          ]);
       
          if($this->form_validation->run == false){
            $this->load->view('users/templates/header');
            $this->load->view('users/login');
            $this->load->view('users/templates/footer');
          }else{
              $this->_login()
          }
    }
    private function _login()
    {
        $name = $this->input->post('Name')
        $password = $this ->input->post('Password')

        $user = $this->db->get_where('siswa',['nis'=>$name])row_array();
        $guru = $this->db->get_where('guru',['nip'=>$name])row_array();
        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'nis' => $user['nis']
                ];
                $this->session->set_userdata($data);
                redirect('Siswa');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('Auth');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username salah!</div>');
                redirect('Auth');
            }
        }
            if ($guru) {
                if ($password == $guru['password']) {
                    $data = [
                        'nip' => $guru['nip']
                    ];
                    $this->session->set_userdata($data);
                    redirect('Guru');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('Auth')
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username salah!</div>');
                    redirect('Auth');
                }
            }
    }
    
    public function logout()
    {
      $this->session->unset_userdata('nip');
      $this->session->unset_userdata('nis');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout!</div>');
      redirect('Auth');
    }

}
