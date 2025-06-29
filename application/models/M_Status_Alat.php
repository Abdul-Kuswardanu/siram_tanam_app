<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Status_Alat extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_status() {
        $status = $this->db->get('tb_status_alat')->row();
        if (!$status) {
            // Insert default jika belum ada
            $this->db->insert('tb_status_alat', ['status' => 'nonaktif']);
            return $this->db->get('tb_status_alat')->row();
        }
        return $status;
    }

    public function update_status($status) {
        return $this->db->update('tb_status_alat', ['status' => $status, 'updated_at' => date('Y-m-d H:i:s')], ['id' => 1]);
    }
}

