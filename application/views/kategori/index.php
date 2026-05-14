<div class="container-fluid">
<h2><b><i class="fas fa-tags"></i>Data Kategori</b></h2>

<a href="<?=site_url('kategori/tambah');?>" class="btn btn-primary mb-3">Tambah Data</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
<table class="table custom-table" width="100%" cellspasing="0" id="dataTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($kategori as $k): ?>
    <tr>
        <td><?=$no++;?></td>
        <td><?=$k->nama_kategori;?></td>
        <td>
            <a href="<?= site_url('kategori/edit/'.$k->id);?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <a href="<?= site_url('kategori/hapus/'.$k->id);?>"
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