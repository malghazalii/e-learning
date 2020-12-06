<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarSiswa extends CI_Controller {

	public function index()
	{$data['title'] = 'Daftar Siswa';
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navwali', $data);
		$this->load->view('users/guru/wali_kelas/daftarsiswa');
		$this->load->view('users/templates/footer');
	}

}
