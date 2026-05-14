<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class anggota extends CI_Controller {
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('anggota_model');
        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function index()
    {
        $data['anggota'] = $this->anggota_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar', $data);
        $this->load->view('templates/top_bar', $data);
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer', $data);
    } 

    // TAMBAH DATA //
    public function tambah()
    {
        $data['anggota'] = $this->anggota_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar', $data);
        $this->load->view('templates/top_bar', $data);
        $this->load->view('anggota/tambah');
        $this->load->view('templates/footer', $data);

    }

    // SIMPAN DATA //

    public function simpan()
    {
        $data = [
            'id_anggota' => $this->input->post('id_anggota'),
            'nama_anggota' => $this->input->post('nama_anggota'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp')
        ];

        $this->anggota_model->insert($data);
        redirect('anggota');
    }

    // HAPUS DATA //
    public function hapus($id_anggota)
    {
        $this->anggota_model->delete($id_anggota);
        $this->session->set_flashdata('success', "Data Berhasil Dihapus");
        redirect('anggota');
    }

    // EDIT DATA //
    public function edit($id_anggota)
    {
        $data['anggota'] = $this->anggota_model->get_by_id($id_anggota);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar', $data);
        $this->load->view('templates/top_bar', $data);
        $this->load->view('anggota/edit', $data);
        $this->load->view('templates/footer', $data);
    }

    //Update Data//
    public function update($id_anggota)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_anggota','Nama Anggota', 'required');
        if ($this->form_validation->run() == FALSE){
            redirect('anggota/edit/'.$id_anggota);
        } else {
            $data = [
                'id_anggota' => $this->input->post('id_anggota'),
                'nama_anggota' => $this->input->post('nama_anggota'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
            ];

            $this->anggota_model->update($id_anggota, $data);

            $this->session->set_flashdata('success', 'Data berhasil di update');
            redirect('anggota');
        }
    }

}

?>
