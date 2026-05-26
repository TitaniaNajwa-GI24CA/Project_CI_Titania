<div class="container-fluid">

<h2><b><i class="fas fa-book-reader"></i> Data Peminjaman</b></h2>

<a href="<?=site_url('peminjaman/tambah');?>" class="btn btn-primary mb-3">Tambah Data Peminjaman <i class="fas fa-plus-circle"></i></a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
<table class="table custom-table" width="100%" cellspasing="0" id="dataTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($data as $d): ?>
    <tr>
        <td><?=$no++;?></td>
        <td><?=$d->kode_peminjaman;?></td>
        <td><?=$d->nama_anggota;?></td>
        <td><?=$d->tanggal_pinjam;?></td>
        <td><?=$d->status;?></td>
        <td>
            <?php 
            $today = date('Y-m-d');
            $selisih = (strtotime($today) - strtotime($d->tanggal_jatuh_tempo));
            $terlambat = $selisih > 0 ? floor($selisih / (60 * 60 * 24)) : 0;
            ?>
            <?php if($d->status == 'dipinjam'): ?>
                <a href="<?= site_url('peminjaman/kembali/'.$d->id); ?>" class="btn btn-success btn-sm">
                Kembalikan
                </a>
                <a href="<?= site_url('whatsapp/kirim_notifikasi/'.$d->id); ?>" class="btn btn-warning btn-sm">
                    <i class="fab fa-whatsapp"></i> 
                    Kirim WA
                </a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
    </div>
    </div>
    </div>
    </div>