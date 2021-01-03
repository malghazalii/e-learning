<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AbsenSiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login_guru();
		cek_jumlah_keluar();
	}

	public function index()
	{
		$nip = $this->session->userdata('nip');
		$querywalikelas = "SELECT * FROM wali_kelas join guru on wali_kelas.nip = guru.nip join penjurusan on wali_kelas.id_jurusan = penjurusan.id_jurusan join kelas on kelas.id_kelas = penjurusan.id_kelas
		WHERE wali_kelas.nip=$nip";

		$walikelas = $this->db->query($querywalikelas)->row();

		$queryMengajar = "SELECT * FROM `mengajar`
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		JOIN guru ON guru.nip = mengajar.nip
		WHERE mengajar.id_jurusan = $walikelas->id_jurusan";


		$ngambilabsen = "SELECT *, siswa.nama as NAMA FROM `tr_absen_siswa` 
		JOIN siswa ON siswa.nis = tr_absen_siswa.nis
		JOIN absen_siswa on tr_absen_siswa.id_absen = absen_siswa.id_absen
		JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar
		JOIN guru ON guru.nip = mengajar.nip
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		WHERE mengajar.id_jurusan = $walikelas->id_jurusan
		ORDER BY absen_siswa.tanggal ASC";

		$tanggal = "SELECT * FROM `absen_siswa` 
		JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar 
		WHERE mengajar.id_jurusan=$walikelas->id_jurusan";
		$data['tanggal'] = $this->db->query($tanggal)->result();

		$sum = "SELECT COUNT(nis) AS jumlah FROM siswa WHERE id_jurusan=$walikelas->id_jurusan";


		$data['mengajar'] = $this->db->query($queryMengajar)->result();
		$data['title'] = 'Absen Siswa';
		$data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
		$data['sum'] = $this->db->query($sum)->row();
		$data['siswa'] = $this->db->query($ngambilabsen)->result();
		$data['walikelas'] = $this->db->query($querywalikelas)->row();
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navwali', $data);
		$this->load->view('users/guru/wali_kelas/absensiswa');
		$this->load->view('users/templates/footer');
		$this->load->view('auto');
	}
	public function Mapel($id)
	{
		$nip = $this->session->userdata('nip');
		$querywalikelas = "SELECT * FROM wali_kelas join guru on wali_kelas.nip = guru.nip join penjurusan on wali_kelas.id_jurusan = penjurusan.id_jurusan join kelas on kelas.id_kelas = penjurusan.id_kelas
		WHERE wali_kelas.nip=$nip";

		$walikelas = $this->db->query($querywalikelas)->row();

		$queryMengajar = "SELECT * FROM `mengajar`
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		JOIN guru ON guru.nip = mengajar.nip
		WHERE mengajar.id_jurusan = $walikelas->id_jurusan";

		$idtanggal = "SELECT * FROM `mengajar`
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		JOIN guru ON guru.nip = mengajar.nip
		WHERE mengajar.id_jurusan = $walikelas->id_jurusan and mengajar.id_mengajar=$id";

		$ngambilabsen = "SELECT *, siswa.nama as NAMA FROM `tr_absen_siswa` 
		JOIN siswa ON siswa.nis = tr_absen_siswa.nis
		JOIN absen_siswa on tr_absen_siswa.id_absen = absen_siswa.id_absen
		JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar
		JOIN guru ON guru.nip = mengajar.nip
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		WHERE mengajar.id_jurusan = $walikelas->id_jurusan
    AND mengajar.id_mengajar = $id
		ORDER BY absen_siswa.tanggal ASC";

		$tanggal = "SELECT * FROM `absen_siswa` 
		JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar 
		WHERE mengajar.id_jurusan=$walikelas->id_jurusan
		AND mengajar.id_mengajar = $id";
		$data['tanggal'] = $this->db->query($tanggal)->result();

		$sum = "SELECT COUNT(nis) AS jumlah FROM siswa WHERE id_jurusan=$walikelas->id_jurusan";


		$data['mengajar'] = $this->db->query($queryMengajar)->result();
		$data['title'] = 'Absen Siswa';
		$data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
		$data['sum'] = $this->db->query($sum)->row();
		$data['siswa'] = $this->db->query($ngambilabsen)->result();
		$data['mapel'] = $this->db->query($idtanggal)->row();
		$data['walikelas'] = $this->db->query($querywalikelas)->row();
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navwali', $data);
		$this->load->view('users/guru/wali_kelas/absensiswa1');
		$this->load->view('users/templates/footer');
	}
	public function tanggal()
	{
		$tanggal = $this->input->post('tanggal');
		$nip = $this->session->userdata('nip');
		$querywalikelas = "SELECT * FROM wali_kelas join guru on wali_kelas.nip = guru.nip join penjurusan on wali_kelas.id_jurusan = penjurusan.id_jurusan join kelas on kelas.id_kelas = penjurusan.id_kelas
		WHERE wali_kelas.nip=$nip";

		$walikelas = $this->db->query($querywalikelas)->row();

		$queryMengajar = "SELECT * FROM `mengajar`
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		JOIN guru ON guru.nip = mengajar.nip
		WHERE mengajar.id_jurusan = $walikelas->id_jurusan";


		$ngambilabsen = "SELECT *, siswa.nama as NAMA FROM `tr_absen_siswa` 
		JOIN siswa ON siswa.nis = tr_absen_siswa.nis
		JOIN absen_siswa on tr_absen_siswa.id_absen = absen_siswa.id_absen
		JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar
		JOIN guru ON guru.nip = mengajar.nip
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		WHERE mengajar.id_jurusan = $walikelas->id_jurusan
		AND absen_siswa.tanggal LIKE  '%$tanggal%'
		ORDER BY siswa.nama ASC";

		$tanggal = "SELECT * FROM `absen_siswa` 
		JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar 
		WHERE mengajar.id_jurusan=$walikelas->id_jurusan";
		$data['tanggal'] = $this->db->query($tanggal)->result();

		$sum = "SELECT COUNT(nis) AS jumlah FROM siswa WHERE id_jurusan=$walikelas->id_jurusan";


		$data['mengajar'] = $this->db->query($queryMengajar)->result();
		$data['title'] = 'Absen Siswa';
		$data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
		$data['sum'] = $this->db->query($sum)->row();
		$data['siswa'] = $this->db->query($ngambilabsen)->result();
		$data['walikelas'] = $this->db->query($querywalikelas)->row();
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navwali', $data);
		$this->load->view('users/guru/wali_kelas/absensiswa');
		$this->load->view('users/templates/footer');
	}

	public function tanggalmapel($id)
	{
		$tanggal = $this->input->post('tanggal');
		$nip = $this->session->userdata('nip');
		$querywalikelas = "SELECT * FROM wali_kelas join guru on wali_kelas.nip = guru.nip join penjurusan on wali_kelas.id_jurusan = penjurusan.id_jurusan join kelas on kelas.id_kelas = penjurusan.id_kelas
		WHERE wali_kelas.nip=$nip";

		$walikelas = $this->db->query($querywalikelas)->row();

		$queryMengajar = "SELECT * FROM `mengajar`
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		JOIN guru ON guru.nip = mengajar.nip
		WHERE mengajar.id_jurusan = $walikelas->id_jurusan";

		$idtanggal = "SELECT * FROM `mengajar`
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		JOIN guru ON guru.nip = mengajar.nip
		WHERE mengajar.id_jurusan = $walikelas->id_jurusan and mengajar.id_mengajar=$id";

		$ngambilabsen = "SELECT *, siswa.nama as NAMA FROM `tr_absen_siswa` 
		JOIN siswa ON siswa.nis = tr_absen_siswa.nis
		JOIN absen_siswa on tr_absen_siswa.id_absen = absen_siswa.id_absen
		JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar
		JOIN guru ON guru.nip = mengajar.nip
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		WHERE mengajar.id_jurusan = $walikelas->id_jurusan
    AND mengajar.id_mengajar = $id AND absen_siswa.tanggal LIKE  '%$tanggal%'
		ORDER BY absen_siswa.tanggal ASC";

		$tanggal = "SELECT * FROM `absen_siswa` 
		JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar 
		WHERE mengajar.id_jurusan=$walikelas->id_jurusan
		AND mengajar.id_mengajar = $id";
		$data['tanggal'] = $this->db->query($tanggal)->result();

		$sum = "SELECT COUNT(nis) AS jumlah FROM siswa WHERE id_jurusan=$walikelas->id_jurusan";


		$data['mengajar'] = $this->db->query($queryMengajar)->result();
		$data['title'] = 'Absen Siswa';
		$data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
		$data['sum'] = $this->db->query($sum)->row();
		$data['siswa'] = $this->db->query($ngambilabsen)->result();
		$data['mapel'] = $this->db->query($idtanggal)->row();
		$data['walikelas'] = $this->db->query($querywalikelas)->row();
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navwali', $data);
		$this->load->view('users/guru/wali_kelas/absensiswa1');
		$this->load->view('users/templates/footer');
	}
}
