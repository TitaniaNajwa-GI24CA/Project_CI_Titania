<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class whatsapp extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function kirim_notifikasi($id)
    {
        $this->db->select('peminjaman.*, anggota.nama_anggota, anggota.no_telp');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'anggota.id_anggota = peminjaman.anggota_id');
        $this->db->where('peminjaman.id', $id);
        $d = $this->db->get()->row();

        if(!$d){
            show_404();   
        } 

        $today = date('Y-m-d');
        $selisih = (strtotime($today) - strtotime($d->tanggal_jatuh_tempo));
        $terlambat = $selisih > 0 ? floor($selisih / (60 * 60 * 24)) : 0;
        
        //hanya kirim jika terlambat
        if($terlambat > 0){
            $messege = "Halo " . $d->nama_anggota . ",\n" .
                     "Anda terlambat mengembalikan buku selama " . $terlambat . " hari.\n" .
                     "Mohon segera kembalikan ke perpustakaan. Terima kasih!";

            $this ->kirim_wa(
                $d->no_telp,
                $messege
            );

            $url = "https://wa.me/".$d->no_telp."?text=".urlencode($messege);
            redirect($url);

            $this->session->set_flashdata('success', 'Notifikasi WA berhasil dikirim.');

        } else {
            $this->session->set_flashdata('error', 'Belum terlambat, tidak perlu kirim notifikasi.');
        }

        redirect('peminjaman');
    }

    private function kirim_wa($target, $messege)
    {
        $token = "euwm2R4zBCkW8yd23mCt";
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