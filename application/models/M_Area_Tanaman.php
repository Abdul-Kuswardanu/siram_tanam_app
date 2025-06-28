<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Area_Tanaman extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
        $this->db->select('tb_area_tanaman.*, tb_tanaman.nama_tanaman');
        $this->db->from('tb_area_tanaman');
        $this->db->join('tb_tanaman', 'tb_area_tanaman.id_tanaman = tb_tanaman.id_tanaman');
        return $this->db->get()->result();
    }

    public function get_tanaman() {
        return $this->db->get('tb_tanaman')->result();
    }

    public function insert($data) {
        return $this->db->insert('tb_area_tanaman', $data);
    }

    public function delete($id) {
        return $this->db->where('id_area', $id)->delete('tb_area_tanaman');
    }
}
