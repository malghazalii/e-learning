<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datasiswa extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_datasiswa');
    cek_login_admin();
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
    $data['siswa'] = $this->m_datasiswa->joinkelasjurusan()->result();
    $data['edit'] = $this->m_datasiswa->detail_data($id)->row();
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

    if ($save) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
    } else {
      $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Data tidak berhasil diubah</div>');
    }

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
    $this->rules();

    if ($this->form_validation->run() == false) {
      $this->tambahData();
    } else {
      $nis = $this->input->post('nis');
      $nama = $this->input->post('nama');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $alamat = $this->input->post('alamat');
      $agama = $this->input->post('agama');
      $no_hp = $this->input->post('no_hp');
      $password = 'sma1jaya';
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

      if ($simpan) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
      } else {
        $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Data tidak berhasil ditambah</div>');
      }

      redirect('Admin/datasiswa');
    }
  }

  public function rules()
  {
    $this->form_validation->set_rules('nis', 'Nis', 'required|trim|is_unique[siswa.nis]|min_length[2]', [
      'required' => 'Field tidak boleh kosong',
      'is_unique' => 'NIs guru sudah ada',
      'min_length' => 'Nis terlalu pendek'
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
