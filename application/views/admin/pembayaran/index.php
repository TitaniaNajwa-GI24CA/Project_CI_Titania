<div class="page-header">
   <a href="#" class="btn-primary" id="openCustomModal">
        <i class="fa-solid fa-plus"></i>
        Tambah Pembayaran
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="custom-table" id="project-datatable">
            <thead>
                <tr>
                    <th>Kode Pembayaran</th>
                    <th>Kode Order</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Bayar</th>
                    <th>Metode</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
           <tbody>
                <?php foreach($pembayaran as $row): ?>
                <tr>
                    <td><?= $row->kode_pembayaran; ?></td>

                    <td><?= $row->kode_order; ?></td>

                    <td><?= $row->nama_pelanggan; ?></td>

                    <td>
                        <?= date(
                            'd-m-Y',
                            strtotime($row->tanggal_pembayaran)
                        ); ?>
                    </td>

                    <td><?= $row->metode_pembayaran; ?></td>

                    <td>
                        Rp <?= number_format(
                            $row->total_bayar,
                            0,
                            ',',
                            '.'
                        ); ?>
                    </td>

                    <td>
                        <span class="badge-bayar
                        <?= strtolower(
                            str_replace(' ','-',
                            $row->status_pembayaran)
                        ); ?>">
                            <?= $row->status_pembayaran; ?>
                        </span>
                    </td>

                    <td>
                        <div class="table-action">

                            <a href="#"
                            class="edit-btn open-edit-pembayaran"
                            data-id="<?= $row->id_pembayaran; ?>"
                            data-tanggal="<?= $row->tanggal_pembayaran; ?>"
                            data-metode="<?= $row->metode_pembayaran; ?>"
                            data-status="<?= $row->status_pembayaran; ?>">

                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <a href="#"
                            class="delete-btn open-delete-modal"
                            data-url="<?= base_url('admin/pembayaran/delete/'.$row->id_pembayaran); ?>">

                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="produk-modal" id="customModal">
    <div class="produk-modal-box">
        <button class="close-produk-modal" id="closeCustomModal">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="produk-modal-header">
            <img src="<?= base_url('assets/img/logo-tulisan.png'); ?>"
                class="produk-modal-logo">
            <h3>Tambah Pembayaran</h3>
            <p>Tambahkan data pembayaran baru.</p>
        </div>

        <form action="<?= base_url('admin/pembayaran/simpan'); ?>" method="post">
            <div class="produk-modal-grid">

                <div class="produk-input-group">
                    <label>Order</label>
                     <select name="id_order" id="id_order" required>
                        <option value="">-- Pilih Order --</option>

                        <?php foreach($order as $o): ?>

                        <option
                            value="<?= $o->id_order; ?>"
                            data-total="<?= $o->total_order; ?>">

                            <?= $o->kode_order; ?> -
                            <?= $o->nama_pelanggan; ?>

                        </option>

                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="produk-input-group">
                    <label>Tanggal Pembayaran</label>
                    <input type="date"
                        name="tanggal_pembayaran">
                </div>

                <div class="produk-input-group">
                    <label>Metode Pembayaran</label>

                    <select name="metode_pembayaran">

                        <option>Transfer Bank</option>
                        <option>E-Wallet</option>
                        <option>Cash</option>

                    </select>
                </div>

                <div class="produk-input-group">
                    <label>Total Bayar</label>
                    <input type="text"
                        id="total_bayar_display"
                        readonly>

                    <input type="hidden"
                        name="total_bayar"
                        id="total_bayar">
                </div>

                <div class="produk-input-group produk-full">
                    <label>Status</label>

                    <select name="status_pembayaran">

                        <option value="Belum Bayar">
                            Belum Bayar
                        </option>

                        <option value="Menunggu Verifikasi">
                            Menunggu Verifikasi
                        </option>

                        <option value="Lunas">
                            Lunas
                        </option>

                    </select>
                </div>

            </div>

            <button type="submit"
            class="produk-submit-btn">
                Simpan Pembayaran
            </button>
        </form>
    </div>
</div>

<div class="produk-modal" id="editPembayaranModal">
    <div class="produk-modal-box">
        <button class="close-produk-modal" id="closeEditPembayaranModal">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="produk-modal-header">
            <img src="<?= base_url('assets/img/logo-tulisan.png'); ?>"
                class="produk-modal-logo">
            <h3>Edit Pembayaran</h3>
            <p>Perbarui data pembayaran.</p>
        </div>

        <form action="<?= base_url('admin/pembayaran/update'); ?>"method="post">
           <input type="hidden"
            name="id_pembayaran"
            id="edit_id_pembayaran">
            <div class="produk-modal-grid">
                <div class="produk-input-group">
                    <label>Tanggal Pembayaran</label>
                    <input type="date"
                        name="tanggal_pembayaran"
                        id="edit_tanggal">
                </div>

                <div class="produk-input-group">
                    <label>Metode Pembayaran</label>

                    <select
                        name="metode_pembayaran"
                        id="edit_metode">

                        <option>Transfer Bank</option>
                        <option>E-Wallet</option>
                        <option>Cash</option>

                    </select>
                </div>

                <div class="produk-input-group">
                    <label>Status Pembayaran</label>

                    <select
                        name="status_pembayaran"
                        id="edit_status_bayar">

                        <option value="Belum Bayar">
                            Belum Bayar
                        </option>

                        <option value="Menunggu Verifikasi">
                            Menunggu Verifikasi
                        </option>

                        <option value="Lunas">
                            Lunas
                        </option>
                    </select>
                </div>
            </div>
            <div class="modal-footer-custom">
                <button type="submit"
                    class="produk-submit-btn">
                    Update Pembayaran
                </button>
            </div>
        </form>
    </div>
</div>

<div class="delete-modal" id="deleteModal">
    <div class="delete-box">
        <div class="delete-icon">
            <i class="fa-solid fa-trash"></i>
        </div>
        <h3>Hapus Data?</h3>
        <p>
            Data yang sudah dihapus tidak dapat dikembalikan.
            Apakah kamu yakin ingin menghapus data ini?
        </p>
        <div class="delete-buttons">
            <button type="button" class="cancel-delete" id="closeDeleteModal">
                Batal
            </button>
            <a href="#" class="confirm-delete" id="confirmDeleteBtn">
                Ya, Hapus
            </a>
        </div>
    </div>
</div>