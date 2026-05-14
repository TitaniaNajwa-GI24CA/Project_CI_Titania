<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800"><b><i class="fas fa-plus-circle"></i> Tambah Anggota </b></h2>

<div class="card shadow">
    <div class="card-body">

<form method="post" action="<?= site_url('anggota/simpan');?>">
    <div class="form-group">
    <label>Nama Anggota</label><br>
    <input type="text" name="nama_anggota" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Alamat</label><br>
    <input type="textarea" name="alamat" class="form-control" required>
    </div>

    <div class="form-group">
    <label>No Telp</label><br>
    <input type="tel" name="no_telp" class="form-control" required>
    </div>

    <br><br>

    <button type="submit" class="btn btn-primary mb-4">Simpan</button>
    <a href="<?= site_url('anggota');?>" class="btn btn-secondary mb-4">Kembali</a>
</form>

</div>
</div>
</div>