<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800"><b><i class="fas fa-edit"></i> Edit Buku </b></h2>

<div class="card shadow">
    <div class="card-body">

<form method="post" action="<?= site_url('buku/update/'.$buku->buku_id);?>">
    <div class="form-group">
    <input type="hidden" name="buku_id" value="<?= $buku->buku_id; ?>">
    <label>Judul Buku</label><br>
    <input type="text" name="judul_buku" class="form-control" value="<?= $buku->judul_buku;?>" required>
    </div>

    <div class="form-group">
    <label>Penulis</label><br>
    <input type="text" name="penulis" class="form-control" value="<?= $buku->penulis;?>" required>
    </div>

    <div class="form-group">
    <label>Penerbit</label><br>
    <input type="text" name="penerbit" class="form-control" value="<?= $buku->penerbit;?>" required>
    </div>

    <div class="form-group">
    <label>Tahun</label><br>
    <input type="text" name="tahun" class="form-control" value="<?= $buku->tahun;?>" required>
    </div>

    <div class="form-group">
    <label>Kategori</label><br>
    <select name="kategori" class="form-control" required>
        <option value="">-- Pilih Kategori --</option>
        <?php foreach ($kategori as $k) { ?>
            <option value="<?= $k->id ?>"
                <?= ($k->id == $buku->kategori) ? 'selected' : '' ?>>
                <?= $k->nama_kategori ?>
            </option>
        <?php } ?>
    </select>
    </div>

    <div class="form-group">
    <label>Stok</label><br>
    <input type="text" name="stok" class="form-control" value="<?= $buku->stok;?>" required>
    </div>

    <div class="form-group">
    <label>Lokasi Rak</label><br>
    <select name="lokasi_rak" class="form-control" required>
        <option value="">-- Pilih Rak --</option>
        <option value="Rak A" <?= ($buku->lokasi_rak == 'Rak A') ? 'selected' : '' ?>>Rak A</option>
        <option value="Rak B" <?= ($buku->lokasi_rak == 'Rak B') ? 'selected' : '' ?>>Rak B</option>
        <option value="Rak C" <?= ($buku->lokasi_rak == 'Rak C') ? 'selected' : '' ?>>Rak C</option>
        <option value="Rak D" <?= ($buku->lokasi_rak == 'Rak D') ? 'selected' : '' ?>>Rak D</option>
        <option value="Rak E" <?= ($buku->lokasi_rak == 'Rak E') ? 'selected' : '' ?>>Rak E</option>
    </select>
    </div>

    <br><br>

    <button type="submit" class="btn btn-primary mb-4">Update</button>
    <a href="<?= site_url('buku');?>" class="btn btn-secondary mb-4">Kembali</a>
</form>

</div>
</div>
</div>