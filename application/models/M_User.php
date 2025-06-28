<?php
class M_User extends CI_Model {

    public function cek_login($email, $password) {
        return $this->db->get_where('tb_user', [
            'email' => $email,
            'password' => md5($password) // nanti bisa upgrade pakai bcrypt
        ])->row();
    }

    public function daftar_user($data) {
        return $this->db->insert('tb_user', $data);
    }

    public function cek_email($email) {
        return $this->db->get_where('tb_user', ['email' => $email])->num_rows();
    }
}
