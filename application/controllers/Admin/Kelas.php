<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_kelas');
        cek_login_admin();
    }

    public function index()
    {
        $data['title']  = 'Kelas';
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['kelas'] = $this->m_kelas->TampilKelas()->result();
        $this->load->view('Admin/templates/header', $data);
        $this->load->view('Admin/templates/sidebar', $data);
        $this->load->view('Admin/templates/topbar', $data);
        $this->load->view('Admin/kelas', $data);
        $this->load->view('Admin/templates/footer', $data);
    }

    public function tambahData()
    {
        $data['title'] = 'Tambah Kelas';
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['kelas'] = $this->m_kelas->getKelas();
        $this->load->view('Admin/templates/header', $data);
        $this->load->view('Admin/templates/sidebar', $data);
        $this->load->view('Admin/templates/topbar', $data);
        $this->load->view('Admin/tambah_kelas', $data);
        $this->load->view('Admin/templates/footer', $data);
    }

    public function simpanData()
    {
        $id_kelas = $this->input->post('kelas');
        $nama_jurusan = $this->input->post('jurusan');

        $data = [
            'id_kelas' => $id_kelas,
            'nama_jurusan' => $nama_jurusan
        ];

        $simpan = $this->m_kelas->insert($data);

        if ($simpan) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
        } else {
            $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Data tidak berhasil ditambah</div>');
        }

        redirect('Admin/kelas');
    }

    public function delete($id)
    {
        $delete = $this->m_kelas->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data yang anda pilih telah terhapus</div>');
        } else {
            $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Tidak bisa hapus data</div>');
        }

        redirect('Admin/kelas');
    }

    // public function edit($id)
    // {
    //     $data['title'] = 'Edit Kelas';
    //     $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    //     $data['edit'] = $this->m_kelas->get($id)->row();
    //     $data['jurusan'] = $this->m_kelas->TampilKelas()->result();
    //     $data['kelas'] = $this->m_kelas->getKelas();
    //     $this->load->view('Admin/templates/header', $data);
    //     $this->load->view('Admin/templates/sidebar', $data);
    //     $this->load->view('Admin/templates/topbar', $data);
    //     $this->load->view('Admin/edit_kelas', $data);
    //     $this->load->view('Admin/templates/footer', $data);
    // }

    // public function update()
    // {
    //     $id_jurusan = $this->input->post('id_jurusan');
    //     $id_kelas = $this->input->post('kelas');
    //     $jurusan = $this->input->post('jurusan');

    //     $data = [
    //         'id_jurusan' => $id_jurusan,
    //         'id_kelas' => $id_kelas,
    //         'nama_jurusan' => $jurusan
    //     ];

    //     $save = $this->m_kelas->update($data, $id_jurusan);

    //     if ($save) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
    //     } else {
    //         $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Data tidak berhasil diubah</div>');
    //     }

    //     redirect('Admin/kelas', $save);
    // }
}
