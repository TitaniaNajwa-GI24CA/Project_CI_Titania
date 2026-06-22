<!DOCTYPE html>
<html>
<head>
<title>Laporan Barang & Stok</title>

<style>

body{
    font-family:Arial,sans-serif;
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
    margin-top:20px;
}

th,
td{
    border:1px solid #000;
    padding:8px;
    font-size:13px;
}

th{
    background:#f2f2f2;
}

.text-center{
    text-align:center;
}

.text-right{
    text-align:right;
}

.footer{
    margin-top:30px;
    text-align:right;
}

</style>

</head>

<body onload="window.print()">

<h2>PT MAJU JAYA ELECTRONIC</h2>

<div class="subtitle">
    LAPORAN BARANG & STOK
</div>

<p>
Periode :
<?= !empty($bulan)
    ? date('F',mktime(0,0,0,$bulan,1))
    : 'Semua Bulan'; ?>

<?= !empty($tahun)
    ? $tahun
    : ''; ?>
</p>

<table>

<thead>

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

</thead>

<tbody>

<?php
$no = 1;

$total_terjual = 0;
$total_penjualan = 0;

foreach($laporan as $row):

$total_terjual += $row->total_terjual;
$total_penjualan += $row->total_penjualan;
?>

<tr>

    <td class="text-center">
        <?= $no++; ?>
    </td>

    <td>
        <?= $row->kode_produk; ?>
    </td>

    <td>
        <?= $row->nama_produk; ?>
    </td>

    <td>
        <?= $row->nama_kategori; ?>
    </td>

    <td class="text-right">
        Rp <?= number_format(
            $row->harga,
            0,
            ',',
            '.'
        ); ?>
    </td>

    <td class="text-center">
        <?= $row->stok; ?>
    </td>

    <td class="text-center">
        <?= $row->total_terjual; ?>
    </td>

    <td class="text-right">
        Rp <?= number_format(
            $row->total_penjualan,
            0,
            ',',
            '.'
        ); ?>
    </td>

</tr>

<?php endforeach; ?>

<tr>

    <td colspan="6">
        <b>Total</b>
    </td>

    <td class="text-center">
        <b><?= $total_terjual; ?></b>
    </td>

    <td class="text-right">
        <b>
            Rp <?= number_format(
                $total_penjualan,
                0,
                ',',
                '.'
            ); ?>
        </b>
    </td>

</tr>

</tbody>

</table>

<div class="footer">

    Tangerang,
    <?= date('d-m-Y'); ?>

    <br><br><br><br>

    <b>Administrator</b>

</div>

</body>
</html>