<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataguru extends CI_Controller
{
    function __construct() {
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

    public function detail($id){
        $data['title'] = 'Detail Guru';
        $data['detail'] = $this->m_dataguru->detail_data($id)->result();
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/readdataguru', $data);
        $this->load->view('admin/templates/footer', $data);
      }

      public function delete($id){
        $where = array ('nip' => $id);
        $this->m_dataguru->hapus_data($where, 'guru');
        redirect ('Admin/dataguru');
      }
}
?>