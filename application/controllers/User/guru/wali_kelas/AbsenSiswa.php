<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AbsenSiswa extends CI_Controller {

	public function index()
	{$data['title'] = 'Absen Siswa';
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/guru/wali_kelas/absensiswa');
		$this->load->view('users/templates/footer');
	}

}
