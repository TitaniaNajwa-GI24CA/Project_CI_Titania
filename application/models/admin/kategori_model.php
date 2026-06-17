<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_model extends CI_Model {

    private $table = 'tbl_kategori_produk';

    public function get_all()
    {
        return $this->db
            ->order_by('id_kategori','DESC')
            ->get($this->table)
            ->result();
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    public function insert($data)
    {
        return $this->db->insert($this->table,$data);
    }

    public function update($id,$data)
    {
        return $this->db
            ->where('id_kategori',$id)
            ->update($this->table,$data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id_kategori',$id)
            ->delete($this->table);
    }

    public function get_kategori($limit, $start)
    {
        return $this->db
            ->limit($limit, $start)
            ->get('tbl_kategori_produk')
            ->result();
    }
}