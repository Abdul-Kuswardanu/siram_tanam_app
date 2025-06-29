<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SmartSiram extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_Alat');
    }

    public function dashboard() {
        $data['alat'] = $this->M_Alat->get_all();
        $data['alat_aktif'] = $this->M_Alat->get_alat_aktif();
        $data['total_alat'] = $this->M_Alat->total_alat();

        $this->load->view('dashboard/dashboard', $data);
    }

    public function tambah_alat() {
        $data = [
            'nama_alat' => $this->input->post('nama_alat'),
            'kode_alat' => $this->input->post('kode_alat'),
            'status' => 'nonaktif'
        ];
        $this->M_Alat->insert($data);
        redirect('smartsiram/dashboard');
    }

    public function update_status(){
        
        $id = $this->input->post('id_alat');
        $status = $this->input->post('status');

        if (!$id || !$status) {
            // Kasih error handling biar gak nekat update
            show_error('ID atau status tidak valid');
        }

        // reset semua alat ke nonaktif dulu
        $this->db->update('tb_alat', ['status' => 'nonaktif']);

        // update alat yang dipilih jadi aktif/nonaktif
        $this->db->where('id_alat', $id)->update('tb_alat', ['status' => $status]);

        redirect('smartsiram/dashboard');
    }

    public function hapus_alat() {
        $id = $this->input->post('id_alat');
        $this->M_Alat->delete($id);
        redirect('smartsiram/dashboard');
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
