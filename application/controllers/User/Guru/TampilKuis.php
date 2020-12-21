<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TampilKuis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login_guru();
    }
    public function index()
    {
        $nip = $this->session->userdata('nip');
        $queryMengajar = "SELECT * FROM `mengajar`
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		JOIN guru ON guru.nip = mengajar.nip
		WHERE guru.nip = $nip";

        $ngambilabsen = "SELECT *, siswa.NAMA FROM `ikut_ujian`
        JOIN siswa ON siswa.nis = ikut_ujian.nis
        JOIN kuis ON kuis.id_kuis = ikut_ujian.id_kuis
        JOIN mengajar ON mengajar.id_mengajar = kuis.id_mengajar
        JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
        JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
        WHERE mengajar.nip = $nip 
		ORDER BY kuis.tanggal_berakhir ASC";

        $tanggal = "SELECT * FROM `absen_siswa` 
		JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar 
		WHERE mengajar.nip=$nip";
        $data['tanggal'] = $this->db->query($tanggal)->result();

        $data['title'] = 'Tampil Kuis';
        $data['mengajar'] = $this->db->query($queryMengajar)->result();
        $data['absensi'] = $this->db->query($ngambilabsen)->result();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/create_event/pilihanganda2');
        $this->load->view('users/templates/footer');
    }
}
