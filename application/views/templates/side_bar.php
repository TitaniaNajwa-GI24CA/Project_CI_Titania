<!-- SIDEBAR -->
<ul class="navbar-nav custom-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- LOGO -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="<?= site_url('dashboard')?>">

        <div class="sidebar-brand-icon">
            <i class="fas fa-book-reader"></i>
        </div>

        <div class="sidebar-brand-text mx-2">
            Perpus<span>Global</span>
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- DASHBOARD -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('dashboard')?>">

            <i class="fas fa-fw fa-tachometer-alt"></i>

            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- KATEGORI -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('kategori')?>">

            <i class="fas fa-tags"></i>

            <span>Kategori</span>
        </a>
    </li>

    <!-- DATA BUKU -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('buku')?>">

            <i class="fas fa-book-open"></i>

            <span>Data Buku</span>
        </a>
    </li>

    <!-- DATA ANGGOTA -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('anggota')?>">

            <i class="fas fa-users"></i>

            <span>Data Anggota</span>
        </a>
    </li>

    <!-- DATA PEMINJAMAN -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('peminjaman')?>">

            <i class="fas fa-book-reader"></i>

            <span>Data Peminjaman</span>
        </a>
    </li>

    <!-- DATA PEMINJAMAN -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('laporan/peminjaman')?>">
            <i class="fas fa-chart-line"></i>
            <span>Laporan Peminjaman</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- TOGGLE -->
    <div class="text-center d-none d-md-inline mb-4">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<!-- CONTENT -->
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">



<!-- CSS -->
<style>

    /* =========================
    SIDEBAR
    ========================= */

    .custom-sidebar{
        background: linear-gradient(
            180deg,
            #1e3a5f 0%,
            #5a89c4 100%
        ) !important;

        min-height: 100vh;

        transition: all 0.3s ease;
    }


    /* BRAND */

    .sidebar-brand{
        height: 80px !important;
    }

    .sidebar-brand-icon{
        font-size: 24px;
        color: white;
    }

    .sidebar-brand-text{
        font-size: 20px;
        font-weight: 700;
        color: white;
        letter-spacing: 1px;
    }

    .sidebar-brand-text span{
        color: #c7d8f0;
    }


    /* MENU */

    .custom-sidebar .nav-item{
        margin: 6px 12px;
    }

    .custom-sidebar .nav-link{
        border-radius: 10px;

        padding: 12px 16px !important;

        color: rgba(255,255,255,0.85) !important;

        font-weight: 500;

        transition: all 0.25s ease;
    }


    /* ICON */

    .custom-sidebar .nav-link i{
        margin-right: 10px;
        font-size: 15px;
    }


    /* HOVER */

    .custom-sidebar .nav-link:hover{
        background: rgba(255,255,255,0.10);

        color: white !important;

        transform: translateX(3px);
    }


    /* ACTIVE */

    .custom-sidebar .nav-item.active .nav-link{
        background: rgba(255,255,255,0.14);

        color: white !important;
    }


    /* DIVIDER */

    .sidebar-divider{
        border-top: 1px solid rgba(255,255,255,0.1);
    }


    /* TOGGLE BUTTON */

    #sidebarToggle{
        width: 38px;
        height: 38px;

        background: rgba(255,255,255,0.12);

        position: relative;

        transition: 0.3s;
    }


    /* ICON TOGGLE */

    #sidebarToggle::after{
        content: "←";

        color: white;
        font-size: 18px;
        font-weight: bold;

        position: absolute;
        top: 50%;
        left: 50%;

        transform: translate(-50%, -50%);
    }


    /* SAAT SIDEBAR DI HIDE */

    .sidebar-toggled #sidebarToggle::after{
        content: "→";
    }


    /* HOVER TOGGLE */

    #sidebarToggle:hover{
        background: rgba(255,255,255,0.22);
    }


    /* HILANGKAN SHADOW DASHBOARD */

    .card,
    .dashboard-card,
    .glow-card{
        box-shadow: none !important;
    }


    /* SHADOW HANYA SAAT HOVER */

    .card:hover,
    .dashboard-card:hover,
    .glow-card:hover{
        box-shadow:
            0 8px 22px rgba(20,40,90,0.08),
            0 0 16px rgba(20,40,90,0.05) !important;
    }

</style>

<!-- SCRIPT -->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?= base_url('assets/js/sb-admin-2.min.js');?>"></script>