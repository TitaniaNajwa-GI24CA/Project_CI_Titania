<?php

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan.xls");

?>

<table border="1">

<tr>
    <th>No</th>
    <th>Kode Order</th>
    <th>Tanggal Order</th>
    <th>Pelanggan</th>
    <th>Sales</th>
    <th>Total Penjualan</th>
</tr>

<?php
$no = 1;
$total = 0;

foreach($laporan as $row):

$total += $row->total_harga;
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $row->kode_order; ?></td>
    <td><?= $row->tanggal_order; ?></td>
    <td><?= $row->nama_pelanggan; ?></td>
    <td><?= $row->nama_sales; ?></td>
    <td><?= $row->total_harga; ?></td>
</tr>

<?php endforeach; ?>

<tr>
    <td colspan="5">
        <b>Total Penjualan</b>
    </td>

    <td>
        <b><?= $total; ?></b>
    </td>
</tr>

</table>