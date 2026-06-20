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
                        Rp <?= number_format($row->total_harga,0,',','.'); ?>
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

                            <a href="#"
                                class="edit-btn open-edit-order"
                                data-id="<?= $row->id_order; ?>"
                                data-kode="<?= $row->kode_order; ?>"
                                data-status="<?= $row->status; ?>">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
        </table>
    </div>
</div>

<div class="produk-modal" id="editOrderModal">
    <div class="produk-modal-box">

        <button class="close-produk-modal" id="closeEditOrderModal">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="produk-modal-header">
            <h3>Update Status Order</h3>
            <p>Perbarui status transaksi.</p>
        </div>

        <form action="<?= base_url('admin/order/update_status'); ?>" method="post">

            <input type="hidden" name="id_order" id="edit_id_order">

            <div class="produk-modal-grid">

                <div class="produk-input-group">
                    <label>Kode Order</label>
                    <input type="text"
                           id="edit_kode_order"
                           readonly>
                </div>

                <div class="produk-input-group">
                    <label>Status</label>

                    <select name="status"
                            id="edit_status_order"
                            required>

                        <option value="pending">Pending</option>
                        <option value="dikirim">Dikirim</option>
                        <option value="selesai">Selesai</option>
                        <option value="dibatalkan">Dibatalkan</option>

                    </select>
                </div>

            </div>

            <div class="modal-footer-custom">
                <button type="submit" class="produk-submit-btn">
                    Update Status
                </button>
            </div>

        </form>

    </div>
</div>