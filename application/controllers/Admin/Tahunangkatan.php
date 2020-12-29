<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahunangkatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        cek_login_admin();
    }

    public function index()
    {
        $tahunangkatan = "SELECT * FROM tahun_angkatan";

        $data['title'] = 'Tahun Angkatan';
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['tahunangkatan'] = $this->db->query($tahunangkatan)->result();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/tahunangkatan', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function delete($id)
    {
        $delete = $this->db->where('id_tahun', $id)->delete('siswa');
        $delete = $this->db->where('id_tahun', $id)->delete('tahun_angkatan');
        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data yang anda pilih telah terhapus</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak bisa hapus data</div>');
        }

        redirect('Admin/tahunangkatan');
    }

    public function tambahData()
    {
        $data['title'] = 'Tambah Tahun Angkatan';
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/tambahangkatan', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function simpanData()
    {
        $this->form_validation->set_rules('tahunangkatan', 'Tahunangkatan', 'required|trim|is_unique[tahun_angkatan.tahun_angkatan]', [
            'required' => 'Field tidak boleh kosong',
            'is_unique' => 'Tahun Angkatan udah tersedia'
        ]);

        if ($this->form_validation->run() == false) {
            $this->tambahData();
        } else {
            $mapel = $this->input->post('tahunangkatan');

            $data = [
                'tahun_angkatan' => $mapel,
            ];

            $simpan = $this->db->insert('tahun_angkatan', $data);

            if ($simpan) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data tidak berhasil ditambah</div>');
            }

            redirect('Admin/tahunangkatan', $data);
        }
    }
}
