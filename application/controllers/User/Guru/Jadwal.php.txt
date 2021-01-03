<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login_guru();
        cek_jumlah_keluar();
    }
    public function index()
    {
        $nip = $this->session->userdata('nip');

        $senin = "SELECT mata_pelajaran.mata_pelajaran, guru.nama, penjurusan.nama_jurusan, kelas.kelas, jadwal.hari, jadwal.waktu_mulai, jadwal.waktu_akhir
        FROM jadwal join mengajar on mengajar.id_mengajar = jadwal.id_mengajar 
        join guru on guru.nip = mengajar.nip join mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        join penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas 
        WHERE mengajar.nip=$nip and jadwal.hari='Senin' ORDER BY jadwal.waktu_mulai ASC";

        $selasa = "SELECT mata_pelajaran.mata_pelajaran, guru.nama, penjurusan.nama_jurusan, kelas.kelas, jadwal.hari, jadwal.waktu_mulai, jadwal.waktu_akhir
        FROM jadwal join mengajar on mengajar.id_mengajar = jadwal.id_mengajar 
        join guru on guru.nip = mengajar.nip join mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        join penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas 
        WHERE mengajar.nip=$nip and jadwal.hari='Selasa' ORDER BY jadwal.waktu_mulai ASC";

        $rabu = "SELECT mata_pelajaran.mata_pelajaran, guru.nama, penjurusan.nama_jurusan, kelas.kelas, jadwal.hari, jadwal.waktu_mulai, jadwal.waktu_akhir
        FROM jadwal join mengajar on mengajar.id_mengajar = jadwal.id_mengajar 
        join guru on guru.nip = mengajar.nip join mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        join penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas 
        WHERE mengajar.nip=$nip and jadwal.hari='Rabu' ORDER BY jadwal.waktu_mulai ASC";

        $kamis = "SELECT mata_pelajaran.mata_pelajaran, guru.nama, penjurusan.nama_jurusan, kelas.kelas, jadwal.hari, jadwal.waktu_mulai, jadwal.waktu_akhir
        FROM jadwal join mengajar on mengajar.id_mengajar = jadwal.id_mengajar 
        join guru on guru.nip = mengajar.nip join mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        join penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas 
        WHERE mengajar.nip=$nip and jadwal.hari='Kamis' ORDER BY jadwal.waktu_mulai ASC";

        $jumat = "SELECT mata_pelajaran.mata_pelajaran, guru.nama, penjurusan.nama_jurusan, kelas.kelas, jadwal.hari, jadwal.waktu_mulai, jadwal.waktu_akhir
        FROM jadwal join mengajar on mengajar.id_mengajar = jadwal.id_mengajar 
        join guru on guru.nip = mengajar.nip join mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        join penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas 
        WHERE mengajar.nip=$nip and jadwal.hari='Jumat' ORDER BY jadwal.waktu_mulai ASC";

        $sabtu = "SELECT mata_pelajaran.mata_pelajaran, guru.nama, penjurusan.nama_jurusan, kelas.kelas, jadwal.hari, jadwal.waktu_mulai, jadwal.waktu_akhir
        FROM jadwal join mengajar on mengajar.id_mengajar = jadwal.id_mengajar 
        join guru on guru.nip = mengajar.nip join mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
        join penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas 
        WHERE mengajar.nip=$nip and jadwal.hari='Sabtu' ORDER BY jadwal.waktu_mulai ASC";

        $data['title'] = 'Jadwal Mata Pelajaran';
        $data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['senin'] = $this->db->query($senin)->result();
        $data['selasa'] = $this->db->query($selasa)->result();
        $data['rabu'] = $this->db->query($rabu)->result();
        $data['kamis'] = $this->db->query($kamis)->result();
        $data['jumat'] = $this->db->query($jumat)->result();
        $data['sabtu'] = $this->db->query($sabtu)->result();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/jadwal');
        $this->load->view('users/templates/footer');
        $this->load->view('auto');
    }
}
