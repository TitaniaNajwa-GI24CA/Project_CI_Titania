<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class kategori extends CI_Controller {
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('kategori_model');
        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function index()
    {
        $data['kategori'] = $this->kategori_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar', $data);
        $this->load->view('templates/top_bar', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('templates/footer', $data);
    } 

    // TAMBAH DATA //
    public function tambah()
    {
        $data['kategori'] = $this->kategori_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar', $data);
        $this->load->view('templates/top_bar', $data);
        $this->load->view('kategori/tambah');
        $this->load->view('templates/footer', $data);

    }

    // SIMPAN DATA //

    public function simpan()
    {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];

        $this->kategori_model->insert($data);
        redirect('kategori');
    }

    // HAPUS DATA //
    public function hapus($id)
    {
        $this->kategori_model->delete($id);
        $this->session->set_flashdata('success', "Data Berhasil Dihapus");
        redirect('kategori');
    }

    // EDIT DATA //
    public function edit($id)
    {
        $data['kategori'] = $this->kategori_model->get_by_id($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar', $data);
        $this->load->view('templates/top_bar', $data);
        $this->load->view('kategori/edit', $data);
        $this->load->view('templates/footer', $data);
    }

    //Update Data//
    public function update($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_kategori','Nama Kategori', 'required');
        if ($this->form_validation->run() == FALSE){

        }else{
            $data=[
                'nama_kategori'=> $this->input->post('nama_kategori')
            ];
            $this->kategori_model->update($id, $data);
            $this->session->set_flashdata('success', 'Data berhasil di update');
            redirect('kategori');
        }
    }

}

?>
