<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenilaianMapel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login_guru();
	}
	public function index()
	{
		$data['title'] = 'Penilaian Mata Pelajaran';
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navwali', $data);
		$this->load->view('users/guru/wali_kelas/penilaianmapel');
		$this->load->view('users/templates/footer');
	}

	public function mapeltugas($id)
	{
		$nip = $this->session->userdata('nip');

		$querywalikelas = "SELECT * FROM wali_kelas join guru on wali_kelas.nip = guru.nip join penjurusan on wali_kelas.id_jurusan = penjurusan.id_jurusan join kelas on kelas.id_kelas = penjurusan.id_kelas
		WHERE wali_kelas.nip=$nip";
		$walikelas = $this->db->query($querywalikelas)->row();

		$querysiswa = "SELECT siswa.nama, siswa.nis FROM siswa join penjurusan on siswa.id_jurusan = penjurusan.id_jurusan
		WHERE siswa.id_jurusan=$walikelas->id_jurusan";

		$sum = "SELECT COUNT(nis) AS jumlah FROM siswa WHERE id_jurusan=$walikelas->id_jurusan";

		$querymapel = "SELECT * FROM mengajar JOIN guru on guru.nip = mengajar.nip 
		JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_mengajar=$id";


		$jawabantugas = "SELECT *, tugas_siswa.nama as NAMA FROM jawaban_tugas JOIN tugas_siswa on tugas_siswa.id_tugas = jawaban_tugas.id_tugas 
		JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar JOIN siswa on siswa.nis = jawaban_tugas.nis WHERE tugas_siswa.id_mengajar=$id";

		$data['title'] = 'Penilaian Mata Pelajaran';
		$data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
		$data['sum'] = $this->db->query($sum)->row();
		$data['siswa'] = $this->db->query($jawabantugas)->result();
		$data['siswarow'] = $this->db->query($querymapel)->row();
		$data['walikelas'] = $this->db->query($querywalikelas)->row();
		$data['mapel'] = $this->db->query($querymapel)->row();
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navwali', $data);
		$this->load->view('users/guru/wali_kelas/penilaianmapel');
		$this->load->view('users/templates/footer');
		// $this->load->view('auto');
	}

	public function tanggaltugas($id)
	{
		$tanggal = $this->input->post('tanggal');
		$nip = $this->session->userdata('nip');

		$querywalikelas = "SELECT * FROM wali_kelas join guru on wali_kelas.nip = guru.nip join penjurusan on wali_kelas.id_jurusan = penjurusan.id_jurusan join kelas on kelas.id_kelas = penjurusan.id_kelas
		WHERE wali_kelas.nip=$nip";
		$walikelas = $this->db->query($querywalikelas)->row();

		$querysiswa = "SELECT siswa.nama, siswa.nis FROM siswa join penjurusan on siswa.id_jurusan = penjurusan.id_jurusan
		WHERE siswa.id_jurusan=$walikelas->id_jurusan";

		$sum = "SELECT COUNT(nis) AS jumlah FROM siswa WHERE id_jurusan=$walikelas->id_jurusan";

		$querymapel = "SELECT * FROM mengajar JOIN guru on guru.nip = mengajar.nip 
		JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_mengajar=$id";


		$jawabantugas = "SELECT *, tugas_siswa.nama as NAMA FROM jawaban_tugas JOIN tugas_siswa on tugas_siswa.id_tugas = jawaban_tugas.id_tugas 
		JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar JOIN siswa on siswa.nis = jawaban_tugas.nis 
		WHERE tugas_siswa.tanggal_berakhir LIKE  '%$tanggal%' and tugas_siswa.id_mengajar=$id";

		$data['title'] = 'Penilaian Mata Pelajaran';
		$data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
		$data['sum'] = $this->db->query($sum)->row();
		$data['siswa'] = $this->db->query($jawabantugas)->result();
		$data['siswarow'] = $this->db->query($querymapel)->row();
		$data['walikelas'] = $this->db->query($querywalikelas)->row();
		$data['mapel'] = $this->db->query($querymapel)->row();
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navwali', $data);
		$this->load->view('users/guru/wali_kelas/penilaianmapel');
		$this->load->view('users/templates/footer');
	}

	public function mapelkuis($id)
	{
		$nip = $this->session->userdata('nip');

		$querywalikelas = "SELECT * FROM wali_kelas join guru on wali_kelas.nip = guru.nip join penjurusan on wali_kelas.id_jurusan = penjurusan.id_jurusan join kelas on kelas.id_kelas = penjurusan.id_kelas
		WHERE wali_kelas.nip=$nip";
		$walikelas = $this->db->query($querywalikelas)->row();

		$sum = "SELECT COUNT(nis) AS jumlah FROM siswa WHERE id_jurusan=$walikelas->id_jurusan";

		$querymapel = "SELECT * FROM mengajar JOIN guru on guru.nip = mengajar.nip 
		JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_mengajar=$id";

		$ikutujian = "SELECT * FROM ikut_ujian JOIN siswa on siswa.nis = ikut_ujian.nis 
		JOIN kuis on kuis.id_kuis = ikut_ujian.id_kuis JOIN mengajar on mengajar.id_mengajar = kuis.id_mengajar WHERE kuis.id_mengajar=$id";

		$jawabantugas = "SELECT *, tugas_siswa.nama as NAMA FROM jawaban_tugas JOIN tugas_siswa on tugas_siswa.id_tugas = jawaban_tugas.id_tugas 
		JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar JOIN siswa on siswa.nis = jawaban_tugas.nis WHERE tugas_siswa.id_mengajar=$id";

		$data['title'] = 'Penilaian Mata Pelajaran';
		$data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
		$data['sum'] = $this->db->query($sum)->row();
		$data['siswa'] = $this->db->query($jawabantugas)->result();
		$data['kuis'] = $this->db->query($ikutujian)->result();
		$data['siswarow'] = $this->db->query($querymapel)->row();
		$data['walikelas'] = $this->db->query($querywalikelas)->row();
		$data['mapel'] = $this->db->query($querymapel)->row();
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navwali', $data);
		$this->load->view('users/guru/wali_kelas/penilaianmapel1');
		$this->load->view('users/templates/footer');
	}

	public function tanggalkuis($id)
	{
		$tanggal = $this->input->post('tanggal');
		$nip = $this->session->userdata('nip');

		$querywalikelas = "SELECT * FROM wali_kelas join guru on wali_kelas.nip = guru.nip join penjurusan on wali_kelas.id_jurusan = penjurusan.id_jurusan join kelas on kelas.id_kelas = penjurusan.id_kelas
		WHERE wali_kelas.nip=$nip";
		$walikelas = $this->db->query($querywalikelas)->row();

		$querysiswa = "SELECT siswa.nama, siswa.nis FROM siswa join penjurusan on siswa.id_jurusan = penjurusan.id_jurusan
		WHERE siswa.id_jurusan=$walikelas->id_jurusan";

		$sum = "SELECT COUNT(nis) AS jumlah FROM siswa WHERE id_jurusan=$walikelas->id_jurusan";

		$querymapel = "SELECT * FROM mengajar JOIN guru on guru.nip = mengajar.nip 
		JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_mengajar=$id";


		$jawabantugas = "SELECT *, tugas_siswa.nama as NAMA FROM jawaban_tugas JOIN tugas_siswa on tugas_siswa.id_tugas = jawaban_tugas.id_tugas 
		JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar JOIN siswa on siswa.nis = jawaban_tugas.nis 
		WHERE tugas_siswa.tanggal_berakhir LIKE  '%$tanggal%' and tugas_siswa.id_mengajar=$id";

		$ikutujian = "SELECT * FROM ikut_ujian JOIN siswa on siswa.nis = ikut_ujian.nis 
		JOIN kuis on kuis.id_kuis = ikut_ujian.id_kuis JOIN mengajar on mengajar.id_mengajar = kuis.id_mengajar WHERE kuis.tanggal_berakhir LIKE '%$tanggal%' and kuis.id_mengajar=$id";

		$data['title'] = 'Penilaian Mata Pelajaran';
		$data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
		$data['sum'] = $this->db->query($sum)->row();
		$data['siswa'] = $this->db->query($jawabantugas)->result();
		$data['kuis'] = $this->db->query($ikutujian)->result();
		$data['siswarow'] = $this->db->query($querymapel)->row();
		$data['walikelas'] = $this->db->query($querywalikelas)->row();
		$data['mapel'] = $this->db->query($querymapel)->row();
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navwali', $data);
		$this->load->view('users/guru/wali_kelas/penilaianmapel1');
		$this->load->view('users/templates/footer');
	}
}
