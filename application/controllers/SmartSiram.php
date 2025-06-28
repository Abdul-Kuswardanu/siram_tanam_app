<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SmartSiram extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function dashboard() {
        $this->load->view('dashboard/dashboard');
    }

    public function sistem_waktu() {
        $this->load->model('M_Tanaman');
        $this->load->model('M_Area_Tanaman');

        $data['tanaman'] = $this->M_Tanaman->get_all();
        $data['area'] = $this->M_Area_Tanaman->get_all();
        
        $this->load->view('sistem_waktu/sistem_waktu', $data);
    }

    public function tanaman() {
        $this->load->model('M_Tanaman');
        $data['tanaman'] = $this->M_Tanaman->get_all();
        $this->load->view('tanaman/tanaman', $data);
    }

    public function area_tanaman() {
        $this->load->model('M_Area_Tanaman');
        $data['area'] = $this->M_Area_Tanaman->get_all();        
        $data['tanaman'] = $this->M_Area_Tanaman->get_tanaman(); 
        $this->load->view('area_tanaman/area_tanaman', $data);           
    }

    public function akun_lokal() {
        $this->load->view('akun_lokal/akun_lokal');
    }

    public function login() {
        $this->load->view('auth/login');
    }
    public function daftar() {
        $this->load->view('auth/daftar');
    }
}
