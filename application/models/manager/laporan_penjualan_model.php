<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_penjualan_model extends CI_Model {

    public function get_laporan($bulan = null, $tahun = null, $id_sales = null, $id_produk = null)
    {
        $this->db->select('
            tbl_order.kode_order,
            tbl_order.tanggal_order,
            tbl_pembayaran.tanggal_pembayaran,
            tbl_pelanggan.nama_pelanggan,
            tbl_sales.nama_sales,
            tbl_produk.nama_produk,
            tbl_order.total_order
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

        $this->db->join(
            'tbl_detail_order',
            'tbl_detail_order.id_order = tbl_order.id_order'
        );

        $this->db->join(
            'tbl_produk',
            'tbl_produk.id_produk = tbl_detail_order.id_produk'
        );

        $this->db->join(
            'tbl_pembayaran',
            'tbl_pembayaran.id_order = tbl_order.id_order'
        );

        $this->db->where('tbl_pembayaran.status_pembayaran', 'lunas');

        if ($bulan) {
            $this->db->where('MONTH(tbl_order.tanggal_order)', $bulan);
        }

        if ($tahun) {
            $this->db->where('YEAR(tbl_order.tanggal_order)', $tahun);
        }

        if ($id_sales) {
            $this->db->where('tbl_order.id_sales', $id_sales);
        }

        $produk = $this->input->get('produk');
        if ($produk) {
            $this->db->where('tbl_detail_order.id_produk', $produk);
        }

        $this->db->order_by('tbl_order.tanggal_order', 'DESC');

        return $this->db->get()->result();
    }

    public function count_transaksi($bulan = null, $tahun = null, $id_sales = null)
    {
        $this->db->from('tbl_order');

        $this->db->join(
            'tbl_pembayaran',
            'tbl_pembayaran.id_order = tbl_order.id_order'
        );

        $this->db->where('tbl_pembayaran.status_pembayaran', 'lunas');

        if ($bulan) {
            $this->db->where('MONTH(tbl_order.tanggal_order)', $bulan);
        }

        if ($tahun) {
            $this->db->where('YEAR(tbl_order.tanggal_order)', $tahun);
        }

        if ($id_sales) {
            $this->db->where('tbl_order.id_sales', $id_sales);
        }

        return $this->db->count_all_results();
    }

    public function sum_penjualan($bulan = null, $tahun = null, $id_sales = null)
    {
        $this->db->select_sum('tbl_order.total_order');
        $this->db->from('tbl_order');

        $this->db->join(
            'tbl_pembayaran',
            'tbl_pembayaran.id_order = tbl_order.id_order'
        );

        $this->db->where('tbl_pembayaran.status_pembayaran', 'lunas');

        if ($bulan) {
            $this->db->where('MONTH(tbl_order.tanggal_order)', $bulan);
        }

        if ($tahun) {
            $this->db->where('YEAR(tbl_order.tanggal_order)', $tahun);
        }

        if ($id_sales) {
            $this->db->where('tbl_order.id_sales', $id_sales);
        }

        $result = $this->db->get()->row();

        return !empty($result->total_order) ? $result->total_order : 0;
    }

    public function get_sales()
    {
        return $this->db
            ->order_by('nama_sales', 'ASC')
            ->get('tbl_sales')
            ->result();
    }
}