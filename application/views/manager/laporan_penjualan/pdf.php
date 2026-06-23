<!DOCTYPE html>
<html>
<head>
<title>Laporan Penjualan</title>

<style>

body{
    font-family: Arial, sans-serif;
    margin: 30px;
    color:#333;
    font-size:13px;
}

/* HEADER */
.header{
    display:flex;
    align-items:center;
    margin-bottom:15px;
}

.logo{
    width:80px;
    margin-right:15px;
}

.company-info h1{
    margin:0;
    color:#c2410c;
    font-size:24px;
}

.company-info p{
    margin:2px 0;
    font-size:12px;
}

.line{
    border-top:3px solid #c2410c;
    margin-top:10px;
}

.line2{
    border-top:1px solid #333;
    margin-top:2px;
    margin-bottom:25px;
}

/* JUDUL */
.report-title{
    text-align:center;
    margin-bottom:20px;
}

.report-title h2{
    margin:0;
    color:#c2410c;
    font-size:22px;
}

.report-title p{
    margin-top:5px;
    color:#666;
}

.info-laporan{
    margin-bottom:20px;
}

.info-laporan table{
    width:auto;
}

.info-laporan td{
    border:none;
    padding:3px 8px 3px 0;
}

/* TABEL */
table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#c2410c;
    color:white;
    padding:10px;
    border:1px solid #a5390e;
}

td{
    padding:8px;
    border:1px solid #ddd;
}

tbody tr:nth-child(even){
    background:#fff7f3;
}

.total-row{
    background:#fde7da;
    font-weight:bold;
}

.total-row td{
    border-top:2px solid #c2410c;
}

/* FOOTER */
.signature{
    margin-top:60px;
    width:300px;
    float:right;
    text-align:center;
}

.signature p{
    margin:5px 0;
}

.signature .nama{
    margin-top:70px;
    font-weight:bold;
    text-decoration:underline;
}

.print-date{
    margin-top:20px;
    font-size:12px;
    color:#666;
}

</style>
</head>

<body onload="window.print()">

<!-- HEADER -->

<div class="header">

    <img
        src="<?= base_url('assets/img/logo-img.png'); ?>"
        class="logo">

    <div class="company-info">

        <h1>PT MAJU JAYA ELECTRONIC</h1>

        <p>
            Jl. Raya Industri No. 123, Tangerang, Banten
        </p>

        <p>
            Telp : (021) 12345678 |
            Email : info@majujayaelectronic.com
        </p>

        <p>
            Website : www.majujayaelectronic.com
        </p>

    </div>

</div>

<div class="line"></div>
<div class="line2"></div>

<!-- JUDUL -->

<div class="report-title">

    <h2>LAPORAN PENJUALAN</h2>

    <p>
        Data Penjualan Produk PT Maju Jaya Electronic
    </p>

</div>

<div class="info-laporan">
    <table>
        <tr>
            <td width="120"><b>Periode</b></td>
            <td>:</td>
            <td>
                <?= !empty($bulan)
                    ? date('F', mktime(0,0,0,$bulan,1))
                    : 'Semua Bulan'; ?>

                <?= !empty($tahun)
                    ? $tahun
                    : ''; ?>
            </td>
        </tr>

        <tr>
            <td><b>Tanggal Cetak</b></td>
            <td>:</td>
            <td><?= date('d F Y'); ?></td>
        </tr>

    </table>

</div>


<table>
    <thead>
        <tr>
            <th width="50">No</th>
            <th>Kode Order</th>
            <th>Produk</th>
            <th>Tanggal Order</th>
            <th>Tanggal Pembayaran</th>
            <th>Pelanggan</th>
            <th>Sales</th>
            <th>Total Penjualan</th>
            </tr>
        </thead>

    <tbody>
                <?php $no = 1; foreach($laporan as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->kode_order; ?></td>
                    <td><?= $row->nama_produk; ?></td>
                    <td>
                        <?= date(
                            'd-m-Y',
                            strtotime($row->tanggal_order)
                        ); ?>
                    </td>
                    <td>
                        <?= date(
                            'd-m-Y',
                            strtotime($row->tanggal_pembayaran)
                        ); ?>
                    </td>
                    <td><?= $row->nama_pelanggan; ?></td>
                    <td><?= $row->nama_sales; ?></td>

                    <td>
                        Rp <?= number_format(
                            $row->total_order,
                            0,
                            ',',
                            '.'
                        ); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
</table>

<div class="print-date">
    Dicetak oleh sistem pada <?= date('d F Y H:i'); ?>
</div>

<div class="signature">

    <p>Tangerang, <?= date('d F Y'); ?></p>

    <p>Mengetahui,</p>

    <p class="nama">
        Administrator
    </p>

</div>

</body>
</html>