<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class data_buku extends CI_Controller {
    public function __construct()
    {
        parent:: __construct();
        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }
    public function cetak_data_buku()
    {
        $kategori = $this->input->get('kategori');
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.kategori');

        if ($kategori){
            $this->db->where('buku.kategori', $kategori);
        }

        $data['data'] = $this->db->get()->result();
        $data['kategori'] = $kategori;
        
        $this->load->view('laporan/cetak_data_buku', $data);
    }

}
