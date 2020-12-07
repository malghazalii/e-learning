<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataabsengtt extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_dataabsengtt');
        //cek_login_admin();
    }

    public function index()
    {
        $queryabsenpns = "SELECT tr_absen_guru.id_absen, tr_absen_guru.nip, golongan.id_gol, guru.nama, tr_absen_guru.status, absen_guru.tanggal_berakhir, golongan.nama_golongan 
    FROM `tr_absen_guru` JOIN absen_guru ON absen_guru.id_absen=tr_absen_guru.id_absen 
    JOIN guru ON guru.nip=tr_absen_guru.nip 
    JOIN golongan ON guru.id_gol=golongan.id_gol WHERE golongan.id_gol = '2'";
        $data['title'] = 'Data Absen Guru GTT';
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['absen'] = $this->db->query($queryabsenpns)->result();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/dataabsengtt', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function detail($id, $gol)
    {
        $queryabsenpns = "SELECT tr_absen_guru.id_absen, tr_absen_guru.nip, golongan.id_gol, guru.nama, tr_absen_guru.status, absen_guru.tanggal_berakhir, golongan.nama_golongan 
    FROM `tr_absen_guru` JOIN absen_guru ON absen_guru.id_absen=tr_absen_guru.id_absen 
    JOIN guru ON guru.nip=tr_absen_guru.nip 
    JOIN golongan ON guru.id_gol=golongan.id_gol WHERE tr_absen_guru.id_absen = $id AND golongan.id_gol = $gol";
        $data['title'] = 'Detail Data Absen Guru GTT';
        $data['data'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['detail'] = $this->db->query($queryabsenpns)->result();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/readdataabsengtt', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_absen', $id)->delete('tr_absen_guru');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data yang anda pilih telah terhapus</div>');
        redirect('Admin/Dataabsengtt');
    }
}
