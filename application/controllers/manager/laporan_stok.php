<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_stok extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('manager/laporan_stok_model');
        $this->load->model('manager/laporan_penjualan_model');
        $this->load->model('manager/dashboard_model');

        if(!$this->session->userdata('logged_in')){
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');

        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        $data['laporan'] =
            $this->laporan_stok_model
            ->get_laporan(
                $bulan,
                $tahun
            );

        $data['page_title'] = 'Laporan Stok';
        $data['page_subtitle'] = 'Laporan Barang & Stok Perusahaan';

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
        $this->load->view('manager/laporan_stok/index',$data);
        $this->load->view('manager/layouts/footer');
    }

    public function export_excel()
    {
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        $data['laporan'] =
            $this->laporan_stok_model
                ->get_laporan(
                    $bulan,
                    $tahun
                );

        $this->load->view(
            'manager/laporan_stok/excel',
            $data
        );
    }

    public function print_laporan()
    {
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        $data['laporan'] =
            $this->laporan_stok_model
                ->get_laporan(
                    $bulan,
                    $tahun
                );

        $this->load->view(
            'manager/laporan_stok/pdf',
            $data
        );
    }
}