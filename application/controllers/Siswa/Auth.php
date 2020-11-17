<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('nis', 'Nis', 'trim|required', [
            'required' => 'Field tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Field tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title']='Login siswa';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('siswa/login');
            $this->load->view('templates/auth_footer', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('nis');
        $password = $this->input->post('password');

        $user = $this->db->get_where('siswa', ['nis' => $username])->row_array();

        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'nis' => $user['nis']
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" style="color: red; padding-bottom: 20px; margin-left: auto; margin-right: auto"><svg style="color: black" width="1.0625em" height="1em" viewBox="0 0 17 16" class="bi bi-exclamation-triangle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 5zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
              </svg> Password salah!</div>');
                redirect('Siswa/Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" style="color: red; padding-bottom: 20px; margin-left: auto; margin-right: auto"><svg style="color: black" width="1.0625em" height="1em" viewBox="0 0 17 16" class="bi bi-exclamation-triangle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 5zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
          </svg> Username salah!</div>');
            redirect('Siswa/Auth');
        }
    }
    public function blok()
    {
        $data['title'] = 'akses ditolak';
        $this->load->view('Admin/templates/header', $data);
        $this->load->view('blok');
        $this->load->view('Admin/templates/footer');
    }
}
