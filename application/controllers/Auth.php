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

    public function guest()
    {
        $nama = $this->input->post('nama_pengguna') ?: 'Tamu';
        $no_hp = $this->input->post('nomor_hp') ?: '';
        $this->session->set_userdata([
            'nama' => $nama,
            'no_hp' => $no_hp,
            'is_guest' => true,
            'guest_start' => time(),
            'is_login' => false
        ]);
        redirect('dashboard');
    }

    public function guest_trial_expired() {
        $this->load->view('guest_trial_expired');
    }
}