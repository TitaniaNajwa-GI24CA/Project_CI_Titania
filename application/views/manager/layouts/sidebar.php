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

            <!-- LAPORAN -->
            <a href="#" class="has-submenu">
                <i class="fa-solid fa-chart-column"></i>
                Laporan
                <span class="submenu-arrow">
                    <i class="fa-solid fa-chevron-down"></i>
                </span>
            </a>

            <div class="submenu">

                <a href="<?= base_url('manager/laporan_penjualan'); ?>">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    Laporan Penjualan
                </a>

                <a href="<?= base_url('manager/laporan_stok'); ?>">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    Laporan Barang & Stok
                </a>
            </div>
        </div>
    </div>
</div>