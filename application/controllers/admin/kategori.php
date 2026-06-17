<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/kategori_model');

        if(!$this->session->userdata('logged_in')){
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Kategori Produk';
        $data['kategori'] = $this->kategori_model->get_all();
        $data['total_data'] = $this->kategori_model->count_all();
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/layouts/sidebar');
        $this->load->view('admin/layouts/topbar', $data);
        $this->load->view('admin/kategori/index', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function store()
    {
        $this->kategori_model->insert([
            'nama_kategori' => $this->input->post('nama_kategori')
        ]);

        redirect('admin/kategori');
    }

    public function update()
    {
        $id = $this->input->post('id_kategori');

        $this->kategori_model->update($id,[
            'nama_kategori' => $this->input->post('nama_kategori')
        ]);

        redirect('admin/kategori');
    }

    public function delete($id)
    {
        $this->kategori_model->delete($id);

        redirect('admin/kategori');
    }
}