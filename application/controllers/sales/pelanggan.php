<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('sales/pelanggan_model');
        $this->load->model('sales/dashboard_model');

        if(!$this->session->userdata('logged_in')){
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['page_title'] = 'Data Pelanggan';
        $data['page_subtitle'] = 'Kelola seluruh data pelanggan PT Maju Jaya Electronic';
        $data['user_profile'] =
            $this->dashboard_model->get_user_profile($id_user);
        $data['pelanggan'] =
            $this->pelanggan_model->get_all();
        $data['total_data'] =
            $this->pelanggan_model->count_all();

        $this->load->view('sales/layouts/header');
        $this->load->view('sales/layouts/sidebar');
        $this->load->view('sales/layouts/topbar',$data);
        $this->load->view('sales/pelanggan/index',$data);
        $this->load->view('sales/layouts/footer');
    }

    public function simpan()
    {
        $data = [
            'kode_pelanggan' => $this->pelanggan_model->generate_kode_pelanggan(),
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
            'no_telp'        => $this->input->post('no_telp'),
            'email'          => $this->input->post('email'),
            'jenis_pelanggan'  => $this->input->post('jenis_pelanggan'),
            'alamat'         => $this->input->post('alamat')

        ];

        $this->pelanggan_model->insert($data);

        $this->session->set_flashdata(
            'success',
            'Data pelanggan berhasil ditambahkan'
        );

        redirect('sales/pelanggan');
    }

    public function update()
    {
        $id_pelanggan = $this->input->post('id_pelanggan');

        $data = [

            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
            'no_telp'        => $this->input->post('no_telp'),
            'email'          => $this->input->post('email'),
            'jenis_pelanggan'  => $this->input->post('jenis_pelanggan'),
            'alamat'         => $this->input->post('alamat')

        ];

        $this->pelanggan_model->update(
            $id_pelanggan,
            $data
        );

        $this->session->set_flashdata(
            'success',
            'Data pelanggan berhasil diperbarui'
        );

        redirect('sales/pelanggan');
    }

    public function delete($id_pelanggan)
    {
        $this->pelanggan_model->delete($id_pelanggan);

        $this->session->set_flashdata(
            'success',
            'Data pelanggan berhasil dihapus'
        );

        redirect('sales/pelanggan');
    }
}