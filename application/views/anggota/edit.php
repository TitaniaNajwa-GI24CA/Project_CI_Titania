<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800"><b><i class="fas fa-edit"></i> Edit Anggota </b></h2>

<div class="card shadow">
    <div class="card-body">

<form method="post" action="<?= site_url('anggota/update/'.$anggota->id_anggota);?>">
    <div class="form-group">
    <input type="hidden" name="id_anggota" value="<?= $anggota->id_anggota; ?>">
    <label>Nama Anggota</label><br>
    <input type="text" name="nama_anggota" class="form-control" value="<?= $anggota->nama_anggota;?>" required>
    </div>

    <div class="form-group">
    <label>Alamat</label><br>
    <input type="textarea" name="alamat" class="form-control" value="<?= $anggota->alamat;?>" required>
    </div>

    <div class="form-group">
    <label>No Telp</label><br>
    <input type="tel" name="no_telp" class="form-control" value="<?= $anggota->no_telp;?>" required>
    </div>

    <br><br>

    <button type="submit" class="btn btn-primary mb-4">Update</button>
    <a href="<?= site_url('anggota');?>" class="btn btn-secondary mb-4">Kembali</a>
</form>

</div>
</div>
</div>