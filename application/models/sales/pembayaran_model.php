<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran_model extends CI_Model {

    private $table = 'tbl_pembayaran';
    public function get_all($id_sales)
    {
        $this->db->select('
            tbl_pembayaran.*,
            tbl_order.kode_order,
            tbl_pelanggan.nama_pelanggan
        ');

        $this->db->from('tbl_pembayaran');

        $this->db->join(
            'tbl_order',
            'tbl_order.id_order = tbl_pembayaran.id_order'
        );

        $this->db->join(
            'tbl_pelanggan',
            'tbl_pelanggan.id_pelanggan = tbl_order.id_pelanggan'
        );

        $this->db->where('tbl_order.id_sales', $id_sales);

        return $this->db->get()->result();
    }

    public function get_order_by_sales($id_sales)
    {
        $this->db->where('id_sales', $id_sales);
        return $this->db->get('tbl_order')->result();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_pembayaran', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_pembayaran', $id);
        return $this->db->delete($this->table);
    }

    public function count_all($id_sales)
    {
        $this->db->from($this->table);
        $this->db->join('tbl_order', 'tbl_order.id_order = tbl_pembayaran.id_order');
        $this->db->where('tbl_order.id_sales', $id_sales);

        return $this->db->count_all_results();
    }

    public function generate_kode()
    {
        $this->db->select_max('id_pembayaran');
        $row = $this->db->get($this->table)->row();

        $urutan = ($row->id_pembayaran ?? 0) + 1;

        return 'BYR' . str_pad($urutan, 3, '0', STR_PAD_LEFT);
    }
}