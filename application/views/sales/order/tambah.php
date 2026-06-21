<div class="order-card">

    <div class="produk-modal-header">
        <img src="<?= base_url('assets/img/logo-tulisan.png'); ?>" class="produk-modal-logo">

        <h3>Tambah Order</h3>
        <p>Buat transaksi pesanan baru.</p>
    </div>

    <form action="<?= base_url('sales/order/simpan'); ?>" method="post">
        <!-- INFORMASI ORDER -->
        <div class="produk-modal-grid">

            <div class="produk-input-group">
                <label>Tanggal Order</label>

                <input type="date"
                       name="tanggal_order"
                       value="<?= date('Y-m-d'); ?>"
                       required>
            </div>

            <div class="produk-input-group">
                <label>Pelanggan</label>

                <select name="id_pelanggan" required>

                    <option value="">
                        -- Pilih Pelanggan --
                    </option>

                    <?php foreach($pelanggan as $p): ?>

                    <option value="<?= $p->id_pelanggan; ?>">
                        <?= $p->nama_pelanggan; ?>
                    </option>

                    <?php endforeach; ?>

                </select>
            </div>
        </div>

        <!-- DETAIL PRODUK -->
        <div class="order-detail-card">

            <div class="detail-header">
                <h4>Detail Produk</h4>
            </div>

            <table class="order-detail-table">

                <thead>
                    <tr>
                        <th>Produk</th>
                        <th width="180">Harga</th>
                        <th width="120">Qty</th>
                        <th width="180">Subtotal</th>
                        <th width="80">Aksi</th>
                    </tr>
                </thead>

                <tbody id="detail-order">
                    <tr>
                        <td>
                            <select name="id_produk[]"
                                    class="produk-select"
                                    required>

                                <option value="">
                                    -- Pilih Produk --
                                </option>

                                <?php foreach($produk as $row): ?>

                                <option
                                    value="<?= $row->id_produk; ?>"
                                    data-harga="<?= $row->harga; ?>"
                                    data-stok="<?= $row->stok; ?>">
                                    <?= $row->nama_produk; ?>
                                </option>

                                <?php endforeach; ?>

                            </select>
                        </td>

                        <td>
                            <input type="number"
                                   name="harga[]"
                                   class="harga"
                                   readonly>
                        </td>

                        <td>
                            <input type="number"
                                   name="qty[]"
                                   class="qty"
                                   min="1"
                                   required>
                        </td>

                        <td>
                            <input type="number"
                                   name="subtotal[]"
                                   class="subtotal"
                                   readonly>
                        </td>

                        <td>
                            <button type="button"
                                    class="hapus-row">

                                <i class="fa-solid fa-trash"></i>

                            </button>
                        </td>

                    </tr>

                </tbody>

            </table>

            <div class="order-action">
                <button
                    type="button"
                    id="btnTambahProduk"
                    class="btn-add-product">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Produk
                </button>
            </div>

        </div>

        <!-- TOTAL -->
        <div class="produk-modal-grid">

            <div class="produk-input-group produk-full">

                <label>Total Order</label>

                <input type="text"
                       id="grand_total"
                       readonly
                       value="Rp 0">

            </div>

        </div>

        <!-- BUTTON -->
        <div class="modal-footer-custom">
            <button type="submit"
                    class="produk-submit-btn">
                Simpan Order
            </button>
        </div>
    </form>

</div>

<?php if($this->session->flashdata('success')): ?>
<div id="successModal" class="custom-modal">
    <div class="modal-box">
        <button class="close-btn" onclick="closeModal()">×</button>

        <h3>Success 🎉</h3>
        <p><?= $this->session->flashdata('success'); ?></p>
        <div class="modal-footer">
            <a href="<?= base_url('sales/order/nota_terakhir'); ?>" class="btn-nota">
                Lihat Nota Order
            </a>
        </div>

    </div>
</div>
<?php endif; ?>