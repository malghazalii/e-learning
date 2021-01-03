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
}
