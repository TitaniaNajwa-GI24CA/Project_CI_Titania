<div class="page-header">
   <a href="#" class="btn-primary" id="openCustomModal">
        <i class="fa-solid fa-plus"></i>
        Tambah Kategori
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="custom-table" id="project-datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($kategori)): ?>
                    <?php foreach($kategori as $row): ?>
                    <tr>
                        <td><?= $row->id_kategori ?></td>
                        <td><?= $row->kode_kategori ?></td>
                        <td><?= $row->nama_kategori ?></td>
                        <td><?= $row->deskripsi?></td>
                        <td>
                            <span class="status-badge" <?= strtolower($row->status); ?>"><?= $row->status; ?></span>
                        </td>
                        <td>
                            <div class="table-action">
                                <a href="#"
                                        class="edit-btn open-edit-modal"
                                        data-id="<?= $row->id_kategori ?>"
                                        data-kode="<?= $row->kode_kategori ?>"
                                        data-nama="<?= $row->nama_kategori ?>"
                                        data-deskripsi="<?= $row->deskripsi ?>"
                                        data-status="<?= $row->status ?>">
                                        <i class="fa-solid fa-pen"></i>
                                </a>

                                <a href="#"
                                        class="delete-btn open-delete-modal"
                                        data-url="<?= base_url('kategori-produk/delete/'. $row->id_kategori); ?>">
                                            <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">
                            Data belum tersedia
                        </td>
                    </tr>
                <?php endif; ?>
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
            <h2>Tambah Kategori Produk</h2>
            <p>Tambahkan kategori produk terbaru PT Maju Jaya Electronic.</p>
        </div>

        <form action="<?= base_url('admin/kategori/simpan'); ?>" method="post" enctype="multipart/form-data">
            <div class="produk-modal-grid">
                <div class="produk-input-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" required>
                </div>

                <div class="produk-input-group">
                    <label>Status Kategori</label>
                    <select name="status" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div class="produk-input-group produk-full">
                    <label>Deskripsi</label>
                     <textarea name="deskripsi"></textarea>
                </div>
            </div>

            <button type="submit" class="produk-submit-btn">
                <i class="fa-solid fa-floppy-disk"></i>
                Simpan Kategori
            </button>
        </form>
    </div>
</div>

<div class="produk-modal" id="editCustomModal">
    <div class="produk-modal-box">
        <button class="close-produk-modal" id="closeEditCustomModal">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="produk-modal-header">
            <img src="<?= base_url('assets/img/logo-tulisan.png'); ?>" class="produk-modal-logo">
            <h2>Edit Kategori Produk</h2>
            <p>Perbarui data kategori produk Elektronik.</p>
        </div>

        <form action="<?= base_url('admin/kategori/update'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" id="edit_id" name="id_kategori">
            <div class="produk-modal-grid">
                <div class="produk-input-group">
                    <label>Kode Kategori</label>
                    <input type="text" id="edit_kode" name="kode_kategori" readonly>
                </div>

                <div class="produk-input-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="edit_nama" required>
                </div>

                <div class="produk-input-group">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" id="edit_deskripsi" required>
                </div>

                <div class="produk-input-group">
                    <label>Status</label>
                    <select name="status" id="edit_status" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="produk-submit-btn">
                <i class="fa-solid fa-floppy-disk"></i>
                Update Kategori
            </button>
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