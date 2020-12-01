<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GuruMengajar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_guru_mengajar');
        //cek_login_admin();
    }

    public function index()
    {
        $data['title'] = 'Guru Mengajar';
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['mengajar'] = $this->m_guru_mengajar->TampilData()->result();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/gurumengajar', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambahData()
    {
        $data['title'] = 'Tambah Guru Mengajar';
        $data['kelas'] = $this->m_guru_mengajar->joinkelasjurusan()->result();
        $data['guru'] = $this->m_guru_mengajar->TampilGuru();
        $data['mapel'] = $this->m_guru_mengajar->TampilMapel();
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/tambahgurumengajar', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function simpanData()
    {
        $this->form_validation->set_rules('jam', 'Jam', 'required|trim', [
            'required' => 'Field tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->tambahData();
        } else {
            $nip = $this->input->post('nip');
            $mapel = $this->input->post('mapel');
            $kelas = $this->input->post('kelas');
            $jam = $this->input->post('jam');

            $data = [
                'nip' => $nip,
                'id_mapel' => $mapel,
                'id_jurusan' => $kelas,
                'jam' => $jam
            ];

            $simpan = $this->m_guru_mengajar->insert($data);

            if ($simpan) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
            } else {
                $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Data tidak berhasil ditambah</div>');
            }

            redirect('Admin/GuruMengajar');
        }
    }

    public function delete($id)
    {
        $delete = $this->m_guru_mengajar->delete($id);
        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data yang anda pilih telah terhapus</div>');
        } else {
            $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Tidak bisa hapus data</div>');
        }
        redirect('Admin/GuruMengajar');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Siswa';
        $data['kelas'] = $this->m_guru_mengajar->joinkelasjurusan()->result();
        $data['guru'] = $this->m_guru_mengajar->TampilGuru();
        $data['mapel'] = $this->m_guru_mengajar->TampilMapel();
        $data['edit'] = $this->m_guru_mengajar->detail_data($id)->row();
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/edit_gurumengajar', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function update()
    {
        $mengajar = $this->input->post('id');
        $mapel = $this->input->post('mapel');
        $kelas = $this->input->post('kelas');
        $jam = $this->input->post('jam');

        $data = [
            'id_mengajar' => $mengajar,
            'id_mapel' => $mapel,
            'id_jurusan' => $kelas,
            'jam' => $jam
        ];

        $save = $this->m_guru_mengajar->update($data, $mengajar);

        if ($save) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
        } else {
            $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Data tidak berhasil diubah</div>');
        }

        redirect('Admin/GuruMengajar', $save);
    }
}
