<div class="container-fluid">

<h2><b><i class="fas fa-users"></i> Data Anggota</b></h2>

<a href="<?=site_url('anggota/tambah');?>" class="btn btn-primary mb-3">Tambah Data Anggota <i class="fas fa-plus-circle"></i></a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
<table class="table custom-table" width="100%" cellspasing="0" id="dataTable">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Anggota</th>
            <th>Nama Anggota</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($anggota as $a): ?>
    <tr>
        <td><?=$no++;?></td>
        <td><?=$a->id_anggota;?></td>
        <td><?=$a->nama_anggota;?></td>
        <td><?=$a->alamat;?></td>
        <td><?=$a->no_telp;?></td>
        <td>
            <a href="<?= site_url('anggota/edit/'.$a->id_anggota);?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <a href="<?= site_url('anggota/hapus/'.$a->id_anggota);?>"
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