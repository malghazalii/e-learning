<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_Guru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_absensi_guru');
        cek_login_admin();
    }

    public function index()
    {
        $data['title'] = 'Absensi Guru';
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['absen'] = $this->m_absensi_guru->TampilAbsen();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/absensi_guru', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('auto');
    }

    public function simpanData()
    { {
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim', [
                'required' => 'Field tidak boleh kosong'
            ]);

            if ($this->form_validation->run() == false) {
                $this->index();
            } else {
                $tanggal = $this->input->post('tanggal');
                $data = [
                    'tanggal_berakhir' => $tanggal,
                    //'is_active' => 1
                ];

                $simpan = $this->m_absensi_guru->insert($data);

                if ($simpan) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Absen berhasil diaktifkan</div>');
                } else {
                    $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Absen tidak berhasil di non aktifkan</div>');
                }

                redirect('Admin/Absensi_Guru');
            }
        }
    }

    public function update($id)
    {
        $data = [
            'tanggal_berakhir' => date('y-m-d H:i:s'),
            'is_active' => 0
        ];
        $simpan = $this->m_absensi_guru->update($data, $id);

        if ($simpan) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Absen berhasil di non aktifkan</div>');
        } else {
            $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Absen tidak berhasil di non aktifkan</div>');
        }

        redirect('Admin/Absensi_Guru');
    }

    public function delete($id)
    {
        $delete = $this->m_absensi_guru->delete($id);
        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data yang anda pilih telah terhapus</div>');
        } else {
            $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Tidak bisa hapus data</div>');
        }
        redirect('Admin/Absensi_Guru');
    }

    // public function update($id)
    // {
    //     $data = [
    //         'is_active' => 0
    //     ];

    //     $save = $this->m_absensi_guru->update($data, $id);

    //     if ($save) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
    //     } else {
    //         $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Data tidak berhasil diubah</div>');
    //     }

    //     redirect('Admin/Absensi_Guru', $save);
    // }
}
