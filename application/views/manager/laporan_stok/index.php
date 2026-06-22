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

    <div class="filter-action">
        <button type="submit" class="btn-filter">
            <i class="fa-solid fa-filter"></i>
            Filter
        </button>
    </div>

    <div class="filter-action">
        <a href="<?= base_url('manager/laporan_stok/export_excel?'.http_build_query($_GET)); ?>"
            class="btn-excel">
                <i class="fa-solid fa-file-excel"></i>
                Export Excel
        </a>
    </div>

    <div class="filter-action">
        <a href="<?= base_url('manager/laporan_stok/print_laporan?'.http_build_query($_GET)); ?>"
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
                    <th>Ranking</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok Saat Ini</th>
                    <th>Total Terjual</th>
                    <th>Total Penjualan</th>
                    <th>Status Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php $ranking = 1; foreach($laporan as $row):?>
                <tr>

                    <td>
                        <?= $ranking++; ?>
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

                    <td>
                        Rp <?= number_format(
                            $row->harga,
                            0,
                            ',',
                            '.'
                        ); ?>
                    </td>

                    <td>
                        <?= $row->stok; ?>
                    </td>

                    <td>
                        <?= $row->total_terjual; ?>
                    </td>

                    <td>
                        Rp <?= number_format(
                            $row->total_penjualan,
                            0,
                            ',',
                            '.'
                        ); ?>
                    </td>

                    <td>

                        <?php if($row->stok <= 5): ?>

                            <span class="badge-stok-habis">
                                Hampir Habis
                            </span>

                        <?php elseif($row->stok <= 15): ?>

                            <span class="badge-stok-warning">
                                Menipis
                            </span>

                        <?php else: ?>
                            <span class="badge-stok-aman">
                                Aman
                            </span>
                        <?php endif; ?>
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