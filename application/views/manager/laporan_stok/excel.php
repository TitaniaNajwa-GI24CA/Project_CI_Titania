<?php

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Barang_Stok.xls");

?>

<table border="1">

<tr>
    <th>No</th>
    <th>Kode Produk</th>
    <th>Nama Produk</th>
    <th>Kategori</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Total Terjual</th>
    <th>Total Penjualan</th>
</tr>

<?php
$no = 1;

foreach($laporan as $row):
?>

<tr>

    <td><?= $no++; ?></td>

    <td><?= $row->kode_produk; ?></td>

    <td><?= $row->nama_produk; ?></td>

    <td><?= $row->nama_kategori; ?></td>

    <td><?= $row->harga; ?></td>

    <td><?= $row->stok; ?></td>

    <td><?= $row->total_terjual; ?></td>

    <td><?= $row->total_penjualan; ?></td>

</tr>

<?php endforeach; ?>

</table>