<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walikelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_walikelas');
        //cek_login_admin();
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
            'id_jurusan' => $id_kelas
        ];

        $simpan = $this->m_walikelas->insert($data);

        if ($simpan) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
        } else {
            $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Data tidak berhasil ditambah</div>');
        }

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

    public function edit($id)
    {
        $data['title'] = 'Edit Wali Kelas';
        $data['walikelas'] = $this->m_walikelas->get($id)->row();
        $data['guru'] = $this->m_walikelas->getAllGuru();
        $data['kelas'] = $this->m_walikelas->joinkelasjurusan()->result();
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/edit_walikelas', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $kelas = $this->input->post('kelas');

        $data = [
            'id_walikelas' => $id,
            'nip' => $nip,
            'id_jurusan' => $kelas
        ];

        $save = $this->m_walikelas->update($data, $id);

        if ($save) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data tidak berhasil diubah</div>');
        }


        redirect('Admin/walikelas');
    }
}
