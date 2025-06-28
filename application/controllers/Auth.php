<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function login() {
        $this->load->view('auth/login');
    }

    public function daftar() {
        $this->load->view('auth/daftar');
    }
}