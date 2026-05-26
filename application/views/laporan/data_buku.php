<div class="container-fluid">
    <h2><b><i class="fas fa-chart-line"></i> Laporan Data Buku</b></h2>
    <form method="get">
        <select name="kategori" class="form-control" required>
        <option value="">-- Pilih Kategori --</option>
        <?php foreach ($kategori as $k) { ?>
            <option value="<?= $k->id ?>">
                <?= $k->nama_kategori ?>
            </option>
        <?php } ?>
        </select>
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="<?= site_url('laporan/data_buku'); ?>" class="btn btn-secondary btn-sm">Reset</a>
    </form>

    <br>
    <a href ="<?= site_url('data_buku/cetak_data_buku?kategori='.$kategori_terpilih); ?>" target="_blank" class="btn btn-success btn-sm">Cetak PDF</a>

    <table class="table custom-table" width="100%" cellspasing="0" id="dataTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($data as $d): ?>
    <tr>
        <td><?=$no++;?></td>
        <td><?=$d->buku_id;?></td>
        <td><?=$d->judul_buku;?></td>
        <td><?=$d->nama_kategori;?></td>
        <td><?=$d->stok;?></td>
    </tr>
     <?php endforeach;?>
    </tbody>
    </table>
</div>

