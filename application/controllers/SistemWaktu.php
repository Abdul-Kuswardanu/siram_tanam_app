<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SistemWaktu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Sistem_Waktu');
    }

    public function index() {
        $data['jadwal'] = $this->M_Sistem_Waktu->get_all();
        $data['tanaman'] = $this->M_Sistem_Waktu->get_tanaman();
        $data['area'] = $this->M_Sistem_Waktu->get_area();
        $this->load->view('sistem_waktu/sistem_waktu', $data);
    }

    public function tambah() {
        $data = [
            'golongan' => $this->input->post('golongan'),
            'target_id' => $this->input->post('target_id'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesai' => $this->input->post('jam_selesai'),
            'hari' => $this->input->post('hari'),
            'mode' => $this->input->post('mode'),
            'status' => $this->input->post('status'),
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->M_Sistem_Waktu->insert($data);
        $this->session->set_flashdata('success', 'Jadwal berhasil ditambahkan.');
        redirect('sistemwaktu');
    }

    public function edit($id) {
        $data = [
            'mode' => $this->input->post('mode'),
            'status' => $this->input->post('status'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->M_Sistem_Waktu->update_mode_status($id, $data);
        $this->session->set_flashdata('success', 'Jadwal berhasil diperbarui.');
        redirect('sistemwaktu');
    }

    public function hapus($id) {
        $this->M_Sistem_Waktu->delete($id);
        $this->session->set_flashdata('success', 'Jadwal berhasil dihapus.');
        redirect('sistemwaktu');
    }
}
