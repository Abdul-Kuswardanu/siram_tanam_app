<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Sistem_Waktu extends CI_Model {

    public function get_all() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('tb_sistem_waktu')->result();
    }

    public function get_tanaman() {
        return $this->db->get('tb_tanaman')->result();
    }

    public function get_area() {
        $this->db->select('tb_area_tanaman.*, tb_tanaman.nama_tanaman');
        $this->db->from('tb_area_tanaman');
        $this->db->join('tb_tanaman', 'tb_area_tanaman.id_tanaman = tb_tanaman.id_tanaman');
        return $this->db->get()->result();
    }

    public function insert($data) {
        return $this->db->insert('tb_sistem_waktu', $data);
    }

    public function update_mode_status($id, $data) {
        return $this->db->where('id_jadwal', $id)->update('tb_sistem_waktu', $data);
    }

    public function delete($id) {
        return $this->db->where('id_jadwal', $id)->delete('tb_sistem_waktu');
    }
}
