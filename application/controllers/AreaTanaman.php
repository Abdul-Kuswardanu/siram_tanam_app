<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AreaTanaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Area_Tanaman');
    }

    public function index() {
        $data['area'] = $this->M_Area_Tanaman->get_all();
        $data['tanaman'] = $this->M_Area_Tanaman->get_tanaman();
        $this->load->view('area_tanaman/area_tanaman', $data);
    }

    public function tambah() {
        $data = [
            'nama_area' => $this->input->post('nama_area'),
            'id_tanaman' => $this->input->post('id_tanaman'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => NULL
        ];
        $this->M_Area_Tanaman->insert($data);
        $this->session->set_flashdata('success', 'Area tanaman berhasil ditambahkan.');
        redirect('areatanaman');
    }

    public function hapus($id) {
        $this->M_Area_Tanaman->delete($id);
        $this->session->set_flashdata('success', 'Area tanaman berhasil dihapus.');
        redirect('areatanaman');
    }
}
