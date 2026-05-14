<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800"><b><i class="fas fa-plus-circle"></i> Tambah Buku </b></h2>

<div class="card shadow">
    <div class="card-body">

<form method="post" action="<?= site_url('buku/simpan');?>">
    <div class="form-group">
    <label>Judul Buku</label><br>
    <input type="text" name="judul_buku" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Penulis</label><br>
    <input type="text" name="penulis" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Penerbit</label><br>
    <input type="text" name="penerbit" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Tahun</label><br>
    <input type="text" name="tahun" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Kategori</label>
    <select name="kategori" class="form-control" required>
        <option value="">-- Pilih Kategori --</option>
        <?php foreach ($kategori as $k) { ?>
            <option value="<?= $k->id ?>">
                <?= $k->nama_kategori ?>
            </option>
        <?php } ?>
    </select>
    </div>

    <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Lokasi Rak</label>
        <select name="lokasi_rak" class="form-control" required>
            <option value="">-- Pilih Rak --</option>
            <option value="Rak A">Rak A</option>
            <option value="Rak B">Rak B</option>
            <option value="Rak C">Rak C</option>
            <option value="Rak D">Rak D</option>
            <option value="Rak E">Rak E</option>
        </select>
    </div>

    <br><br>

    <button type="submit" class="btn btn-primary mb-4">Simpan</button>
    <a href="<?= site_url('buku');?>" class="btn btn-secondary mb-4">Kembali</a>
</form>

</div>
</div>
</div>