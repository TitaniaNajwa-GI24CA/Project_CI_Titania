<div class="container-fluid">

<h2><b><i class="fas fa-book-open"></i> Data Buku</b></h2>

<a href="<?=site_url('buku/tambah');?>" class="btn btn-primary mb-3">Tambah Data Buku <i class="fas fa-plus-circle"></i></a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
<table class="table custom-table" width="100%" cellspasing="0" id="dataTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($buku as $b): ?>
    <tr>
        <td><?=$no++;?></td>
        <td><?=$b->buku_id;?></td>
        <td><?=$b->judul_buku;?></td>
        <td><?=$b->penulis;?></td>
        <td><?=$b->nama_kategori;?></td>
        <td><?=$b->stok;?></td>
        <td>
            <a href="<?= site_url('buku/edit/'.$b->buku_id);?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <a href="<?= site_url('buku/hapus/'.$b->buku_id);?>"
            onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
    </div>
    </div>
    </div>
    </div>