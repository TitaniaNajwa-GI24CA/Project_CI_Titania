<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order_model extends CI_Model {

    private $table = 'tbl_order';

    public function get_all()
    {
        $this->db->select('
            tbl_order.*,
            tbl_pelanggan.nama_pelanggan,
            tbl_sales.nama_sales
        ');

        $this->db->from('tbl_order');

        $this->db->join(
            'tbl_pelanggan',
            'tbl_pelanggan.id_pelanggan = tbl_order.id_pelanggan',
            'left'
        );

        $this->db->join(
            'tbl_sales',
            'tbl_sales.id_sales = tbl_order.id_sales',
            'left'
        );

        $this->db->order_by('id_order','DESC');

        return $this->db->get()->result();
    }

    public function get_by_id($id_order)
    {
        return $this->db
            ->where('id_order',$id_order)
            ->get($this->table)
            ->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table,$data);
    }

    public function update($id_order,$data)
    {
        $this->db->where('id_order',$id_order);
        return $this->db->update($this->table,$data);
    }

    public function delete($id_order)
    {
        $this->db->where('id_order',$id_order);
        return $this->db->delete($this->table);
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    public function generate_kode_order()
    {
        do{

            $kode = 'ODR-' .
                    strtoupper(
                        substr(
                            md5(uniqid(rand(), true)),
                            0,
                            6
                        )
                    );

            $cek = $this->db
                ->where('kode_order',$kode)
                ->count_all_results('tbl_order');

        }while($cek > 0);

        return $kode;
    }

}