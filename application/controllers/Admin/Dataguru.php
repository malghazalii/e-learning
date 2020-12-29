<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataguru extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('m_dataguru');
    cek_login_admin();
  }

  public function index()
  {
    $data['title'] = 'Guru';
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
    $delete = $this->db->where('nip', $id)->delete('wali_kelas');
    $delete = $this->db->where('nip', $id)->delete('tr_absen_guru');
    $delete = $this->db->where('nip', $id)->delete('soal');
    $delete = $this->db->where('nip', $id)->delete('mengajar');
    $delete = $this->db->where('nip', $id)->delete('guru');
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
    $this->rules();
    if ($this->form_validation->run() == false) {
      $this->tambahData();
    } else {
      $nip = $this->input->post('nip');
      $nama = $this->input->post('nama');
      $password = 'sma1jaya';
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $alamat = $this->input->post('alamat');
      $no_hp = $this->input->post('no_hp');
      $golongan = $this->input->post('golongan');

      $data = [
        'nip' => $nip,
        'nama' => $nama,
        'password' => md5($password),
        'jenis_kelamin' => $jenis_kelamin,
        'alamat' => $alamat,
        'no_hp' => $no_hp,
        'id_gol' => $golongan
      ];

      $simpan = $this->m_dataguru->insert($data);

      if ($simpan) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data tidak berhasil ditambah</div>');
      }
      redirect('Admin/dataguru', $simpan);
    }
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Guru';
    $data['golongan'] = $this->m_dataguru->golongan();
    $data['edit'] = $this->m_dataguru->detail_data($id)->row();
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/edit_guru', $data);
    $this->load->view('admin/templates/footer', $data);
  }

  public function update($id)
  {
    $this->rulesedit();
    if ($this->form_validation->run() == false) {
      $this->edit($id);
    } else {
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
        'password' => md5($password),
        'jenis_kelamin' => $jenis_kelamin,
        'alamat' => $alamat,
        'no_hp' => $no_hp,
        'id_gol' => $golongan
      ];

      $save = $this->m_dataguru->update($data, $nip);

      if ($save) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data tidak berhasil diubah</div>');
      }

      redirect('Admin/dataguru', $save);
    }
  }
  public function rules()
  {
    $this->form_validation->set_rules('nip', 'Nip', 'required|trim|is_unique[guru.nip]|min_length[2]', [
      'required' => 'Field tidak boleh kosong',
      'is_unique' => 'NIP guru sudah ada',
      'min_length' => 'Nip terlalu pendek'
    ]);
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
      'required' => 'Field tidak boleh kosong'
    ]);
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
      'required' => 'Field tidak boleh kosong'
    ]);
    $this->form_validation->set_rules('no_hp', 'nama', 'required|trim', [
      'required' => 'Field tidak boleh kosong'
    ]);
  }
  public function rulesedit()
  {
    $this->form_validation->set_rules('nip', 'Nip', 'required|trim|min_length[2]', [
      'required' => 'Field tidak boleh kosong',
      'min_length' => 'Nip terlalu pendek'
    ]);
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
      'required' => 'Field tidak boleh kosong'
    ]);
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
      'required' => 'Field tidak boleh kosong'
    ]);
    $this->form_validation->set_rules('no_hp', 'nama', 'required|trim', [
      'required' => 'Field tidak boleh kosong'
    ]);
  }
}
