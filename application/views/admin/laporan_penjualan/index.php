<div class="table-card">
    <form method="get" class="report-filter">
    <div class="filter-group">
        <label>Bulan</label>
        <select name="bulan">
            <option value="">Semua Bulan</option>

            <?php
            $bulan = [
                1=>'Januari',
                2=>'Februari',
                3=>'Maret',
                4=>'April',
                5=>'Mei',
                6=>'Juni',
                7=>'Juli',
                8=>'Agustus',
                9=>'September',
                10=>'Oktober',
                11=>'November',
                12=>'Desember'
            ];

            foreach($bulan as $key => $value):
            ?>
                <option value="<?= $key ?>"
                    <?= ($this->input->get('bulan') == $key ? 'selected' : ''); ?>>
                    <?= $value ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="filter-group">
        <label>Tahun</label>
        <select name="tahun">
            <option value="">Semua Tahun</option>

            <?php for($i=date('Y'); $i>=2020; $i--): ?>
                <option value="<?= $i ?>"
                    <?= ($this->input->get('tahun') == $i ? 'selected' : ''); ?>>
                    <?= $i ?>
                </option>
            <?php endfor; ?>
        </select>
    </div>

    <div class="filter-group">
        <label>Sales</label>
        <select name="sales">
            <option value="">Semua Sales</option>

            <?php foreach($sales as $s): ?>
                <option value="<?= $s->id_sales ?>"
                    <?= ($this->input->get('sales') == $s->id_sales ? 'selected' : ''); ?>>
                    <?= $s->nama_sales ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="filter-group">
        <label>Produk</label>
        <select name="produk">
            <option value="">Semua Produk</option>

            <?php foreach($produk as $p): ?>
                <option value="<?= $p->id_produk ?>"
                    <?= ($this->input->get('produk') == $p->id_produk ? 'selected' : ''); ?>>
                    <?= $p->nama_produk ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="filter-action">
        <button type="submit" class="btn-filter">
            <i class="fa-solid fa-filter"></i>
            Filter
        </button>
    </div>

    <div class="filter-action">
        <a href="<?= base_url('admin/laporan_penjualan/export_excel?'.http_build_query($_GET)); ?>"
            class="btn-excel">
                <i class="fa-solid fa-file-excel"></i>
                Export Excel
        </a>
    </div>

    <div class="filter-action">
        <a href="<?= base_url('admin/laporan_penjualan/print_laporan?'.http_build_query($_GET)); ?>"
            target="_blank"
            class="btn-pdf">
                <i class="fa-solid fa-print"></i>
                Cetak PDF
        </a>
    </div>

</form>
    <div class="table-responsive">
        <table class="custom-table" id="laporan-datatable">
            <thead>
                <tr>
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
                <?php foreach($laporan as $row): ?>
                <tr>
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

    <div class="report-summary">
        <div class="summary-item">
            Total Transaksi :
            <strong><?= $total_transaksi; ?></strong>
        </div>

        <div class="summary-item">
            Total Penjualan :
            <strong>
                Rp <?= number_format(
                    $total_penjualan,
                    0,
                    ',',
                    '.'
                ); ?>
            </strong>
        </div>
    </div>
    </div>
</div>