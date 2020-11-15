<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datasiswa extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_datasiswa');
  }

  public function index()
  {
    $data['title'] = 'Data Siswa';
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['siswa'] = $this->m_datasiswa->TampilSiswa()->result();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/datasiswa', $data);
    $this->load->view('admin/templates/footer', $data);
  }

  public function detail($id)
  {
    $data['title'] = 'Detail Siswa';
    $data['detail'] = $this->m_datasiswa->detail_data($id)->result();
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/readdatasiswa', $data);
    $this->load->view('admin/templates/footer', $data);
  }

  public function delete($id)
  {
    $delete = $this->m_datasiswa->delete($id);
    if ($delete) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data yang anda pilih telah terhapus</div>');
    } else {
      $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Tidak bisa hapus data</div>');
    }
    redirect('Admin/datasiswa');
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Siswa';
    $data['siswa'] = $this->m_datasiswa->joinkelasjurusan();
    $data['edit'] = $this->m_datasiswa->detail_data($id)->result();
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/edit_siswa', $data);
    $this->load->view('admin/templates/footer', $data);
  }

  public function update()
  {
    $nis = $this->input->post('nis');
    $nama = $this->input->post('nama');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $alamat = $this->input->post('alamat');
    $agama = $this->input->post('agama');
    $no_hp = $this->input->post('no_hp');
    $password = $this->input->post('password');
    $id_kelas = $this->input->post('kelas');

    $data = [
      'nis' => $nis,
      'nama' => $nama,
      'jenis_kelamin' => $jenis_kelamin,
      'alamat' => $alamat,
      'agama' => $agama,
      'no_hp' => $no_hp,
      'password' => $password,
      'id_kelas' => $id_kelas
    ];

    $save = $this->m_datasiswa->update($data, $nis);
    redirect('Admin/datasiswa', $save);
  }

  public function tambahData()
  {
    $data['title'] = 'Tambah Siswa';
    $data['siswa'] = $this->m_datasiswa->joinkelasjurusan()->result();
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/tambahsiswa', $data);
    $this->load->view('admin/templates/footer', $data);
  }

  public function simpanData()
  {
    $nis = $this->input->post('nis');
    $nama = $this->input->post('nama');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $alamat = $this->input->post('alamat');
    $agama = $this->input->post('agama');
    $no_hp = $this->input->post('no_hp');
    $password = $this->input->post('password');
    $id_kelas = $this->input->post('kelas');

    $data = [
      'nis' => $nis,
      'nama' => $nama,
      'jenis_kelamin' => $jenis_kelamin,
      'alamat' => $alamat,
      'agama' => $agama,
      'no_hp' => $no_hp,
      'password' => $password,
      'id_kelas' => $id_kelas
    ];

    $simpan = $this->m_datasiswa->insert($data);
    redirect('Admin/datasiswa', $simpan);
  }
}
