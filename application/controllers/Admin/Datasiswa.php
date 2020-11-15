<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datasiswa extends CI_Controller
{
   function __construct() {
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

  public function detail($id){
    $data['title'] = 'Detail Siswa';
    $data['detail'] = $this->m_datasiswa->detail_data($id)->result();
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/readdatasiswa', $data);
    $this->load->view('admin/templates/footer', $data);
  }

  public function delete($id){
    $where = array ('nis' => $id);
    $this->m_datasiswa->hapus_data($where, 'siswa');
    redirect ('Admin/datasiswa');
  }

  public function edit($id){
    $data['title'] = 'Edit Siswa';
    $data['edit'] = $this->m_datasiswa->detail_data($id)->result();
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/edit_siswa', $data);
    $this->load->view('admin/templates/footer', $data);
  }

}
