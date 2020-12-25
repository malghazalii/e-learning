<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MataPelajaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login_siswa();
    }
    public function index()
    {
        $data['title'] = 'Mata Pelajaran';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/matapelajaran');
        $this->load->view('users/templates/footer');
    }

    public function getMapel($id)
    {
        $nis = $this->session->userdata('nis');

        $querysiswa = "SELECT * FROM siswa JOIN penjurusan on penjurusan.id_jurusan = siswa.id_jurusan 
        JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE siswa.nis=$nis";
        $siswa = $this->db->query($querysiswa)->row();

        $querymapel = "SELECT * FROM mengajar JOIN guru on guru.nip = mengajar.nip 
        JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan 
        JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_mengajar=$id";

        $absen = "SELECT * FROM absen_siswa WHERE absen_siswa.id_mengajar=$id";

        $querytugas = "SELECT *, tugas_siswa.nama as NAMA, tugas_siswa.tanggal_berakhir as TANGGAL FROM tugas_siswa JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_mengajar = $id  ORDER BY tugas_siswa.id_tugas DESC";
        $tugass = $this->db->query($querytugas)->row();

        $jawabantugas = "SELECT * FROM jawaban_tugas JOIN tugas_siswa on tugas_siswa.id_tugas = jawaban_tugas.id_tugas 
        JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas 
        JOIN siswa on siswa.nis = jawaban_tugas.nis WHERE jawaban_tugas.nis=$nis and jawaban_tugas.id_tugas=$tugass->id_tugas";

        $querymateri = "SELECT * FROM materi JOIN mengajar on mengajar.id_mengajar = materi.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_mengajar = $id ORDER BY materi.id_materi DESC";

        $querykuis = "SELECT * FROM kuis JOIN mengajar on mengajar.id_mengajar = kuis.id_mengajar 
        JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_mengajar = $id ORDER BY kuis.id_kuis DESC";

        $data['title'] = "Mata Pelajaran";
        $data['data'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['mapel'] = $this->db->query($querymapel)->row();
        $data['absensi'] = $this->db->query($absen)->result();
        $data['tugas'] = $this->db->query($querytugas)->result();
        $data['jawaban'] = $this->db->query($jawabantugas)->row();
        $data['kuis'] = $this->db->query($querykuis)->result();
        $data['materi'] = $this->db->query($querymateri)->result();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navsiswa');
        $this->load->view('users/siswa/matapelajaran');
        $this->load->view('users/templates/footer');
    }

    public function indexid($id)
    {
        force_download('assets/users/upload/' . $id, NULL);
    }
}
