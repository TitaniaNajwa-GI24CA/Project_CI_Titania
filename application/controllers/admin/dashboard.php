<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/dashboard_model', 'dashboard_model');

        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('auth/login');
        }

        if ($this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Dashboard';
        $data['page_title'] = 'Dashboard';
        $data['page_subtitle'] = 'Selamat datang kembali, '.$this->session->userdata('nama_user').' ✨';
        $data['user_profile'] = $this->dashboard_model->get_user_profile($id_user);
        $data['total_produk']     = $this->dashboard_model->total_produk();
        $data['total_pelanggan']  = $this->dashboard_model->total_pelanggan();
        $data['total_order']      = $this->dashboard_model->total_order();
        $data['total_pendapatan'] = $this->dashboard_model->total_pendapatan();
        $data['grafik_pendapatan'] = $this->dashboard_model->grafik_pendapatan();
        $data['kategori_terjual']  = $this->dashboard_model->kategori_terjual();
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/layouts/sidebar', $data);
        $this->load->view('admin/layouts/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layouts/footer', $data);
    }

    public function update_profile()
    {
        $id_user = $this->session->userdata('id_user');

        $data_user = [
            'nama_user'  => $this->input->post('nama_user', true),
            'username'   => $this->input->post('username', true),
            'email'      => $this->input->post('email', true),
            'no_telp'    => $this->input->post('no_telp', true),
            'alamat'     => $this->input->post('alamat', true),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->input->post('password')) {
            $data_user['password'] = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
        }

        if (!empty($_FILES['foto_profil']['name'])) {
            $config['upload_path']   = FCPATH . 'assets/img/profile/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size']      = 2048;
            $config['file_name']     = 'profile_' . $id_user . '_' . time();

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto_profil')) {
                $upload_data = $this->upload->data();
                $data_user['foto_profil'] = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/dashboard');
            }
        }

        $this->dashboard_model->update_profile($id_user, $data_user);

        $user = $this->dashboard_model->get_user_profile($id_user);

        $this->session->set_userdata([
            'nama_user'   => $user->nama_user,
            'username'    => $user->username,
            'foto_profil' => $user->foto_profil
        ]);

        $this->session->set_flashdata('success', 'Profile berhasil diperbarui ✨');
        redirect('admin/dashboard');
    }
}