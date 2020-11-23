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
              $this->load->view('users/login');
          }else{
              $this->_login()
          }
        $this->load->view('users/templates/header');
        $this->load->view('users/login');
        $this->load->view('users/templates/footer');
    }
    private function _login()
    {
        $nis = $this->input->post('nis')
        $password = $this ->input->post('password')

        $user = $this->db->get_where('siswa',['nis'=>$nis])row_array();

        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'nis' => $user['nis']
                ]
            }
        }

    } 

}
