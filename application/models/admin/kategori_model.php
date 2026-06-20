<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_model extends CI_Model {

    private $table = 'tbl_kategori_produk';

    public function get_all()
    {
        return $this->db
            ->order_by('id_kategori','ASC')
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

    public function update($id_kategori,$data)
    {
        return $this->db
            ->where('id_kategori',$id_kategori)
            ->update($this->table,$data);
    }

    public function delete($id_kategori)
    {
        return $this->db
            ->where('id_kategori',$id_kategori)
            ->delete($this->table);
    }

    public function get_kategori($limit, $start)
    {
        return $this->db
            ->limit($limit, $start)
            ->get('tbl_kategori_produk')
            ->result();
    }

    public function generate_kode_kategori()
    {
        $this->db->select('RIGHT(kode_kategori,3) as kode', FALSE);
        $this->db->order_by('id_kategori', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('tbl_kategori_produk');

        if($query->num_rows() > 0){
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        }else{
            $kode = 1;
        }

        return 'KTG' . str_pad($kode, 3, '0', STR_PAD_LEFT);
    }
}