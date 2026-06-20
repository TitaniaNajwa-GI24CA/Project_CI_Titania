<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_model extends CI_Model {

    public function get_user_profile($id_user)
    {
        return $this->db->get_where('tbl_users', [
            'id_user' => $id_user
        ])->row();
    }

    public function update_profile($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->update('tbl_users', $data);
    }

    public function total_produk()
    {
        return $this->db->count_all('tbl_produk');
    }

    public function total_pelanggan()
    {
        return $this->db->count_all('tbl_pelanggan');
    }

    public function total_order()
    {
        return $this->db->count_all('tbl_order');
    }

    public function total_pendapatan()
    {
        $this->db->select_sum('total_harga');
        $this->db->where('status', 'selesai');

        $query = $this->db->get('tbl_order')->row();

        return $query->total_harga ?? 0;
    }

    public function grafik_pendapatan()
    {
        $this->db->select("
            DATE_FORMAT(tanggal_order, '%M') AS bulan,
            SUM(total_harga) AS total
        ");
        $this->db->from('tbl_order');
        $this->db->where('status', 'selesai');
        $this->db->group_by("MONTH(tanggal_order)");
        $this->db->order_by("MONTH(tanggal_order)", "ASC");

        return $this->db->get()->result();
    }

    public function kategori_terjual()
    {
        $this->db->select("
            tbl_kategori_produk.nama_kategori,
            SUM(tbl_detail_order.qty) AS total_terjual
        ");
        $this->db->from('tbl_detail_order');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk = tbl_detail_order.id_produk');
        $this->db->join('tbl_kategori_produk', 'tbl_kategori_produk.id_kategori = tbl_produk.id_kategori');
        $this->db->join('tbl_order', 'tbl_order.id_order = tbl_detail_order.id_order');
        $this->db->where('tbl_order.status', 'selesai');
        $this->db->group_by('tbl_kategori_produk.id_kategori');

        return $this->db->get()->result();
    }
}