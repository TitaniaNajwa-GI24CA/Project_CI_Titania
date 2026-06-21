<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function registrasi()
    {
        $this->load->view('auth/registrasi');
    }

    public function proses_registrasi()
    {
        $nama_user = $this->input->post('nama_user', true);
        $username  = $this->input->post('username', true);
        $password  = $this->input->post('password', true);
        $role      = $this->input->post('role', true);
        $email     = $this->input->post('email', true);
        $no_telp   = $this->input->post('no_telp', true);
        $alamat    = $this->input->post('alamat', true);

        $cek = $this->auth_model->cek_username($username);

        if ($cek) {
            $this->session->set_flashdata('error', 'Username sudah digunakan!');
            redirect('auth/registrasi');
        }

        $data_user = [
            'nama_user'   => $nama_user,
            'username'    => $username,
            'password'    => password_hash($password, PASSWORD_DEFAULT),
            'role'        => $role,
            'email'       => $email,
            'no_telp'     => $no_telp,
            'alamat'      => $alamat,
            'foto_profil' => 'default.png',
            'status'      => 'aktif',
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
        ];

        $id_user = $this->auth_model->insert_user($data_user);
        $id_sales = null;
        $nama_sales = null;

        if ($role == 'sales') {
            $data = [
                'id_user'          => $id_user,
                'kode_sales'       => $this->auth_model->generate_kode_sales(),
                'nama_sales'       => $nama_user,
                'no_telp'          => $no_telp,
                'email'            => $email,
                'alamat'           => $alamat,
                'status'           => 'aktif'
            ];

            $id_sales = $this->auth_model->insert_sales($data);
            $sales = $this->db->get_where('tbl_sales', [
                'id_sales' => $id_sales
            ])->row();

            $nama_sales = $sales ? $sales->nama_sales : $nama_user;
        }

        $this->session->set_flashdata('success', 'Registrasi berhasil!');
        redirect('auth/login');
    }

    public function proses_login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $role     = $this->input->post('role', true);

        $user = $this->auth_model->cek_login($username);

        if (!$user) {
            $this->session->set_flashdata('error', 'Username tidak ditemukan atau akun tidak aktif!');
            redirect('auth/login');
        }

        if (!password_verify($password, $user->password)) {
            $this->session->set_flashdata('error', 'Password salah!');
            redirect('auth/login');
        }

        if ($role != $user->role) {
            $this->session->set_flashdata('error', 'Hak akses tidak sesuai!');
            redirect('auth/login');
        }

        $sales = $this->db->get_where('tbl_sales', [
            'id_user' => $user->id_user
        ])->row();

        $session_data = [
            'id_user'     => $user->id_user,
            'id_sales'    => $sales ? $sales->id_sales : null,
            'nama_user'   => $user->nama_user,
            'nama_sales'  => $sales ? $sales->nama_sales : null,
            'username'    => $user->username,
            'role'        => $user->role,
            'foto_profil' => $user->foto_profil,
            'logged_in'   => true
        ];

        $this->session->set_userdata($session_data);

        $this->auth_model->update_last_login($user->id_user);

        if ($user->role == 'admin') {
            redirect('admin/dashboard');
        } elseif ($user->role == 'sales') {
            redirect('sales/dashboard');
        } else {
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}