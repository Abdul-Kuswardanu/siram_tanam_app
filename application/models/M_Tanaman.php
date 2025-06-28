<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tanaman extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
        return $this->db->get('tb_tanaman')->result();
    }

    public function insert($data) {
        return $this->db->insert('tb_tanaman', $data);
    }

    public function delete($id) {
        return $this->db->where('id_tanaman', $id)->delete('tb_tanaman');
    }
}
