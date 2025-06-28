<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Tanaman');
    }

    public function index() {
        $data['tanaman'] = $this->M_Tanaman->get_all();
        $this->load->view('tanaman/tanaman', $data);
    }

    public function tambah() {
        $nama = $this->input->post('nama_tanaman');
        $jenis = $this->input->post('jenis');
        $lokasi = $this->input->post('lokasi');

        if (empty($nama) || empty($jenis) || empty($lokasi)) {
            $this->session->set_flashdata('error', 'Semua field harus diisi!');
            redirect('tanaman');
            return;
        }

        $data = [
            'nama_tanaman' => $nama,
            'jenis' => $jenis,
            'lokasi' => $lokasi,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => NULL
        ];
        
        $this->M_Tanaman->insert($data);
        $this->session->set_flashdata('success', 'Tanaman berhasil ditambahkan!');
        redirect('tanaman');
    }

    public function hapus($id) {
        if ($this->M_Tanaman->delete($id)) {
            $this->session->set_flashdata('success', 'Tanaman berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus tanaman.');
        }
        redirect('tanaman');
    }
}
