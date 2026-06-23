<!DOCTYPE html>

<html>
<head>
<title>Nota Pesanan</title>

<style>

body{
    font-family: Arial, sans-serif;
    margin:30px;
    color:#333;
}

.invoice-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    border-bottom:3px solid #c2410c;
    padding-bottom:15px;
    margin-bottom:25px;
}

.company{
    display:flex;
    align-items:center;
    gap:15px;
}

.company img{
    width:70px;
}

.company h2{
    margin:0;
    color:#c2410c;
}

.company p{
    margin:2px 0;
    font-size:12px;
}

.invoice-title{
    text-align:right;
}

.invoice-title h1{
    margin:0;
    color:#c2410c;
}

.invoice-title p{
    margin:3px 0;
}

.customer-box{
    display:flex;
    justify-content:space-between;
    margin-bottom:25px;
}

.customer-info,
.order-info{
    width:48%;
    background:#fff7f3;
    padding:15px;
    border-radius:12px;
}

.customer-info h4,
.order-info h4{
    margin-top:0;
    color:#c2410c;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
}

table th{
    background:#c2410c;
    color:white;
    padding:12px;
}

table td{
    padding:10px;
    border-bottom:1px solid #eee;
}

.text-center{
    text-align:center;
}

.text-right{
    text-align:right;
}

.total-box{
    margin-top:20px;
    width:350px;
    margin-left:auto;
}

.total-row{
    display:flex;
    justify-content:space-between;
    padding:10px;
    border-bottom:1px solid #eee;
}

.grand-total{
    background:#c2410c;
    color:white;
    font-weight:bold;
    border-radius:8px;
}

.footer-note{
    margin-top:40px;
    text-align:center;
    color:#777;
    font-size:12px;
}

.signature{
    margin-top:60px;
    text-align:right;
}

.signature-name{
    margin-top:70px;
    font-weight:bold;
    text-decoration:underline;
}

</style>

</head>

<body onload="window.print()">

<div class="invoice-header">


<div class="company">

    <img src="<?= base_url('assets/img/logo-img.png'); ?>">

    <div>
        <h2>PT MAJU JAYA ELECTRONIC</h2>

        <p>Jl. Raya Industri No.123 Tangerang</p>
        <p>Telp : (021) 12345678</p>
        <p>Email : info@majujayaelectronic.com</p>
    </div>

</div>

<div class="invoice-title">

    <h1>NOTA PESANAN</h1>

    <p>
        <?= $order_header->kode_order; ?>
    </p>

</div>


</div>

<div class="customer-box">


<div class="customer-info">

    <h4>Data Pelanggan</h4>

    <p>
        <b>Nama :</b>
        <?= $order_header->nama_pelanggan; ?>
    </p>

    <p>
        <b>No Telp :</b>
        <?= $order_header->no_telp; ?>
    </p>

</div>

<div class="order-info">

    <h4>Informasi Pesanan</h4>

    <p>
        <b>Tanggal :</b>
        <?= date('d F Y',strtotime($order_header->tanggal_order)); ?>
    </p>

    <p>
        <b>Status :</b>
        <?= ucfirst($order_header->status); ?>
    </p>

    <p>
        <b>Sales :</b>
        <?= $order_header->nama_sales; ?>
    </p>

</div>


</div>

<table>


<thead>

    <tr>
        <th width="50">No</th>
        <th>Produk</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Subtotal</th>
    </tr>

</thead>

<tbody>

<?php
$no = 1;
$grand_total = 0;

foreach($order_detail as $item):

$grand_total += $item->subtotal;
?>

<tr>

    <td class="text-center">
        <?= $no++; ?>
    </td>

    <td>
        <?= $item->nama_produk; ?>
    </td>

    <td class="text-right">
        Rp <?= number_format($item->harga,0,',','.'); ?>
    </td>

    <td class="text-center">
        <?= $item->qty; ?>
    </td>

    <td class="text-right">
        Rp <?= number_format($item->subtotal,0,',','.'); ?>
    </td>

</tr>

<?php endforeach; ?>

</tbody>


</table>

<div class="total-box">


<div class="total-row grand-total">

    <span>TOTAL PESANAN</span>

    <span>
        Rp <?= number_format($grand_total,0,',','.'); ?>
    </span>

</div>


</div>

<div class="signature">


Tangerang,
<?= date('d F Y'); ?>

<div class="signature-name">
    <?= $order_header->nama_sales; ?>
</div>

<small>Sales Representative</small>


</div>

<div class="footer-note">


Terima kasih telah melakukan pemesanan di
PT Maju Jaya Electronic.


</div>

</body>
</html>
