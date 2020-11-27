<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_absensi extends CI_Controller {

	public function index()
	{$data['title'] = 'Laporan Absen';
		$this->load->view('users/templates/header', $data);
		$this->load->view('users/templates/navguru');
		$this->load->view('users/guru/report_absensi');
		$this->load->view('users/templates/footer');
	}

}
