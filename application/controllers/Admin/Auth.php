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
        redirect('Admin/dashboard');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle">  </i> NIP atau Password salah!</div>');
        redirect('Admin/auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle">  </i> NIP atau Password tidak boleh kosong!</div>');
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

  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'Sman1bondowoso@gmail.com',
      'smtp_pass' => 'sman01jaya',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n"
    ];

    $this->load->library('email', $config);
    $this->email->initialize($config);

    $this->email->from('redshop0990@gmail.com', 'Admin Sman 1 Bondowoso');
    $this->email->to($this->input->post('email'));

    if ($type == 'forgot') {
      $this->email->subject('Reset Password');
      $this->email->message('Klik tautan ini untuk mengatur ulang password anda : <a
      href="' . base_url() . 'admin/auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
    }

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
    }
  }

  public function forgotPassword()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
      'required' => 'Field tidak boleh kosong',
      'valid_email' => 'Harus berisi alamat email yang valid'
    ]);

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Lupa Password';
      $this->load->view('admin/forgot-password');
    } else {
      $email = $this->input->post('email');
      $user = $this->db->get_where('admin', ['email' => $email])->row_array();

      if ($user) {
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_created' => time()
        ];

        $this->db->insert('user_token', $user_token);
        $this->_sendEmail($token, 'forgot');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please cek email anda untuk reset password!</div>');
        redirect('Admin/auth/forgotpassword');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak tersedia!</div>');
        redirect('Admin/auth/forgotpassword');
      }
    }
  }

  public function resetPassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('admin', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

      if ($user_token) {
        $this->session->set_userdata('reset_email', $email);
        $this->changePassword();
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Reset password gagal! Token salah</div>');
        redirect('Admin/auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Reset password gagal! Email salah</div>');
      redirect('Admin/auth');
    }
  }

  public function changePassword()
  {
    if (!$this->session->userdata('reset_email')) {
      redirect('admin/auth');
    }

    $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
      'required' => 'Field tidak boleh kosong',
      'min_length' => 'Minimal password 6 karakter',
      'matches' => 'password tidak cocok dengan ulangi password'
    ]);
    $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[6]|matches[password1]', [
      'required' => 'Field tidak boleh kosong',
      'min_length' => 'Minimal password 6 karakter',
      'matches' => 'Ulangi password tidak cocok dengan password baru'
    ]);
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Ubah Password';
      $this->load->view('admin/change-password');
    } else {
      $password = $this->input->post('password1');
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', md5($password));
      $this->db->where('email', $email);
      $this->db->update('admin');

      $this->session->unset_userdata('reset_email');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password telah diubah! Mohon login</div>');
      redirect('Admin/auth');
    }
  }
}
