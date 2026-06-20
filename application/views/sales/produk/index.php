<div class="page-header">
   <a href="#" class="btn-primary" id="openCustomModal">
        <i class="fa-solid fa-plus"></i>
        Tambah Produk
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="custom-table" id="project-datatable">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produk as $row): ?>
                <tr>
                    <td>
                        <?php if(!empty($row->gambar)): ?>
                            <img src="<?= base_url('assets/img/produk/'.$row->gambar); ?>"
                                class="table-image">
                        <?php else: ?>
                            <img src="<?= base_url('assets/img/no-image.png'); ?>"
                                class="table-image">
                        <?php endif; ?>
                    </td>
                    <td><?= $row->kode_produk; ?></td>
                    <td><?= $row->nama_produk; ?></td>
                    <td>
                        <span class="badge-category">
                            <?= $row->nama_kategori; ?>
                        </span>
                    </td>
                    <td> Rp <?= number_format($row->harga,0,',','.'); ?></td>
                    <td><?= $row->stok; ?></td>
                        <td>
                            <div class="table-action">
                                <a href="#"
                                    class="edit-btn open-edit-produk"
                                    data-id="<?= $row->id_produk; ?>"
                                    data-id_kategori="<?= $row->id_kategori; ?>"
                                    data-kode="<?= $row->kode_produk; ?>"
                                    data-nama="<?= $row->nama_produk; ?>"
                                    data-harga="<?= $row->harga; ?>"
                                    data-stok="<?= $row->stok; ?>">
                                        <i class="fa-solid fa-pen"></i>
                                </a>

                                <a href="#"
                                        class="delete-btn open-delete-modal"
                                        data-url="<?= base_url('admin/produk/delete/'. $row->id_produk); ?>">
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
            <img src="<?= base_url('assets/img/logo-tulisan.png'); ?>" class="produk-modal-logo">
            <h3>Tambah Produk</h3>
            <p>Tambahkan produk baru ke sistem.</p>
        </div>

        <form action="<?= base_url('admin/produk/simpan'); ?>" method="post" enctype="multipart/form-data">
            <div class="produk-modal-grid">
                <div class="produk-input-group">
                    <label>Kategori Produk</label>
                    <select name="id_kategori" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach($kategori as $k): ?>
                            <option value="<?= $k->id_kategori ?>">
                                <?= $k->nama_kategori ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="produk-input-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" required>
                </div>

                <div class="produk-input-group">
                    <label>Harga</label>
                    <input type="number" name="harga" required>
                </div>

                <div class="produk-input-group">
                    <label>Stok</label>
                    <input type="number" name="stok" required>
                </div>

                <div class="produk-input-group produk-full">
                    <label>Gambar Produk</label>
                    <input type="file" name="gambar">
                </div>

            </div>
            <div class="modal-footer-custom">
                <button type="submit" class="produk-submit-btn">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>

<div class="produk-modal" id="editProdukModal">
    <div class="produk-modal-box">
        <button class="close-produk-modal" id="closeEditProdukModal">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="produk-modal-header">
            <img src="<?= base_url('assets/img/logo-tulisan.png'); ?>" class="produk-modal-logo">
            <h3>Edit Produk</h3>
            <p>Perbarui data produk.</p>
        </div>

        <form action="<?= base_url('admin/produk/update'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_produk" id="edit_id_produk">
            <div class="produk-modal-grid">
                <div class="produk-input-group">
                    <label>Kategori Produk</label>
                    <select name="id_kategori" id="edit_id_kategori" required>
                        <?php foreach($kategori as $k): ?>
                            <option value="<?= $k->id_kategori ?>">
                                <?= $k->nama_kategori ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="produk-input-group">
                    <label>Kode Produk</label>
                    <input type="text" name="kode_produk" id="edit_kode_produk"readonly>
                </div>

                <div class="produk-input-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" id="edit_nama_produk">
                </div>

                <div class="produk-input-group">
                    <label>Harga</label>
                    <input type="number" name="harga" id="edit_harga">
                </div>

                <div class="produk-input-group">
                    <label>Stok</label>
                    <input type="number" name="stok" id="edit_stok">
                </div>

                 <div class="produk-input-group">
                    <label>Ganti Gambar</label>
                    <input type="file" name="gambar">
                </div>

            </div>

            <div class="modal-footer-custom">
                <button type="submit" class="produk-submit-btn">
                    Update Produk
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