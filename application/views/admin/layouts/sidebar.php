<div class="admin-sidebar">
    <div>
        <div class="sidebar-logo">
            <img src="<?= base_url('assets/img/logo-img.png'); ?>" alt="PT Maju Jaya Electronic">
        </div>

        <div class="sidebar-menu">
           <a href="<?= base_url('dashboard') ?>" class="active">
                <i class="fa-solid fa-house"></i>
                Dashboard
            </a>

            <a href="#" class="has-submenu">
                    <i class="fa-solid fa-database"></i>
                    Master Data
                <span class="submenu-arrow">
                    <i class="fa-solid fa-chevron-down"></i>
                </span>
            </a>

            <div class="submenu">
                <a href="<?= base_url('admin/kategori') ?>">
                    <i class="fa-solid fa-tags"></i>
                    Data Kategori
                </a>

                <a href="<?= base_url('admin/produk') ?>">
                    <i class="fa-solid fa-box"></i>
                    Data Produk
                </a>

                <a href="<?= base_url('admin/pelanggan') ?>">
                    <i class="fa-solid fa-users"></i>
                    Data Pelanggan
                </a>

                <a href="<?= base_url('admin/sales') ?>">
                    <i class="fa-solid fa-user-tie"></i>
                    Data Sales
                </a>
            </div>

            <a href="javascript:void(0)" class="has-submenu">
                <i class="fa-solid fa-cart-shopping"></i>
                Transaksi
                <span class="submenu-arrow">
                    <i class="fa-solid fa-chevron-down"></i>
                </span>
            </a>

            <div class="submenu">

                <a href="<?= base_url('admin/order'); ?>">
                    <i class="fa-solid fa-file-invoice"></i>
                    Data Order
                </a>

                <a href="<?= base_url('admin/pembayaran'); ?>">
                    <i class="fa-solid fa-credit-card"></i>
                    Data Pembayaran
                </a>

            </div>

            <!-- LAPORAN -->
            <a href="#" class="has-submenu">
                <i class="fa-solid fa-chart-column"></i>
                Laporan
                <span class="submenu-arrow">
                    <i class="fa-solid fa-chevron-down"></i>
                </span>
            </a>

            <div class="submenu">

                <a href="<?= base_url('laporan-penjualan'); ?>">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    Laporan Penjualan
                </a>

                <a href="<?= base_url('admin/laporan-stok'); ?>">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    Laporan Barang & Stok
                </a>
            </div>
            <a href="<?= base_url('admin/profile'); ?>">
                <i class="fa-solid fa-gear"></i>
                Pengaturan
            </a>
        </div>
    </div>
</div>