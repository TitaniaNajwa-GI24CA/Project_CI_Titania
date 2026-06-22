<div class="admin-sidebar">

    <div>

        <div class="sidebar-logo">
            <img src="<?= base_url('assets/img/logo-img.png'); ?>"
                 alt="PT Maju Jaya Electronic">
        </div>

        <div class="sidebar-menu">
            <a href="<?= base_url('sales/dashboard'); ?>" class="active">
                <i class="fa-solid fa-house"></i>
                Dashboard
            </a>

            <a href="<?= base_url('sales/order/tambah'); ?>"
            class="menu-order-baru">
                <i class="fa-solid fa-cart-plus"></i>
                Tambah Order Baru
            </a>

            <a href="<?= base_url('sales/order'); ?>">
                <i class="fa-solid fa-file-invoice"></i>
                Data Order Saya
            </a>

            <a href="<?= base_url('sales/pelanggan'); ?>">
                <i class="fa-solid fa-users"></i>
                Data Pelanggan
            </a>
        </div>
    </div>
</div>