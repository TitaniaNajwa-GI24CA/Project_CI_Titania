<div class="page-header">
    <div>
        <h1>Data Kategori Produk</h1>
        <p>Kelola kategori produk PT Maju Jaya Electronic</p>
    </div>

    <button class="btn-primary" onclick="openModal('modalTambahKategori')">
        <i class="fas fa-plus"></i>
        Tambah Kategori
    </button>
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
                            <span class="status-badge <?= strtolower($row->status); ?>"><?= $row->status; ?></span>
                        </td>
                        <td>

                            <button
                                class="btn-edit"
                                onclick="editKategori(
                                    '<?= $row->id_kategori ?>',
                                    '<?= $row->nama_kategori ?>'
                                )">

                                <i class="fas fa-pen"></i>
                            </button>

                            <a href="#"
                                class="delete-btn open-delete-modal"
                                data-url="<?= base_url('admin/kategori/delete'. $row->id_kategori); ?>">
                                    <i class="fa-solid fa-trash"></i>
                            </a>

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

<div class="custom-modal" id="modalTambahKategori">

    <div class="modal-box">

        <div class="modal-header">
            <h3>Tambah Kategori</h3>

            <button onclick="closeModal('modalTambahKategori')">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form action="<?= base_url('admin/kategori/store') ?>" method="post">

            <div class="modal-body">

                <div class="form-group">
                    <label>Nama Kategori</label>

                    <input type="text"
                           name="nama_kategori"
                           required>
                </div>

            </div>

            <div class="modal-footer">

                <button type="submit" class="btn-primary">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

<div class="custom-modal" id="modalEditKategori">
    <div class="modal-box">
        <div class="modal-header">
            <h3>Edit Kategori</h3>
            <button onclick="closeModal('modalEditKategori')">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form action="<?= base_url('admin/kategori/update') ?>" method="post">
            <input type="hidden"
                   id="edit_id_kategori"
                   name="id_kategori">

            <div class="modal-body">

                <div class="form-group">

                    <label>Nama Kategori</label>

                    <input type="text"
                           id="edit_nama_kategori"
                           name="nama_kategori"
                           required>

                </div>

            </div>

            <div class="modal-footer">

                <button type="submit" class="btn-primary">
                    Update
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