<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Alat extends CI_Model {

    public function get_all() {
        return $this->db->get('tb_alat')->result();
    }

    public function get_alat_aktif() {
        return $this->db->get_where('tb_alat', ['status' => 'aktif'])->row();
    }

    public function insert($data) {
        return $this->db->insert('tb_alat', $data);
    }

    public function update_status($id, $status) {
        $this->db->update('tb_alat', ['status' => 'nonaktif']); // reset semua
        return $this->db->update('tb_alat', ['status' => $status], ['id' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('tb_alat', ['id' => $id]);
    }

    public function total_alat() {
        return $this->db->count_all('tb_alat');
    }
}
