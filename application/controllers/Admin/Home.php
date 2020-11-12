<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('admin/templates/footer', $data);
  }
}
