<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sales extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/sales_model');
        $this->load->model('admin/dashboard_model');

        if(!$this->session->userdata('logged_in')){
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');

        $data['page_title'] = 'Data Sales';
        $data['page_subtitle'] = 'Kelola data sales PT Maju Jaya Electronic';

        $data['user_profile'] =
            $this->dashboard_model->get_user_profile($id_user);

        $data['sales'] =
            $this->sales_model->get_all();

        $data['total_data'] =
            $this->sales_model->count_all();

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/layouts/sidebar');
        $this->load->view('admin/layouts/topbar',$data);
        $this->load->view('admin/sales/index',$data);
        $this->load->view('admin/layouts/footer');
    }

    public function simpan()
    {
        $data = [

            'kode_sales' =>
                $this->sales_model->generate_kode(),

            'nama_sales' =>
                $this->input->post('nama_sales'),

            'no_telp' =>
                $this->input->post('no_telp'),

            'email' =>
                $this->input->post('email'),

            'alamat' =>
                $this->input->post('alamat'),

            'status' =>
                $this->input->post('status')
        ];

        $this->sales_model->insert($data);

        $this->session->set_flashdata(
            'success',
            'Data sales berhasil ditambahkan'
        );

        redirect('sales');
    }

    public function update()
    {
        $id_sales =
            $this->input->post('id_sales');

        $data = [

            'nama_sales' =>
                $this->input->post('nama_sales'),

            'no_telp' =>
                $this->input->post('no_telp'),

            'email' =>
                $this->input->post('email'),

            'alamat' =>
                $this->input->post('alamat'),

            'status' =>
                $this->input->post('status')
        ];

        $this->sales_model->update(
            $id_sales,
            $data
        );

        $this->session->set_flashdata(
            'success',
            'Data sales berhasil diperbarui'
        );

        redirect('sales');
    }

    public function delete($id_sales)
    {
        $this->sales_model->delete($id_sales);

        $this->session->set_flashdata(
            'success',
            'Data sales berhasil dihapus'
        );

        redirect('sales');
    }
}