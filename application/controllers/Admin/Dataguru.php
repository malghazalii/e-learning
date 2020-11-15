<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataguru extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_dataguru');
  }

  public function index()
  {
    $data['title'] = 'Data Guru';
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['guru'] = $this->m_dataguru->TampilGuru()->result();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/dataguru', $data);
    $this->load->view('admin/templates/footer', $data);
  }

  public function detail($id)
  {
    $data['title'] = 'Detail Guru';
    $data['detail'] = $this->m_dataguru->detail_data($id)->result();
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/readdataguru', $data);
    $this->load->view('admin/templates/footer', $data);
  }

  public function delete($id)
  {
    $delete = $this->m_dataguru->delete($id);
    if ($delete) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data yang anda pilih telah terhapus</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak bisa hapus data</div>');
    }
    redirect('Admin/dataguru');
  }

  public function tambahData()
  {
    $data['title'] = 'Tambah Guru';
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/tambahguru', $data);
    $this->load->view('admin/templates/footer', $data);
  }

  public function simpanData()
  {
    $nip = $this->input->post('nip');
    $nama = $this->input->post('nama');
    $password = $this->input->post('password');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $alamat = $this->input->post('alamat');
    $no_hp = $this->input->post('no_hp');
    $golongan = $this->input->post('golongan');

    $data = [
      'nip' => $nip,
      'nama' => $nama,
      'password' => $password,
      'jenis_kelamin' => $jenis_kelamin,
      'alamat' => $alamat,
      'no_hp' => $no_hp,
      'id_gol' => $golongan
    ];

    $simpan = $this->m_dataguru->insert($data);
    redirect('Admin/dataguru', $simpan);
  }
}
