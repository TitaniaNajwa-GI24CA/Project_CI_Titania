<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_model extends CI_Model {

    public function get_user_profile($id_user)
    {
        return $this->db->get_where('tbl_users', [
            'id_user' => $id_user
        ])->row();
    }

    public function get_sales_by_user($id_user)
    {
        return $this->db
            ->get_where(
                'tbl_sales',
                ['id_user' => $id_user]
            )
            ->row();
    }

    public function update_profile($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->update('tbl_users', $data);
    }

    public function total_order($id_sales)
    {
        return $this->db
            ->where('id_sales',$id_sales)
            ->count_all_results('tbl_order');
    }

   public function total_pelanggan($id_sales)
    {
        $this->db->select(
            'COUNT(DISTINCT id_pelanggan)
            as total'
        );

        $this->db->where(
            'id_sales',
            $id_sales
        );

        return $this->db
            ->get('tbl_order')
            ->row()
            ->total;
    }

    public function total_penjualan($id_sales)
    {
        $this->db->select_sum('total_order');

        $this->db->where(
            'id_sales',
            $id_sales
        );

        $result =
            $this->db
            ->get('tbl_order')
            ->row();

        return $result->total_order ?? 0;
    }

    public function total_produk_terjual($id_sales)
    {
        $this->db->select_sum(
            'tbl_detail_order.qty'
        );

        $this->db->from(
            'tbl_detail_order'
        );

        $this->db->join(
            'tbl_order',
            'tbl_order.id_order =
            tbl_detail_order.id_order'
        );

        $this->db->where(
            'tbl_order.id_sales',
            $id_sales
        );

        $result =
            $this->db->get()->row();

        return $result->qty ?? 0;
    }

    public function order_terbaru($id_sales)
    {
        $this->db->select('
            tbl_order.*,
            tbl_pelanggan.nama_pelanggan
        ');

        $this->db->from('tbl_order');

        $this->db->join(
            'tbl_pelanggan',
            'tbl_pelanggan.id_pelanggan =
            tbl_order.id_pelanggan'
        );

        $this->db->where(
            'tbl_order.id_sales',
            $id_sales
        );

        $this->db->order_by(
            'tbl_order.id_order',
            'DESC'
        );

        $this->db->limit(5);

        return $this->db->get()->result();
    }

    public function grafik_penjualan($id_sales)
    {
        $this->db->select("
            MONTH(tanggal_order) as bulan,
            SUM(total_order) as total
        ");

        $this->db->from('tbl_order');

        $this->db->where(
            'id_sales',
            $id_sales
        );

        $this->db->group_by(
            'MONTH(tanggal_order)'
        );

        return $this->db->get()->result();
    }

    public function produk_terlaris($id_sales)
    {
        $this->db->select('
            tbl_produk.nama_produk,
            SUM(tbl_detail_order.qty)
            as total_terjual
        ');

        $this->db->from(
            'tbl_detail_order'
        );

        $this->db->join(
            'tbl_order',
            'tbl_order.id_order =
            tbl_detail_order.id_order'
        );

        $this->db->join(
            'tbl_produk',
            'tbl_produk.id_produk =
            tbl_detail_order.id_produk'
        );

        $this->db->where(
            'tbl_order.id_sales',
            $id_sales
        );

        $this->db->group_by(
            'tbl_produk.id_produk'
        );

        $this->db->order_by(
            'total_terjual',
            'DESC'
        );

        $this->db->limit(5);

        return $this->db->get()->result();
    }
}