<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order_model extends CI_Model {

    public function generate_kode_order()
    {
        do {
            $kode = 'ODR-' . strtoupper(
                substr(md5(uniqid(rand(), true)), 0, 6)
            );

            $cek = $this->db
                ->where('kode_order', $kode)
                ->count_all_results('tbl_order');

        } while ($cek > 0);

        return $kode;
    }

    public function get_all_by_sales($id_sales)
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
        if (!empty($id_sales)) {
            $this->db->where('tbl_order.id_sales', $id_sales);
        }

        $this->db->order_by('tbl_order.id_order', 'DESC');

        return $this->db->get()->result();
    }

    public function get_by_id($id_order)
    {
        return $this->db->get_where('tbl_order', [
            'id_order' => $id_order
        ])->row();
    }

    public function insert_order($data)
    {
        $this->db->insert('tbl_order', $data);
        return $this->db->insert_id();
    }

    public function insert_detail($data)
    {
        return $this->db->insert('tbl_detail_order', $data);
    }

    public function update_total($id_order, $total)
    {
        return $this->db
            ->where('id_order', $id_order)
            ->update('tbl_order', [
                'total_order' => $total
            ]);
    }

    public function delete($id_order)
    {
        $this->db->where('id_order', $id_order)
                 ->delete('tbl_detail_order');
        return $this->db->where('id_order', $id_order)
                        ->delete('tbl_order');
    }

    public function get_produk_by_order($id_order)
    {
        $this->db->select('
            tbl_detail_order.*,
            tbl_produk.nama_produk,
            tbl_produk.harga AS harga_produk,
            tbl_produk.gambar
        ');

        $this->db->from('tbl_detail_order');

        $this->db->join(
            'tbl_produk',
            'tbl_produk.id_produk = tbl_detail_order.id_produk',
            'left'
        );

        $this->db->where('tbl_detail_order.id_order', $id_order);

        return $this->db->get()->result();
    }

    public function get_order_detail($id_order)
    {
        $this->db->select('
            d.qty,
            d.harga,
            d.subtotal,
            p.nama_produk,
            p.kode_produk,
            p.gambar
        ');

        $this->db->from('tbl_detail_order d');
        $this->db->join('tbl_produk p', 'p.id_produk = d.id_produk', 'left');
        $this->db->where('d.id_order', $id_order);

        return $this->db->get()->result();
    }

    public function get_order_header($id_order)
    {
        $this->db->select('
            o.id_order,
            o.kode_order,
            o.tanggal_order,
            o.status,
            o.total_order,
            p.nama_pelanggan,
            p.no_telp,
            IFNULL(pb.metode_pembayaran, "-") as metode_pembayaran
        ');

        $this->db->from('tbl_order o');
        $this->db->join('tbl_pelanggan p', 'p.id_pelanggan = o.id_pelanggan', 'left');
        $this->db->join('tbl_pembayaran pb', 'pb.id_order = o.id_order', 'left');

        $this->db->where('o.id_order', $id_order);

        return $this->db->get()->row();
    }

    public function get_order_by_sales($id_sales)
    {
        $this->db->select('id_order, kode_order');
        $this->db->from('tbl_order');

        $this->db->where('id_sales', $id_sales);

        $query = $this->db->get();

        return $query->result();
    }
}