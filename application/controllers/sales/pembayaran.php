<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('sales/pembayaran_model');
        $this->load->model('sales/dashboard_model');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $id_sales = $this->session->userdata('sales')->id_sales ?? null;

        $data['page_title'] = 'Data Pembayaran';
        $data['page_subtitle'] = 'Kelola pembayaran pelanggan';

        $data['user_profile'] =
            $this->dashboard_model->get_user_profile($id_user);

        $data['pembayaran'] =
            $this->pembayaran_model->get_all($id_sales);

        $data['order'] =
            $this->pembayaran_model->get_order_by_sales($id_sales);

        $data['total_data'] =
            $this->pembayaran_model->count_all($id_sales);

        $this->load->view('sales/layouts/header');
        $this->load->view('sales/layouts/sidebar');
        $this->load->view('sales/layouts/topbar', $data);
        $this->load->view('sales/pembayaran/index', $data);
        $this->load->view('sales/layouts/footer');
    }

    public function simpan()
    {
        $id_sales = $this->session->userdata('sales')->id_sales ?? null;

        $data = [
            'kode_pembayaran' => $this->pembayaran_model->generate_kode(),
            'id_order'        => $this->input->post('id_order'),
            'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
            'metode_pembayaran'  => $this->input->post('metode_pembayaran'),
            'total_bayar'        => $this->input->post('total_bayar'),
            'status_pembayaran'  => $this->input->post('status_pembayaran')
        ];

        $this->pembayaran_model->insert($data);

        redirect('sales/pembayaran');
    }

    public function update()
    {
        $id_pembayaran = $this->input->post('id_pembayaran');

        $data = [
            'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
            'metode_pembayaran'  => $this->input->post('metode_pembayaran'),
            'status_pembayaran'  => $this->input->post('status_pembayaran')
        ];

        $this->pembayaran_model->update($id_pembayaran, $data);

        redirect('sales/pembayaran');
    }

    public function delete($id)
    {
        $this->pembayaran_model->delete($id);

        redirect('sales/pembayaran');
    }
}