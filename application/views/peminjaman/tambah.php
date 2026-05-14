<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800"><b><i class="fas fa-plus-circle"></i> Tambah Peminjaman</b></h2>

<div class="card shadow">
    <div class="card-body">

<form method="post" action="<?= site_url('peminjaman/simpan');?>">
   <div class="form-group">
    <label>Anggota</label>
    <select name="anggota_id" class="form-control" required>
        <option value="">-- Pilih Anggota --</option>
        <?php foreach ($anggota as $a): ?>
            <option value="<?= $a->id_anggota ?>">
                <?= $a->nama_anggota ?>
            </option>
        <?php endforeach;?>
    </select>
    </div>

    <div class="form-group">
    <label>Buku</label>
    <select name="buku_id" class="form-control" required>
        <option value="">-- Pilih Buku --</option>
        <?php foreach ($buku as $b): ?>
            <option value="<?= $b->buku_id ?>">
                <?= $b->judul_buku ?>
            </option>
        <?php endforeach;?>
    </select>
    </div>
    
    <div class="form-group">
    <label>Tanggal Jatuh Tempo</label><br>
    <input type="date" name="tanggal_jatuh_tempo" class="form-control" required>
    </div>
    <br><br>

    <button type="submit" class="btn btn-primary mb-4">Simpan</button>
    <a href="<?= site_url('peminjaman');?>" class="btn btn-secondary mb-4">Kembali</a>
</form>

</div>
</div>
</div>