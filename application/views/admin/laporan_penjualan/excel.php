<?php

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan.xls");

?>

<table border="1">

<tr>
    <th>No</th>
    <th>Kode Order</th>
    <th>Produk</th>
    <th>Tanggal Order</th>
    <th>Tanggal Pembayaran</th>
    <th>Pelanggan</th>
    <th>Sales</th>
    <th>Total Penjualan</th>
</tr>

<?php
$no = 1;
$total = 0;

foreach($laporan as $row):

$total += $row->total_order;
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $row->kode_order; ?></td>
    <td><?= $row->nama_produk; ?></td>
    <td>
       <?= date('d-m-Y',strtotime($row->tanggal_order)); ?>
    </td>
    <td>
        <?= date('d-m-Y',strtotime($row->tanggal_pembayaran)); ?>
    </td>
    <td><?= $row->nama_pelanggan; ?></td>
    <td><?= $row->nama_sales; ?></td>
    <td><?= $row->total_order; ?></td>
</tr>
<?php endforeach; ?>
<tr>
    <td colspan="7">
        <b>Total Penjualan</b>
    </td>

    <td>
        <b><?= $total; ?></b>
    </td>
</tr>

</table>