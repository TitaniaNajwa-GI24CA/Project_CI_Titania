<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_penjualan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('manager/laporan_penjualan_model');
        $this->load->model('manager/sales_model');
        $this->load->model('manager/dashboard_model');
        $this->load->model('manager/produk_model');

        if(!$this->session->userdata('logged_in')){
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');
        $sales = $this->input->get('sales');

        $data['sales'] =
            $this->sales_model->get_all();
        $data['produk'] = $this->produk_model->get_all();

        $data['laporan'] =
            $this->laporan_penjualan_model
            ->get_laporan(
                $bulan,
                $tahun,
                $sales
            );
        $data['page_title'] = 'Laporan Penjualan';
        $data['page_subtitle'] = 'Laporan transaksi penjualan perusahaan';

        $data['user_profile'] =
            $this->dashboard_model
            ->get_user_profile($id_user);

        $data['total_transaksi'] =
            $this->laporan_penjualan_model
            ->count_transaksi(
                $bulan,
                $tahun
            );

        $data['total_penjualan'] =
            $this->laporan_penjualan_model
            ->sum_penjualan(
                $bulan,
                $tahun
            );

        $this->load->view('manager/layouts/header');
        $this->load->view('manager/layouts/sidebar');
        $this->load->view('manager/layouts/topbar',$data);
        $this->load->view('manager/laporan_penjualan/index',$data);
        $this->load->view('manager/layouts/footer');
    }

    public function export_excel()
    {
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');
        $sales = $this->input->get('sales');

        $data['laporan'] = $this->laporan_penjualan_model
            ->get_laporan($bulan,$tahun,$sales);

        $this->load->view(
            'manager/laporan_penjualan/excel',
            $data
        );
    }

    public function print_laporan()
    {
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');
        $sales = $this->input->get('sales');

        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        $data['laporan'] = $this->laporan_penjualan_model
            ->get_laporan($bulan,$tahun,$sales);

        $this->load->view(
            'manager/laporan_penjualan/pdf',
            $data
        );
    }
}