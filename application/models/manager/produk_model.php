<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk_model extends CI_Model {

    private $table = 'tbl_produk';

    public function get_all()
    {
        $this->db->select('
            tbl_produk.*,
            tbl_kategori_produk.nama_kategori
        ');

        $this->db->from('tbl_produk');

        $this->db->join(
            'tbl_kategori_produk',
            'tbl_kategori_produk.id_kategori = tbl_produk.id_kategori',
            'left'
        );

        $this->db->order_by('tbl_produk.id_produk','DESC');

        return $this->db->get()->result();
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    public function get_by_id($id_produk)
    {
        return $this->db
            ->where('id_produk', $id_produk)
            ->get($this->table)
            ->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id_produk, $data)
    {
        return $this->db
            ->where('id_produk', $id_produk)
            ->update($this->table, $data);
    }

    public function delete($id_produk)
    {
        return $this->db
            ->where('id_produk', $id_produk)
            ->delete($this->table);
    }

    public function generate_kode_produk()
    {
        $this->db->select('RIGHT(kode_produk,3) as kode', FALSE);
        $this->db->order_by('id_produk', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('tbl_produk');

        if($query->num_rows() > 0){
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        }else{
            $kode = 1;
        }
        return 'PK' . str_pad($kode, 3, '0', STR_PAD_LEFT);
    }
}