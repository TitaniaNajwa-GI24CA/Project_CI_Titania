<!DOCTYPE html>
<html>
<head>
<title>Laporan Penjualan</title>

<style>

body{
    font-family:Arial;
    padding:30px;
}

h2{
    text-align:center;
    margin-bottom:5px;
}

.subtitle{
    text-align:center;
    margin-bottom:20px;
}

table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    border:1px solid #000;
    padding:8px;
}

th{
    background:#f3f3f3;
}

</style>

</head>

<body onload="window.print()">

<h2>PT MAJU JAYA ELECTRONIC</h2>

<div class="subtitle">
    LAPORAN PENJUALAN
</div>

<p>
Periode :
<?= !empty($bulan) ? date('F',mktime(0,0,0,$bulan,1)) : 'Semua Bulan'; ?>
<?= !empty($tahun) ? $tahun : ''; ?>
</p>

<table>

<thead>
<tr>
    <th>No</th>
    <th>Kode Order</th>
    <th>Tanggal</th>
    <th>Pelanggan</th>
    <th>Sales</th>
    <th>Total Penjualan</th>
</tr>
</thead>

<tbody>

<?php
$no = 1;
$grand_total = 0;

foreach($laporan as $row):

$grand_total += $row->total_harga;
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $row->kode_order; ?></td>
    <td><?= date('d-m-Y',strtotime($row->tanggal_order)); ?></td>
    <td><?= $row->nama_pelanggan; ?></td>
    <td><?= $row->nama_sales; ?></td>
    <td>
        Rp <?= number_format($row->total_harga,0,',','.'); ?>
    </td>
</tr>

<?php endforeach; ?>

<tr>
    <td colspan="5">
        <b>Total Penjualan</b>
    </td>

    <td>
        <b>
            Rp <?= number_format($grand_total,0,',','.'); ?>
        </b>
    </td>
</tr>

</tbody>

</table>

</body>
</html>