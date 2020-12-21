<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_mapel');
        cek_login_admin();
    }

    public function index()
    {
        $data['title'] = 'Data Mapel';
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['mapel'] = $this->m_mapel->TampilMapel();
        $data['kodeunik'] = $this->m_mapel->buat_kode();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/mapel', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambahData()
    {
        $data['title'] = 'Tambah Mata Pelajaran';
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/tambahmapel', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function simpanData()
    {
        $this->form_validation->set_rules('mapel', 'Mapel', 'required|trim|is_unique[mata_pelajaran.mata_pelajaran]', [
            'required' => 'Field tidak boleh kosong',
            'is_unique' => 'Nama pelajaran tidak boleh sama persis'
        ]);

        if ($this->form_validation->run() == false) {
            $this->tambahData();
        } else {
            $mapel = $this->input->post('mapel');

            $data = [
                'mata_pelajaran' => $mapel,
            ];

            $simpan = $this->m_mapel->insert($data);

            if ($simpan) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data tidak berhasil ditambah</div>');
            }

            redirect('Admin/mapel', $data);
        }
    }

    public function delete($id)
    {
        $delete = $this->m_mapel->delete($id);
        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data yang anda pilih telah terhapus</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak bisa hapus data</div>');
        }

        redirect('Admin/mapel');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Mata Pelajaran';
        $data['mapel'] = $this->m_mapel->get($id)->row();
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/edit_mapel', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('mata_pelajaran', 'Mata_pelajaran', 'required|trim', [
            'required' => 'Field tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $this->edit($id);
        } else {
            $id = $this->input->post('id');
            $mapel = $this->input->post('mata_pelajaran');

            $data = [
                'id_mapel' => $id,
                'mata_pelajaran' => $mapel
            ];

            $save = $this->m_mapel->update($data, $id);

            if ($save) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data tidak berhasil diubah</div>');
            }

            redirect('Admin/mapel', $save);
        }
    }
    // public function kode()
    // {
    //     $data['kodeunik'] = $this->m_mapel->buat_kode(); // variable $kodeunik merujuk ke file model_user.php pada function buat_kode. paham kan ya? harus paham dong
    //     $this->load->view('admin/templates/header', $data);
    //     $this->load->view('admin/templates/sidebar', $data);
    //     $this->load->view('admin/templates/topbar', $data);
    //     $this->load->view('admin/mapel', $data);
    //     $this->load->view('admin/templates/footer', $data);
    // }
}
