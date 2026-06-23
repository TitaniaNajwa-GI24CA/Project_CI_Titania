<div class="page-header">
   <a href="#" class="btn-primary" id="openCustomModal">
        <i class="fa-solid fa-plus"></i>
        Tambah Pelanggan
    </a>
</div>

<?php if($this->session->flashdata('success')): ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '<?= $this->session->flashdata("success"); ?>',
        confirmButtonColor: '#ea580c'
    });
    </script>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: '<?= $this->session->flashdata("error"); ?>',
        confirmButtonColor: '#ea580c'
    });
    </script>
<?php endif; ?>

<div class="table-card">
    <div class="table-responsive">
        <table class="custom-table" id="project-datatable">
            <thead>
                <tr>
                    <th>Kode Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Jenis Pelanggan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pelanggan as $row): ?>
                <tr>
                    <td><?= $row->kode_pelanggan; ?></td>
                    <td><?= $row->nama_pelanggan; ?></td>
                    <td>
                        <?= $row->jenis_kelamin == 'L'
                            ? 'Laki-Laki'
                            : 'Perempuan'; ?>
                    </td>
                    <td><?= $row->no_telp; ?></td>
                    <td><?= $row->email; ?></td>
                    <td>
                        <span class="
                            <?= $row->jenis_pelanggan == 'VIP' ? 'badge-vip' :
                                ($row->jenis_pelanggan == 'Member' ? 'badge-member' : 'badge-reguler'); ?>">
                            <?= $row->jenis_pelanggan; ?>
                        </span>
                    </td>
                    <td><?= $row->alamat; ?></td>
                    <td>
                        <div class="table-action">
                            <a href="#"
                            class="edit-btn open-edit-pelanggan"
                            data-id="<?= $row->id_pelanggan; ?>"
                            data-kode="<?= $row->kode_pelanggan; ?>"
                            data-nama="<?= $row->nama_pelanggan; ?>"
                            data-jk="<?= $row->jenis_kelamin; ?>"
                            data-telp="<?= $row->no_telp; ?>"
                            data-email="<?= $row->email; ?>"
                            data-jp="<?= $row->jenis_pelanggan; ?>"
                            data-alamat="<?= $row->alamat; ?>">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <a href="#"
                            class="delete-btn open-delete-modal"
                            data-url="<?= base_url('admin/pelanggan/delete/'.$row->id_pelanggan); ?>">

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

       <form action="<?= base_url('admin/pelanggan/simpan'); ?>" method="post">
        <div class="produk-modal-grid">
            <div class="produk-input-group">
                <label>Nama Pelanggan</label>
                <input type="text"name="nama_pelanggan"required>
            </div>

            <div class="produk-input-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
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

            <div class="produk-input-group produk-full">
                <label>Jenis Pelanggan</label>
                <select name="jenis_pelanggan">
                    <option value="">-- Pilih Jenis Pelanggan --</option>
                    <option value="Reguler">Reguler</option>
                    <option value="Member">Member</option>
                    <option value="VIP">VIP</option>
                </select>
            </div>

            <div class="produk-input-group produk-full">
                <label>Alamat</label>
                <textarea name="alamat"></textarea>
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

<div class="produk-modal" id="editPelangganModal">
    <div class="produk-modal-box">
        <button class="close-produk-modal" id="closeEditPelangganModal">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="produk-modal-header">
            <img src="<?= base_url('assets/img/logo-tulisan.png'); ?>" class="produk-modal-logo">
            <h3>Edit Produk</h3>
            <p>Perbarui data produk.</p>
        </div>

        <form action="<?= base_url('admin/pelanggan/update'); ?>" method="post">
            <input type="hidden" name="id_pelanggan" id="edit_id_pelanggan">
            <div class="produk-modal-grid">
                <div class="produk-input-group">
                    <label>Kode Pelanggan</label>
                    <input type="text"
                        id="edit_kode_pelanggan"
                        readonly>
                </div>

                <div class="produk-input-group">
                    <label>Nama Pelanggan</label>
                    <input type="text"
                        name="nama_pelanggan"
                        id="edit_nama_pelanggan">
                </div>

                <div class="produk-input-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin"
                            id="edit_jenis_kelamin">

                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
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
                        id="edit_email">
                </div>

                <div class="produk-input-group">
                    <label>Jenis Pelanggan</label>
                    <select name="jenis_pelanggan"
                            id="edit_jenis_pelanggan">
                        <option value="Reguler">Reguler</option>
                        <option value="Member">Member</option>
                        <option value="VIP">VIP</option>
                    </select>
                </div>

                <div class="produk-input-group produk-full">
                    <label>Alamat</label>
                    <textarea name="alamat"
                            id="edit_alamat"></textarea>
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