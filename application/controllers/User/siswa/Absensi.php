<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login_siswa();
    }
    public function index()
    {
        $nis = $this->session->userdata('nis');

        $querytrabsen = "SELECT absen_siswa.tanggal_berakhir, guru.nama, mata_pelajaran.mata_pelajaran, tr_absen_siswa.status FROM 
        tr_absen_siswa JOIN absen_siswa ON tr_absen_siswa.id_absen = absen_siswa.id_absen JOIN mengajar ON mengajar.id_mengajar = 
        absen_siswa.id_mengajar JOIN guru ON guru.nip = mengajar.nip JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
        WHERE tr_absen_siswa.nis=$nis;";

        $queryabsen = "SELECT absen_siswa.id_absen, absen_siswa.tanggal_berakhir, guru.nama, mata_pelajaran.mata_pelajaran FROM 
        absen_siswa JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar JOIN guru ON guru.nip = 
        mengajar.nip JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel WHERE NOT EXISTS
        (SELECT * FROM tr_absen_siswa WHERE absen_siswa.id_absen=tr_absen_siswa.id_absen and tr_absen_siswa.nis=$nis) ";

        // $queryabsen = "SELECT *
        // FROM absen_guru
        // WHERE NOT EXISTS
        // (SELECT * FROM tr_absen_guru WHERE absen_guru.id_absen=tr_absen_guru.id_absen) ";

        $data['title'] = 'Absensi';
        $data['data'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['absen'] = $this->db->query($querytrabsen)->result();
        $data['tanggal'] = $this->db->query($queryabsen)->result();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/templates/navAbsensi');
        $this->load->view('users/siswa/absensi');
        $this->load->view('users/templates/footer');
    }

    public function status($id)
    {
        $nis = $this->session->userdata('nis');

        $queryabsen = "SELECT * FROM `absen_siswa` WHERE id_absen=$id";

        $data['title'] = 'Absensi';
        $data['data'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['tampil'] = $this->db->query($queryabsen)->row();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/siswa/aksi_absensi');
        $this->load->view('users/templates/footer');
    }

    public function simpanData()
    {
        $id_absen = $this->input->post('id_absen');
        $nis = $this->input->post('nis');
        $status = $this->input->post('status');

        $data = [
            'id_absen' => $id_absen,
            'nis' => $nis,
            'status' => $status
        ];

        $this->db->insert('tr_absen_siswa', $data);

        redirect('User/siswa/Absensi');
    }
}
