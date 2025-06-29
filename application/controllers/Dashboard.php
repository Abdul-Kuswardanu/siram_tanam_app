<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SmartSiram extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

        // Guest check
        if ($this->session->userdata('is_guest')) {
            $guest_start = $this->session->userdata('guest_start');
            $sisa_detik = (3 * 24 * 60 * 60) - (time() - $guest_start);
            if ($sisa_detik <= 0) {
                $this->session->sess_destroy();
                redirect('auth/daftar');
                exit;
            }
            // Simpan untuk dipakai di view
            $this->sisa_detik = $sisa_detik;
        }
        // Registered user check (opsional, biar aman)
        else if (!$this->session->userdata('is_login')) {
            redirect('auth/login');
            exit;
        }
    }

    public function tanaman_sistem_waktu()
    {
        $this->load->model('M_Tanaman');
        $this->load->model('M_Sistem_Waktu');

        $hari_ini = date('l'); // Misal: Saturday
        $jadwal = $this->M_Sistem_Waktu->get_all();

        $tanaman_diseram = [];

        foreach ($jadwal as $j) {
            if (
                $j->status === 'aktif' &&
                $j->golongan === 'tanaman' &&
                stripos($j->hari, $hari_ini) !== false
            ) {
                $tanaman = $this->M_Tanaman->get_by_id($j->target_id);
                if ($tanaman) {
                    $tanaman_diseram[] = (object)[
                        'nama_tanaman' => $tanaman->nama_tanaman,
                        'jam_mulai' => $j->jam_mulai
                    ];
                }
            }
        }

        $data['tanaman_diseram'] = $tanaman_diseram;

        // Optional: data alat buat card status alat
        $data['alat'] = $this->M_Smartsiram->get_alat(); // ganti sesuai model lu
        $data['alat_aktif'] = $this->M_Smartsiram->get_alat_aktif();
        $data['total_alat'] = count($data['alat']);

        // Load view dashboard
        $this->load->view('dashboard', $data);
    }

    public function get_by_id($id) {
        return $this->db->where('id_tanaman', $id)->get('tb_tanaman')->row();
    }
}
