<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/pembayaran_model');
        $this->load->model('admin/dashboard_model');

        if(!$this->session->userdata('logged_in')){
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');

        $data['page_title'] = 'Data Pembayaran';
        $data['page_subtitle'] = 'Kelola pembayaran pelanggan';

        $data['user_profile'] =
            $this->dashboard_model->get_user_profile($id_user);

        $data['pembayaran'] =
            $this->pembayaran_model->get_all();

        $data['total_data'] =
            $this->pembayaran_model->count_all();

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/layouts/sidebar');
        $this->load->view('admin/layouts/topbar',$data);
        $this->load->view('admin/pembayaran/index',$data);
        $this->load->view('admin/layouts/footer');
    }

    public function simpan()
    {
        $data = [

            'kode_pembayaran' =>
                $this->pembayaran_model->generate_kode(),

            'id_order' =>
                $this->input->post('id_order'),

            'tanggal_pembayaran' =>
                $this->input->post('tanggal_pembayaran'),

            'metode_pembayaran' =>
                $this->input->post('metode_pembayaran'),

            'total_bayar' =>
                $this->input->post('total_bayar'),

            'status_pembayaran' =>
                $this->input->post('status_pembayaran')
        ];

        $this->pembayaran_model->insert($data);

        redirect('admin/pembayaran');
    }

    public function update()
    {
        $id_pembayaran =
            $this->input->post('id_pembayaran');

        $data = [

            'tanggal_pembayaran' =>
                $this->input->post('tanggal_pembayaran'),

            'metode_pembayaran' =>
                $this->input->post('metode_pembayaran'),

            'status_pembayaran' =>
                $this->input->post('status_pembayaran')
        ];

        $this->pembayaran_model->update(
            $id_pembayaran,
            $data
        );

        redirect('admin/pembayaran');
    }

    public function delete($id)
    {
        $this->pembayaran_model->delete($id);

        redirect('admin/pembayaran');
    }
}