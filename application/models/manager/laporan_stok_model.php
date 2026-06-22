<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_stok_model extends CI_Model {

    public function get_laporan(
        $bulan = null,
        $tahun = null
    )
    {
        $this->db->select('
            tbl_produk.id_produk,
            tbl_produk.kode_produk,
            tbl_produk.nama_produk,
            tbl_produk.harga,
            tbl_produk.stok,

            tbl_kategori_produk.nama_kategori,

            COALESCE(SUM(tbl_detail_order.qty),0) as total_terjual,

            COALESCE(
                SUM(tbl_detail_order.subtotal),
                0
            ) as total_penjualan
        ');

        $this->db->from('tbl_produk');

        $this->db->join(
            'tbl_kategori_produk',
            'tbl_kategori_produk.id_kategori = tbl_produk.id_kategori',
            'left'
        );

        $this->db->join(
            'tbl_detail_order',
            'tbl_detail_order.id_produk = tbl_produk.id_produk',
            'left'
        );

        $this->db->join(
            'tbl_order',
            'tbl_order.id_order = tbl_detail_order.id_order',
            'left'
        );

        if(!empty($bulan)){
            $this->db->where(
                'MONTH(tbl_order.tanggal_order)',
                $bulan
            );
        }

        if(!empty($tahun)){
            $this->db->where(
                'YEAR(tbl_order.tanggal_order)',
                $tahun
            );
        }

        $this->db->group_by(
            'tbl_produk.id_produk'
        );

        $this->db->order_by(
            'total_terjual',
            'DESC'
        );

        return $this->db->get()->result();
    }
}