<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_users extends CI_Controller
{
    public function index()
    {
        $this->load->view('users/login');
    }
}
