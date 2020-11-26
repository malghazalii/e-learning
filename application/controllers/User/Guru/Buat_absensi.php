<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buat_absensi extends CI_Controller {

	public function index()
	{$data['title'] = 'Buat Absen';
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navguru');
		$this->load->view('users/guru/create_absensi');
		$this->load->view('users/templates/footer');
	}

}
