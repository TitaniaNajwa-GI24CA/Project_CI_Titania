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

        $data['page_title']    = 'Data Produk';
        $data['page_subtitle'] = 'Kelola semua produk PT Maju Jaya Electronic';
        $data['user_profile']  = $this->dashboard_model->get_user_profile($id_user);
        $data['produk']        = $this->produk_model->get_all();
        $data['kategori']      = $this->kategori_model->get_all();
        $data['total_data']    = $this->produk_model->count_all();
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/layouts/sidebar');
        $this->load->view('admin/layouts/topbar', $data);
        $this->load->view('admin/produk/index', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function simpan()
    {
        $gambar = '';

        if(!empty($_FILES['gambar']['name']))
        {
            $config['upload_path']   = './assets/img/produk/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size']      = 2048;
            $config['file_name']     = 'produk_' . time();

            $this->load->library('upload', $config);

            if($this->upload->do_upload('gambar'))
            {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = [
            'id_kategori' => $this->input->post('id_kategori'),
            'kode_produk' => $this->produk_model->generate_kode_produk(),
            'nama_produk' => $this->input->post('nama_produk'),
            'harga'       => $this->input->post('harga'),
            'stok'        => $this->input->post('stok'),
            'gambar'      => $gambar
        ];

        $this->produk_model->insert($data);

        $this->session->set_flashdata(
            'success',
            'Produk berhasil ditambahkan'
        );

        redirect('admin/produk');
    }

    public function update()
    {
        $id_produk = $this->input->post('id_produk');

        $data = [
            'id_kategori' => $this->input->post('id_kategori'),
            'kode_produk' => $this->input->post('kode_produk'),
            'nama_produk' => $this->input->post('nama_produk'),
            'harga'       => $this->input->post('harga'),
            'stok'        => $this->input->post('stok')
        ];

        if(!empty($_FILES['gambar']['name']))
        {
            $config['upload_path']   = './assets/img/produk/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size']      = 2048;
            $config['file_name']     = 'produk_' . time();

            $this->load->library('upload', $config);

            if($this->upload->do_upload('gambar'))
            {
                $data['gambar'] = $this->upload->data('file_name');
            }
        }

        $this->produk_model->update($id_produk, $data);

        $this->session->set_flashdata(
            'success',
            'Produk berhasil diperbarui'
        );

        redirect('admin/produk');
    }

    public function delete($id_produk)
    {
        $produk = $this->produk_model->get_by_id($id_produk);

        if($produk && !empty($produk->gambar))
        {
            $file = FCPATH . 'assets/img/produk/' . $produk->gambar;

            if(file_exists($file)){
                unlink($file);
            }
        }

        $this->produk_model->delete($id_produk);

        $this->session->set_flashdata(
            'success',
            'Produk berhasil dihapus'
        );

        redirect('admin/produk');
    }

}