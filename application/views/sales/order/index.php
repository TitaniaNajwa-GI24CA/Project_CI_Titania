<div class="table-card order-page">
    <div class="table-responsive">
        <table class="custom-table" id="project-datatable">
            <thead>
                <tr>
                    <th>Kode Order</th>
                    <th>Tanggal Order</th>
                    <th>Pelanggan</th>
                    <th>Sales</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($order as $row): ?>
                <tr>
                    <td>
                        <strong><?= $row->kode_order; ?></strong>
                    </td>

                    <td data-bulan="<?= date('m', strtotime($row->tanggal_order)); ?>">
                        <?= date('d M Y', strtotime($row->tanggal_order)); ?>
                    </td>

                    <td>
                        <?= $row->nama_pelanggan; ?>
                    </td>

                    <td>
                        <?= $row->nama_sales; ?>
                    </td>

                    <td>
                        Rp <?= number_format($row->total_order,0,',','.'); ?>
                    </td>

                    <td>

                        <?php if($row->status == 'pending'): ?>

                            <span class="badge-pending">
                                <i class="fa-solid fa-clock"></i>
                                Pending
                            </span>

                        <?php elseif($row->status == 'dikirim'): ?>

                            <span class="badge-dikirim">
                                <i class="fa-solid fa-truck"></i>
                                Dikirim
                            </span>

                        <?php elseif($row->status == 'selesai'): ?>

                            <span class="badge-selesai">
                                <i class="fa-solid fa-circle-check"></i>
                                Selesai
                            </span>

                        <?php else: ?>
                            <span class="badge-batal">
                                <i class="fa-solid fa-circle-xmark"></i>
                                Dibatalkan
                            </span>
                        <?php endif; ?>

                    </td>

                    <td>
                        <div class="table-action">
                            <a href="<?= base_url('sales/detail-order/'.$row->id_order); ?>"
                            class="view-btn">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
        </table>
    </div>
</div>