<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sales_model extends CI_Model {

    private $table = 'tbl_sales';

    public function get_all()
    {
        $this->db->select("
            tbl_sales.*,
            COUNT(tbl_order.id_order)
            AS total_penjualan
        ");

        $this->db->from('tbl_sales');

        $this->db->join(
            'tbl_order',
            'tbl_order.id_sales = tbl_sales.id_sales',
            'left'
        );

        $this->db->group_by(
            'tbl_sales.id_sales'
        );

        return $this->db->get()->result();
    }

    public function get_by_id($id_sales)
    {
        return $this->db
            ->get_where(
                $this->table,
                ['id_sales' => $id_sales]
            )
            ->row();
    }

    public function insert($data)
    {
        return $this->db->insert(
            $this->table,
            $data
        );
    }

    public function update($id_sales,$data)
    {
        $this->db->where(
            'id_sales',
            $id_sales
        );

        return $this->db->update(
            $this->table,
            $data
        );
    }

    public function delete($id_sales)
    {
        $this->db->where(
            'id_sales',
            $id_sales
        );

        return $this->db->delete(
            $this->table
        );
    }

    public function count_all()
    {
        return $this->db
            ->count_all($this->table);
    }

    public function generate_kode()
    {
        $this->db->select_max('id_sales');

        $query =
            $this->db->get($this->table);

        $row =
            $query->row();

        $urutan =
            ($row->id_sales ?? 0) + 1;

        return 'SL' .
            str_pad(
                $urutan,
                3,
                '0',
                STR_PAD_LEFT
            );
    }
}