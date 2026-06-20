<div class="page-header">
   <a href="#" class="btn-primary" id="openCustomModal">
        <i class="fa-solid fa-plus"></i>
        Tambah Sales
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="custom-table" id="project-datatable">
            <thead>
                <tr>
                    <th>Kode Sales</th>
                    <th>Nama Sales</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Total Penjualan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
           <tbody>
                <?php foreach($sales as $row): ?>
                <tr>
                    <td><?= $row->kode_sales; ?></td>

                    <td><?= $row->nama_sales; ?></td>

                    <td><?= $row->no_telp; ?></td>

                    <td><?= $row->email; ?></td>

                    <td>
                        <span class="badge-penjualan">
                            <?= $row->total_penjualan; ?> Order
                        </span>
                    </td>

                    <td>
                        <span class="
                            <?= $row->status == 'aktif'
                                ? 'badge-aktif'
                                : 'badge-nonaktif'; ?>">
                            <?= ucfirst($row->status); ?>
                        </span>
                    </td>
                    <td>
                        <div class="table-action">
                            <a href="#"
                                class="edit-btn open-edit-sales"
                                data-id="<?= $row->id_sales; ?>"
                                data-kode="<?= $row->kode_sales; ?>"
                                data-nama="<?= $row->nama_sales; ?>"
                                data-telp="<?= $row->no_telp; ?>"
                                data-email="<?= $row->email; ?>"
                                data-alamat="<?= $row->alamat; ?>"
                                data-status="<?= $row->status; ?>">

                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <a href="#"
                                class="delete-btn open-delete-modal"

                                data-url="<?= base_url('admin/sales/delete/'.$row->id_sales); ?>">

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
            <h3>Tambah Sales</h3>
            <p>Tambahkan data sales baru.</p>
        </div>

        <form action="<?= base_url('admin/sales/simpan'); ?>" method="post">
            <div class="produk-modal-grid">
                <div class="produk-input-group">
                    <label>Nama Sales</label>
                    <input type="text"
                        name="nama_sales"
                        required>
                </div>

                <div class="produk-input-group">
                    <label>No Telepon</label>
                    <input type="text"
                        name="no_telp">
                </div>

                <div class="produk-input-group">
                    <label>Email</label>
                    <input type="email"
                        name="email">
                </div>

                <div class="produk-input-group">
                    <label>Status</label>
                    <select name="status">
                        <option value="aktif">
                            Aktif
                        </option>
                        <option value="nonaktif">
                            Nonaktif
                        </option>
                    </select>
                </div>
                <div class="produk-input-group produk-full">
                    <label>Alamat</label>
                    <textarea name="alamat"></textarea>
                </div>
            </div>

            <div class="modal-footer-custom">
                <button type="submit"
                    class="produk-submit-btn">
                    Simpan Sales
                </button>
            </div>
        </form>
    </div>
</div>

<div class="produk-modal" id="editSalesModal">
    <div class="produk-modal-box">
        <button class="close-produk-modal" id="closeEditSalesModal">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="produk-modal-header">
            <img src="<?= base_url('assets/img/logo-tulisan.png'); ?>"
                class="produk-modal-logo">
            <h3>Edit Sales</h3>
            <p>Perbarui data sales.</p>
        </div>

        <form action="<?= base_url('admin/sales/update'); ?>"
            method="post">
            <input type="hidden" name="id_sales" id="edit_id_sales">
            <div class="produk-modal-grid">
                <div class="produk-input-group">
                    <label>Kode Sales</label>
                    <input type="text"
                        id="edit_kode_sales"
                        readonly>
                </div>

                <div class="produk-input-group">
                    <label>Nama Sales</label>
                    <input type="text"
                        name="nama_sales"
                        id="edit_nama_sales">
                </div>

                <div class="produk-input-group">
                    <label>No Telepon</label>
                    <input type="text"
                        name="no_telp"
                        id="edit_no_telp">
                </div>

                <div class="produk-input-group">
                    <label>Email</label>
                    <input type="email"
                        name="email"
                        id="edit_email_sales">
                </div>

                <div class="produk-input-group produk-full">
                    <label>Status</label>
                    <select name="status" id="edit_status_sales">
                        <option value="aktif"> Aktif </option>
                        <option value="nonaktif"> Nonaktif </option>
                    </select>
                </div>

                <div class="produk-input-group produk-full">
                    <label>Alamat</label>
                    <textarea name="alamat"
                        id="edit_alamat_sales"></textarea>
                </div>
            </div>
            <div class="modal-footer-custom">
                <button type="submit"
                    class="produk-submit-btn">
                    Update Sales
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