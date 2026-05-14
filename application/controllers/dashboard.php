<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }
    
     public function index()
    {
        $data['total_buku'] = $this->db->count_all('buku');
        $data['total_kategori'] = $this->db->count_all('kategori');

        $this->load->view('templates/header');
        $this->load->view('templates/side_bar');
        $this->load->view('templates/top_bar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    } 
}