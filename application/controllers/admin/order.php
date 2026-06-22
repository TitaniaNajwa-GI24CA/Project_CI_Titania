<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/order_model');
        $this->load->model('admin/dashboard_model');

        if(!$this->session->userdata('logged_in')){
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['page_title'] = 'Data Order';
        $data['page_subtitle'] = 'Kelola seluruh transaksi penjualan';
        $data['user_profile'] = $this->dashboard_model->get_user_profile($id_user);
        $data['order'] = $this->order_model->get_all();
        $data['total_data'] = $this->order_model->count_all();
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/layouts/sidebar');
        $this->load->view('admin/layouts/topbar',$data);
        $this->load->view('admin/order/index',$data);
        $this->load->view('admin/layouts/footer');
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

        redirect('admin/order');
    }

    public function detail_order($id_order)
    {
        $this->load->model('admin/order_model', 'order_model');
        $data['order_header'] = $this->order_model->get_order_header($id_order);
        $data['order_detail'] = $this->order_model->get_order_detail($id_order);

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/layouts/sidebar');
        $this->load->view('admin/layouts/topbar');
        $this->load->view('admin/order/detail_order', $data);
        $this->load->view('admin/layouts/footer');
    }
}