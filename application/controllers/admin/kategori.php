<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/kategori_model');
        $this->load->model('admin/dashboard_model');
        if(!$this->session->userdata('logged_in')){
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['page_title'] = 'Data Kategori Produk';
        $data['page_subtitle'] = 'Kelola kategori produk PT Maju Jaya Electronic';
        $data['user_profile'] = $this->dashboard_model->get_user_profile($id_user);
        $data['kategori'] = $this->kategori_model->get_all();
        $data['total_data'] = $this->kategori_model->count_all();
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/layouts/sidebar');
        $this->load->view('admin/layouts/topbar', $data);
        $this->load->view('admin/kategori/index', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function simpan()
    {
        $this->kategori_model->insert([
            'kode_kategori' => $this->kategori_model->generate_kode_kategori(),
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status')
        ]);

        redirect('admin/kategori');
    }

    public function update()
    {
        $id_kategori = $this->input->post('id_kategori');
        $this->kategori_model->update($id_kategori,[
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status')
        ]);

        redirect('admin/kategori');
    }

    public function delete($id_kategori)
    {
        $this->kategori_model->delete($id_kategori);

        $this->session->set_flashdata('success','Kategori berhasil dihapus');
        redirect('kategori-produk');
    }
}