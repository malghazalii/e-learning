<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_absensi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		//cek_login_admin();
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

		$ngambilabsen = "SELECT *, siswa.nama as NAMA FROM `tr_absen_siswa` 
		JOIN siswa ON siswa.nis = tr_absen_siswa.nis
		JOIN absen_siswa on tr_absen_siswa.id_absen = absen_siswa.id_absen
		JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar
		JOIN guru ON guru.nip = mengajar.nip
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		WHERE guru.nip = $nip 
		ORDER BY absen_siswa.tanggal ASC";

		$data['title'] = 'Laporan Absen';
		$data['mengajar'] = $this->db->query($queryMengajar)->result();
		$data['absensi'] = $this->db->query($ngambilabsen)->result();

		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navguru');
		$this->load->view('users/guru/report_absensi');
		$this->load->view('users/templates/footer');
	}
	public function mengajar($id)
	{
		$nip = $this->session->userdata('nip');
		$queryMengajar = "SELECT * FROM `mengajar`
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		JOIN guru ON guru.nip = mengajar.nip
		WHERE guru.nip = $nip";

		$ngambilabsen = "SELECT *, siswa.nama as NAMA FROM `tr_absen_siswa` 
		JOIN siswa ON siswa.nis = tr_absen_siswa.nis
		JOIN absen_siswa on tr_absen_siswa.id_absen = absen_siswa.id_absen
		JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar
		JOIN guru ON guru.nip = mengajar.nip
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		WHERE mengajar.id_mengajar = $id 
		ORDER BY absen_siswa.tanggal ASC";

		$data['title'] = 'Laporan Absen';
		$data['mengajar'] = $this->db->query($queryMengajar)->result();
		$data['absensi'] = $this->db->query($ngambilabsen)->result();

		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navguru');
		$this->load->view('users/guru/report_absensi');
		$this->load->view('users/templates/footer');
	}
}
