<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class laporan extends CI_Controller {
    public function __construct()
    {
        parent:: __construct();
        //$this->load->model('laporan_model');
        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function peminjaman()
    {
        $bulan = $this->input->get('bulan');

        $this->db->select('peminjaman.*, anggota.nama_anggota');
        $this->db->from('peminjaman');
        $this->db->join('anggota','anggota.id_anggota = peminjaman.anggota_id');

        if ($bulan){
            $this->db->where('DATE_FORMAT(tanggal_pinjam, "%Y-%m")=', $bulan);
        }
         
        $data['data'] = $this->db->get()->result();
        $data['bulan'] = $bulan;

        $this->load->view('templates/header');
        $this->load->view('templates/side_bar');
        $this->load->view('templates/top_bar');
        $this->load->view('laporan/peminjaman', $data);
        $this->load->view('templates/footer');   
    }
}