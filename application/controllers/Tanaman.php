<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Tanaman');
        $this->load->library('session');

        // Proteksi: Harus login atau guest!
        if (!$this->session->userdata('is_login') && !$this->session->userdata('is_guest')) {
            redirect('auth/login');
            exit;
        }

        // Guest hanya boleh melihat, dilarang tambah/edit/hapus!
        $method = $this->router->fetch_method();
        $blocked_for_guest = ['tambah', 'edit', 'hapus', 'update', 'insert'];
        if ($this->session->userdata('is_guest') && in_array($method, $blocked_for_guest)) {
            $this->session->set_flashdata('error', 'Fitur ini hanya untuk user terdaftar.');
            redirect('tanaman');
            exit;
        }

        // Proteksi waktu trial guest (3 hari)
        if ($this->session->userdata('is_guest')) {
            $guest_start = $this->session->userdata('guest_start');
            $sisa_detik = (3 * 24 * 60 * 60) - (time() - $guest_start);
            if ($sisa_detik <= 0) {
                $this->session->sess_destroy();
                redirect('auth/guest_trial_expired');
                exit;
            }
            $this->sisa_detik = $sisa_detik;
        }
    }

    public function index()
    {
        $data['tanaman'] = $this->M_Tanaman->get_all();
        $data['sisa_detik'] = isset($this->sisa_detik) ? $this->sisa_detik : null;
        $this->load->view('tanaman', $data);
    }

    public function tambah()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $nama = $this->input->post('nama_tanaman');
            $jenis = $this->input->post('jenis');
            $lokasi = $this->input->post('lokasi');
            $data = [
                'nama_tanaman' => $nama,
                'jenis' => $jenis,
                'lokasi' => $lokasi
            ];
            $this->M_Tanaman->insert($data);
            $this->session->set_flashdata('success', 'Tanaman berhasil ditambahkan.');
            redirect('tanaman');
        } else {
            $this->load->view('tanaman_tambah');
        }
    }

    public function edit($id)
    {
        // ...
    }

    public function hapus($id)
    {
        $this->M_Tanaman->delete($id);
        $this->session->set_flashdata('success', 'Tanaman berhasil dihapus.');
        redirect('tanaman');
    }
}
