<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WaliKelas extends CI_Controller {

	public function index()
	{$data['title'] = 'Wali Kelas';
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navguru');
		$this->load->view('users/guru/wali_kelas');
		$this->load->view('users/templates/footer');
	}

}
