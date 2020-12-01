<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenilaianMapel extends CI_Controller {

	public function index()
	{$data['title'] = 'Penilaian Mata Pelajaran';
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/guru/wali_kelas/penilaianmapel');
		$this->load->view('users/templates/footer');
	}

}
