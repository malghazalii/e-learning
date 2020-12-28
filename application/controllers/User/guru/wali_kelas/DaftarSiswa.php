<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DaftarSiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login_guru();
	}
	public function index()
	{
		$nip = $this->session->userdata('nip');

		$querywalikelas = "SELECT * FROM wali_kelas join guru on wali_kelas.nip = guru.nip join penjurusan on wali_kelas.id_jurusan = penjurusan.id_jurusan join kelas on kelas.id_kelas = penjurusan.id_kelas
		WHERE wali_kelas.nip=$nip";

		$walikelas = $this->db->query($querywalikelas)->row();

		$querysiswa = "SELECT siswa.nama, siswa.nis FROM siswa join penjurusan on siswa.id_jurusan = penjurusan.id_jurusan
			WHERE siswa.id_jurusan=$walikelas->id_jurusan ORDER BY nama ASC";

		$sum = "SELECT COUNT(nis) AS jumlah FROM siswa WHERE id_jurusan=$walikelas->id_jurusan";



		$data['title'] = 'Daftar Siswa';
		$data['data'] = $this->db->get_where('guru', ['nip' => $this->session->userdata('nip')])->row_array();
		$data['sum'] = $this->db->query($sum)->row();
		$data['siswa'] = $this->db->query($querysiswa)->result();
		$data['walikelas'] = $this->db->query($querywalikelas)->row();
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navwali', $data);
		$this->load->view('users/guru/wali_kelas/daftarsiswa');
		$this->load->view('users/templates/footer');
	}
}
