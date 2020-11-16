<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walikelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_walikelas');
        cek_login_admin();
    }

    public function index()
    {
        $data['title'] = 'Wali Kelas';
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['walikelas'] = $this->m_walikelas->TampilWalikelas()->result();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/walikelas', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambahData()
    {
        $data['title'] = 'Tambah Wali Kelas';
        $data['guru'] = $this->m_walikelas->getAllGuru();
        $data['kelas'] = $this->m_walikelas->joinkelasjurusan()->result();
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/tambahwalikelas', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function simpanData()
    {
        $nip = $this->input->post('nip');
        $id_kelas = $this->input->post('kelas');

        $data = [
            'nip' => $nip,
            'id_kelas' => $id_kelas
        ];

        $simpan = $this->m_walikelas->insert($data);
        redirect('Admin/walikelas', $data);
    }

    public function delete($id)
    {
        $delete = $this->m_walikelas->delete($id);
        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data yang anda pilih telah terhapus</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak bisa hapus data</div>');
        }
        redirect('Admin/walikelas');
    }
}
