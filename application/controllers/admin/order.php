<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/order_model');
        $this->load->model('admin/dashboard_model');

        if(!$this->session->userdata('logged_in')){
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['page_title'] = 'Data Order';
        $data['page_subtitle'] = 'Kelola seluruh transaksi penjualan';
        $data['user_profile'] = $this->dashboard_model->get_user_profile($id_user);
        $data['order'] = $this->order_model->get_all();
        $data['total_data'] = $this->order_model->count_all();
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/layouts/sidebar');
        $this->load->view('admin/layouts/topbar',$data);
        $this->load->view('admin/order/index',$data);
        $this->load->view('admin/layouts/footer');
    }

    public function update_status()
    {
        $id_order = $this->input->post('id_order');
        $status = $this->input->post('status');

        $this->order_model->update($id_order,[
            'status' => $status
        ]);

        if($status == 'Dikirim')
        {
            $order = $this->order_model->get_by_id($id_order);

            $cek = $this->pembayaran_model
                        ->cek_order($id_order);

            if(!$cek)
            {
                $this->pembayaran_model->insert([
                    'kode_pembayaran' => $this->pembayaran_model->generate_kode(),
                    'id_order' => $id_order,
                    'total_bayar' => $order->total_order,
                    'status_pembayaran' => 'Belum Bayar'
                ]);
            }
        }

        redirect('admin/order');
    }

    public function detail_order($id_order)
    {
        $this->load->model('admin/order_model', 'order_model');
        $data['order_header'] = $this->order_model->get_order_header($id_order);
        $data['order_detail'] = $this->order_model->get_order_detail($id_order);

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/layouts/sidebar');
        $this->load->view('admin/layouts/topbar');
        $this->load->view('admin/order/detail_order', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function cetak_nota($id_order)
    {
        $data['order_header'] = $this->order_model->get_order_header($id_order);
        $data['order_detail'] = $this->order_model->get_order_detail($id_order);

        $this->load->view('admin/order/nota_pesanan',$data);
    }

    public function kirim_notifikasi($id_order)
    {
        $order = $this->order_model->get_order_header($id_order);
        if(!$order){show_404();}
        $nomor = $order->no_telp;
        if(substr($nomor,0,1) == '0'){
            $nomor = '62'.substr($nomor,1);
        }
        switch($order->status){
            case 'pending':
                $pesan = "Halo {$order->nama_pelanggan},Pesanan Anda telah berhasil dibuat.
                Kode Order : {$order->kode_order}
                Total Pesanan : Rp ".number_format($order->total_order,0,',','.')."
                Silakan segera melakukan pembayaran agar pesanan dapat diproses.
                PT Maju Jaya Electronic";
            break;

            case 'dikirim':
                $pesan = "Halo {$order->nama_pelanggan},
                Pesanan dengan kode {$order->kode_order} sedang dalam proses pengiriman.
                Terima kasih telah berbelanja di PT Maju Jaya Electronic.";
            break;

            case 'selesai':
                $pesan = "Halo {$order->nama_pelanggan},
                Pesanan dengan kode {$order->kode_order} telah selesai.
                Terima kasih telah mempercayai PT Maju Jaya Electronic.
                Kami tunggu pesanan berikutnya 😊";
            break;

            case 'dibatalkan':
                $pesan = "Halo {$order->nama_pelanggan},
                Mohon maaf, pesanan dengan kode {$order->kode_order} dibatalkan.
                Silakan hubungi admin untuk informasi lebih lanjut.";
            break;


            default:
                $pesan = "Informasi pesanan {$order->kode_order}";
        }

        $url = "https://wa.me/".$d->no_telp."?text=".urlencode($pesan);
            redirect($url);
        $this->kirim_wa($nomor, $pesan);
        $this->session->set_flashdata(
            'success',
            'Notifikasi WhatsApp berhasil dikirim'
        );
        redirect('admin/order');
    }

    private function kirim_wa($target, $messege)
    {
        
        $token = "a3VMHDqL1KhSisd9gKc3";
        $curl  = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.fonnte.com/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                "token" => $token,
                "target" => $target,
                "message" => $messege
            ]),
            CURLOPT_HTTPHEADER => (
                'Authorization: '.$token
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}