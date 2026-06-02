<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth_model extends CI_Model {

    public function cek_username($username)
    {
        return $this->db->get_where('tbl_users', [
            'username' => $username
        ])->row();
    }

    public function insert_user($data)
    {
        $this->db->insert('tbl_users', $data);
        return $this->db->insert_id();
    }

    public function insert_sales($data)
    {
        return $this->db->insert('tbl_sales', $data);
    }

    public function generate_kode_sales()
    {
        do {
            $kode = 'S' . rand(10000, 99999);

            $cek = $this->db->get_where('tbl_sales', [
                'kode_sales' => $kode
            ])->row();

        } while ($cek);

        return $kode;
    }

    public function cek_login($username)
    {
        return $this->db->get_where('tbl_users', [
            'username' => $username,
            'status'   => 'aktif'
        ])->row();
    }

    public function update_last_login($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->update('tbl_users', [
            'last_login' => date('Y-m-d H:i:s')
        ]);
    }
}