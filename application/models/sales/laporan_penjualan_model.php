<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_penjualan_model extends CI_Model {

    public function get_laporan($bulan = null, $tahun = null, $id_sales = null)
    {
        $this->db->select('
            tbl_order.kode_order,
            tbl_order.tanggal_order,
            tbl_order.total_order,
            tbl_pelanggan.nama_pelanggan,
            tbl_sales.nama_sales
        ');

        $this->db->from('tbl_order');

        $this->db->join(
            'tbl_pelanggan',
            'tbl_pelanggan.id_pelanggan = tbl_order.id_pelanggan'
        );

        $this->db->join(
            'tbl_sales',
            'tbl_sales.id_sales = tbl_order.id_sales'
        );

        if ($bulan) {
            $this->db->where('MONTH(tbl_order.tanggal_order)', $bulan);
        }

        if ($tahun) {
            $this->db->where('YEAR(tbl_order.tanggal_order)', $tahun);
        }

        if ($id_sales) {
            $this->db->where('tbl_order.id_sales', $id_sales);
        }

        $this->db->order_by('tbl_order.tanggal_order', 'DESC');

        return $this->db->get()->result();
    }

    public function count_transaksi($bulan = null, $tahun = null, $id_sales = null)
    {
        $this->db->from('tbl_order');

        if ($bulan) {
            $this->db->where('MONTH(tanggal_order)', $bulan);
        }

        if ($tahun) {
            $this->db->where('YEAR(tanggal_order)', $tahun);
        }

        if ($id_sales) {
            $this->db->where('id_sales', $id_sales);
        }

        return $this->db->count_all_results();
    }

    public function sum_penjualan($bulan = null, $tahun = null, $id_sales = null)
    {
        $this->db->select_sum('total_order');
        $this->db->from('tbl_order');

        if ($bulan) {
            $this->db->where('MONTH(tanggal_order)', $bulan);
        }

        if ($tahun) {
            $this->db->where('YEAR(tanggal_order)', $tahun);
        }

        if ($id_sales) {
            $this->db->where('id_sales', $id_sales);
        }

        $result = $this->db->get()->row();

        return !empty($result->total_order)
            ? $result->total_order
            : 0;
    }

    public function get_sales()
    {
        return $this->db
            ->order_by('nama_sales', 'ASC')
            ->get('tbl_sales')
            ->result();
    }
}