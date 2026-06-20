<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan_model extends CI_Model {

    private $table = 'tbl_pelanggan';

    public function get_all()
    {
        return $this->db
            ->order_by('id_pelanggan','DESC')
            ->get($this->table)
            ->result();
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    public function insert($data)
    {
        return $this->db
            ->insert($this->table,$data);
    }

    public function update($id,$data)
    {
        return $this->db
            ->where('id_pelanggan',$id)
            ->update($this->table,$data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id_pelanggan',$id)
            ->delete($this->table);
    }

    public function generate_kode_pelanggan()
    {
        $this->db->select('RIGHT(kode_pelanggan,3) as nomor', FALSE);
        $this->db->order_by('kode_pelanggan','DESC');
        $this->db->limit(1);

        $query = $this->db->get('tbl_pelanggan');

        if($query->num_rows() > 0){
            $data = $query->row();
            $nomor = intval($data->nomor) + 1;
        } else {
            $nomor = 1;
        }

        return 'PG' . str_pad($nomor, 3, '0', STR_PAD_LEFT);
    }
}