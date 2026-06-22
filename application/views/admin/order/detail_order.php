<div class="admin-detail-wrapper">
    <div class="detail-order-header">
        <div>
            <p>Detail Pesanan</p>
            <h1><?= $order_header->kode_order; ?></h1>
            <span><?= date('d F Y', strtotime($order_header->tanggal_order)); ?></span>
        </div>

        <div class="detail-status-group">
            <span class="order-status <?= strtolower($order_header->status); ?>">
                <?= ucwords(str_replace('_',' ', $order_header->status)); ?>
            </span>
        </div>
    </div>

    <div class="detail-order-grid">
        <div class="detail-main-card">
            <h3>Produk Dipesan</h3>
                <?php if(!empty($order_detail)): ?>
                    <?php foreach($order_detail as $item): ?>
                        <?php if(!empty($item)): ?>
                        <div class="detail-product-box">

                            <img src="<?= base_url('assets/img/produk/' . ($item->gambar ?? 'default.png')); ?>">

                            <div>
                                <h2><?= $item->nama_produk ?? '-'; ?></h2>
                                <p>Kode: <?= $item->kode_produk ?? '-'; ?></p>
                                <p>Qty: <?= $item->qty ?? 0; ?> pcs</p>
                                <p>Harga: Rp <?= number_format($item->harga ?? 0,0,',','.'); ?></p>
                                <p>Subtotal: Rp <?= number_format($item->subtotal ?? 0,0,',','.'); ?></p>
                            </div>

                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="padding:10px;">Tidak ada produk dalam order ini.</p>
                <?php endif; ?>
        </div>

        <div class="detail-side-card">
            <h3>Ringkasan</h3>

            <div class="summary-row">
                <span>Nama Pelanggan</span>
                <b><?= $order_header->nama_pelanggan; ?></b>
            </div>

            <div class="summary-row">
                <span>No Telp</span>
                <b><?= $order_header->no_telp; ?></b>
            </div>

            <div class="summary-row">
                <span>Metode Pembayaran</span>
                <b><?= $order_header->metode_pembayaran; ?></b>
            </div>

            <div class="summary-row">
                <span>Status</span>
                <b><?= ucfirst($order_header->status); ?></b>
            </div>

            <div class="summary-row">
                <span>Total Order</span>
                <b>Rp <?= number_format($order_header->total_order, 0, ',', '.'); ?></b>
            </div>
        </div>
    </div>
    <div class="detail-action-bottom">

        <a href="<?= base_url('sales/order'); ?>" class="back-detail-btn">
            Kembali
        </a>

        <a href="<?= base_url('sales/cetak-nota/'.$order_header->id_order); ?>"
           target="_blank"
           class="print-detail-btn">
            Cetak Nota
        </a>

    </div>

</div>