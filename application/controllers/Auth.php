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
        $this->load->view('auto');
    }
    public function login()
    {
        $name = $this->input->post('name');
        $password = $this->input->post('password');

        $user = $this->db->get_where('siswa', ['nis' => $name])->row_array();
        $guru = $this->db->get_where('guru', ['nip' => $name])->row_array();
        if ($user) {
            $nis = $user['nis'];
            if (md5($password) == $user['password']) {
                $ikut = "SELECT * FROM ikut_ujian WHERE nis = $nis AND proses = 'belum'";
                $ik = $this->db->query($ikut)->row();
                if ($ik == null) {
                    $data = [
                        'nis' => $user['nis'],
                        'belum' => ''
                    ];
                } else {
                    $data = [
                        'nis' => $user['nis'],
                        'id_kuis' => $ik->id_kuis,
                        'id_ujian' => $ik->id_ujian,
                        'now' => $ik->time,
                        'belum' => $ik->proses
                    ];
                }
                $this->session->set_userdata($data);
                redirect('User/Siswa/Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle">  </i> Username atau Password salah!</div>');
                redirect('Auth');
            }
        } else if ($guru) {
            if (md5($password) == $guru['password']) {
                $data = [
                'nip' => $guru['nip'],
                'jml_soal' => 1,
                'jumlah_keluar' => 0
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
        $this->session->unset_userdata('id_kuis');
        $this->session->unset_userdata('id_ujian');
        $this->session->unset_userdata('belum');
        $this->session->unset_userdata('now');
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
      href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
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
            $this->load->view('users/templates/headerAuth', $data);
            $this->load->view('users/forgot-password');
            $this->load->view('users/templates/footer');
            $this->load->view('auto');
        } else {
            $email = $this->input->post('email');
            $siswa = $this->db->get_where('siswa', ['email' => $email])->row_array();
            $guru = $this->db->get_where('guru', ['email' => $email])->row_array();

            if ($siswa) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please cek email anda untuk reset password!</div>');
                redirect('auth/forgotpassword');
            } elseif ($guru) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please cek email anda untuk reset password!</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak tersedia!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $siswa = $this->db->get_where('siswa', ['email' => $email])->row_array();
        $guru = $this->db->get_where('guru', ['email' => $email])->row_array();

        if ($siswa) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Reset password gagal! Token salah</div>');
                redirect('auth');
            }
        } elseif ($guru) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Reset password gagal! Token salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Reset password gagal! Email salah</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
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
            $this->load->view('users/templates/headerAuth', $data);
            $this->load->view('users/change-password');;
            $this->load->view('users/templates/footer');
            $this->load->view('auto');
        } else {
            $password = $this->input->post('password1');
            $email = $this->session->userdata('reset_email');

            $siswa = $this->db->get_where('siswa', ['email' => $email])->row_array();
            $guru = $this->db->get_where('guru', ['email' => $email])->row_array();

            if ($siswa) {
                $this->db->set('password', md5($password));
                $this->db->where('email', $email);
                $this->db->update('siswa');
            } elseif ($guru) {
                $this->db->set('password', md5($password));
                $this->db->where('email', $email);
                $this->db->update('guru');
            }
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password telah diubah! Mohon login</div>');
            redirect('auth');
        }
    }
}