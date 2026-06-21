<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('sales/order_model');
        $this->load->model('admin/dashboard_model');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $id_sales = $this->session->userdata('id_sales');
        if (!$id_sales) {
            $this->session->set_flashdata('error', 'Session sales tidak ditemukan, silakan login ulang');
            redirect('auth/login');
        }

        $data['page_title'] = 'Data Order';
        $data['page_subtitle'] = 'Kelola order saya';

        $data['user_profile'] =
            $this->dashboard_model->get_user_profile($id_user);

        $data['order'] =
            $this->order_model->get_all_by_sales($id_sales);

        $this->load->view('sales/layouts/header');
        $this->load->view('sales/layouts/sidebar');
        $this->load->view('sales/layouts/topbar', $data);
        $this->load->view('sales/order/index', $data);
        $this->load->view('sales/layouts/footer');
    }

    public function tambah()
    {
        $id_user = $this->session->userdata('id_user');

        $this->load->model('admin/pelanggan_model');
        $this->load->model('admin/produk_model');

        $data['page_title'] = 'Tambah Order';
        $data['page_subtitle'] = 'Buat transaksi baru';

        $data['user_profile'] =
            $this->dashboard_model->get_user_profile($id_user);

        $data['pelanggan'] = $this->pelanggan_model->get_all();
        $data['produk'] = $this->produk_model->get_all();

        $this->load->view('sales/layouts/header');
        $this->load->view('sales/layouts/sidebar');
        $this->load->view('sales/layouts/topbar', $data);
        $this->load->view('sales/order/tambah', $data);
        $this->load->view('sales/layouts/footer');
    }

    public function simpan()
    {
        $id_sales = $this->session->userdata('id_sales');
        $id_pelanggan = $this->input->post('id_pelanggan');
        $tanggal_order = $this->input->post('tanggal_order');
        $produk = $this->input->post('id_produk');
        $qty    = $this->input->post('qty');
        $harga  = $this->input->post('harga');

        if (!$produk || !$qty || !$harga) {
            $this->session->set_flashdata('error', 'Data order tidak valid');
            redirect('sales/order/tambah');
        }
        foreach ($produk as $key => $id_produk) {

            if (empty($id_produk)) continue;

            $produk_db = $this->db->get_where('tbl_produk', [
                'id_produk' => $id_produk
            ])->row();

            if (!$produk_db) {
                $this->session->set_flashdata('error', 'Produk tidak ditemukan');
                redirect('sales/order/tambah');
            }

            if ($qty[$key] > $produk_db->stok) {
                $this->session->set_flashdata('error', 'Stok tidak cukup untuk salah satu produk');
                redirect('sales/order/tambah');
            }
        }
        $this->db->trans_start();

        $data_order = [
            'kode_order' => $this->order_model->generate_kode_order(),
            'tanggal_order' => $tanggal_order,
            'id_pelanggan' => $id_pelanggan,
            'id_sales' => $id_sales,
            'total_order' => 0,
            'status' => 'Pending'
        ];

        $id_order = $this->order_model->insert_order($data_order);
        $grand_total = 0;
        foreach ($produk as $key => $id_produk) {

            if (empty($id_produk)) continue;

            $produk_db = $this->db->get_where('tbl_produk', [
                'id_produk' => $id_produk
            ])->row();

            $subtotal = $qty[$key] * $harga[$key];
            $grand_total += $subtotal;

            $detail = [
                'id_order' => $id_order,
                'id_produk' => $id_produk,
                'qty' => $qty[$key],
                'harga' => $harga[$key],
                'subtotal' => $subtotal
            ];

            $this->order_model->insert_detail($detail);
            $stok_baru = $produk_db->stok - $qty[$key];

            $this->db->where('id_produk', $id_produk);
            $this->db->update('tbl_produk', [
                'stok' => $stok_baru
            ]);
        }
        $this->order_model->update_total($id_order, $grand_total);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {

            $this->session->set_flashdata('error', 'Order gagal disimpan');
            redirect('sales/order/tambah');

        } else {

            $this->session->set_flashdata('success', 'Order berhasil dibuat');
            redirect('sales/order');
        }
    }


    public function update_status()
    {
        $id_order = $this->input->post('id_order');
        $status = $this->input->post('status');

        $this->order_model->update($id_order,[
            'status' => $status
        ]);

        if($status == 'Dikirim')
        {
            $order = $this->order_model->get_by_id($id_order);

            $cek = $this->pembayaran_model
                        ->cek_order($id_order);

            if(!$cek)
            {
                $this->pembayaran_model->insert([
                    'kode_pembayaran' => $this->pembayaran_model->generate_kode(),
                    'id_order' => $id_order,
                    'total_bayar' => $order->total_order,
                    'status_pembayaran' => 'Belum Bayar'
                ]);
            }
        }

        redirect('sales/order');
    }

    public function hapus($id_order)
    {
        $this->order_model->delete($id_order);

        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('sales/order');
    }

    public function detail_order($id_order)
    {
        $this->load->model('sales/order_model', 'order_model');
        $data['order_header'] = $this->order_model->get_order_header($id_order);
        $data['order_detail'] = $this->order_model->get_order_detail($id_order);

        $this->load->view('sales/layouts/header');
        $this->load->view('sales/layouts/sidebar');
        $this->load->view('sales/layouts/topbar');
        $this->load->view('sales/order/detail_order', $data);
        $this->load->view('sales/layouts/footer');
    }
}