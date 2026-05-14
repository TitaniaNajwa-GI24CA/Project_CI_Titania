<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 30px;
            color: #333;
            background: #f4f7fb;
        }

        .laporan-container{
            background: white;
            padding: 30px;
            border-radius: 14px;
            border: 1px solid #dbe4f0;
            box-shadow:
                0 5px 18px rgba(20,40,90,0.06);
        }

        .laporan-header{
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 2px solid #dbe4f0;
            padding-bottom: 18px;
        }

        .laporan-header h2{
            margin: 0;
            color: #1e3a5f;
            font-size: 28px;
            font-weight: bold;
        }
        .laporan-header p{
            margin-top: 6px;
            font-size: 14px;
            color: #666;
        }
        .filter-info{
            margin-bottom: 18px;

            font-size: 14px;

            color: #1e3a5f;

            font-weight: 600;
        }
        table{
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        table thead th{
            background: linear-gradient(
                180deg,
                #1e3a5f 0%,
                #5a89c4 100%
            );
            color: white;
            padding: 13px;
            font-size: 13px;
            text-transform: uppercase;
            border: 1px solid black;
        }

        table tbody td{
            padding: 12px;
            border: 1px solid black;
            font-size: 14px;
        }

        .footer{
            margin-top: 50px;
            text-align: right;
            font-size: 14px;
            color: #444;
        }

        .ttd{
            margin-top: 65px;
            font-weight: bold;
            color: #1e3a5f;
        }

        .img-ttd{
            width: 120px;
            margin-bottom: 8px;
        }

        @media print{

            body{
                margin: 0;
                background: white;
            }

            .laporan-container{
                box-shadow: none;
                border: none;
            }

        }

    </style>

</head>

<body>

    <div class="laporan-container">
        <div class="laporan-header">
            <h2>Laporan Peminjaman</h2>
        </div>

        <div class="filter-info">
            Bulan :
            <b>
                <?= date('F Y'); ?>
            </b>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach($data as $d): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d->kode_peminjaman; ?></td>
                    <td><?= $d->nama_anggota; ?></td>
                    <td><?= $d->tanggal_pinjam; ?></td>
                    <td><?= $d->status; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="footer">
            Tangerang,
            <?= date('d F Y'); ?>
            <div class="ttd">
                <b>Admin Perpustakaan</b>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>

</body>
</html>