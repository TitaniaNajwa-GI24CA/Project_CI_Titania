<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/produk_model');
        $this->load->model('admin/kategori_model');
        $this->load->model('admin/dashboard_model');
        if(!$this->session->userdata('logged_in')){
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['page_title'] = 'Data Produk';
        $data['page_subtitle'] = 'Kelola semua produk PT Maju Jaya Electronic';
        $data['user_profile'] = $this->dashboard_model->get_user_profile($id_user);
        $data['produk'] = $this->produk_model->get_all();
        $data['total_data'] = $this->produk_model->count_all();
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/layouts/sidebar');
        $this->load->view('admin/layouts/topbar', $data);
        $this->load->view('admin/produk/index', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function simpan()
    {
        $this->produk_model->insert([
            'id_kategori' => $this->input->post('kode_produk'),
            'kode_produk' => $this->input->post('kode_produk'),
            'nama_produk' => $this->input->post('nama_produk'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status')
        ]);

        redirect('admin/produk');
    }

    public function update()
    {
        $id_produk = $this->input->post('id_produk');
        $this->produk_model->update($id_produk,[
            'nama_produk' => $this->input->post('nama_produk'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status')
        ]);

        redirect('admin/produk');
    }

    public function delete($id_produk)
    {
        $this->produk_model->delete($id_produk);

        $this->session->set_flashdata('success','produk berhasil dihapus');
        redirect('produk-produk');
    }
}