<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login_guru();
    }
    public function index()
    {
        $data['title'] = 'Mata Pelajaran';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/mapel');
        $this->load->view('users/templates/footer');
    }

    public function getMapel($id)
    {
        $nip = $this->session->userdata('nip');

        $querytugas = "SELECT *, tugas_siswa.nama as NAMA, tugas_siswa.tanggal_berakhir as TANGGAL FROM tugas_siswa JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_mengajar = $id  ORDER BY tugas_siswa.id_tugas DESC";

        $querymateri = "SELECT * FROM materi JOIN mengajar on mengajar.id_mengajar = materi.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_mengajar = $id ORDER BY materi.id_materi DESC";

        $querykuis = "SELECT * FROM kuis JOIN mengajar on mengajar.id_mengajar = kuis.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_mengajar = $id ORDER BY kuis.id_kuis DESC";

        $data['title'] = "Mata Pelajaran";
        $data['tugas'] = $this->db->query($querytugas)->result();
        $data['kuis'] = $this->db->query($querykuis)->result();
        $data['materi'] = $this->db->query($querymateri)->result();
        $data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/mapel');
        $this->load->view('users/templates/footer');
    }

    public function indexid($id)
    {
        force_download('assets/users/upload/' . $id, NULL);
    }
}
