<!-- TOPBAR -->
<nav class="navbar navbar-expand navbar-light custom-topbar topbar mb-4 static-top">

    <!-- TOGGLE MOBILE -->
    <button id="sidebarToggleTop"
            class="btn btn-link d-md-none rounded-circle mr-3 text-white">

        <i class="fa fa-bars"></i>

    </button>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle d-flex align-items-center"
               href="#"
               id="userDropdown"
               role="button"
               data-toggle="dropdown"
               aria-haspopup="true"
               aria-expanded="false">

                <h2><span class="mr-3 d-none d-lg-inline admin-text">
                    Admin
                </span></h2>

                <img class="img-profile rounded-circle"
                     src="<?= base_url('assets/img/profile2.jpg')?>">

            </a>


            <!-- DROPDOWN -->
            <div class="dropdown-menu dropdown-menu-right custom-dropdown animated--grow-in"
                 aria-labelledby="userDropdown">

                <a class="dropdown-item" href="#">

                    <i class="fas fa-user fa-sm fa-fw mr-2"></i>

                    Profile

                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item"
                   href="<?= site_url('auth/logout')?>">

                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>

                    Logout

                </a>

            </div>

        </li>

    </ul>

</nav>



<!-- CSS -->
<style>

/* =========================
   TOPBAR
========================= */
.custom-topbar{
   background: linear-gradient(
        180deg,
        #1e3a5f 0%,
        #5a89c4 100%
    ) !important;
    height: 75px;
    border-bottom: 1px solid #d9e3ee;

    box-shadow:
        0 2px 10px rgba(20,40,90,0.03);
}


/* ADMIN TEXT */

.admin-text{
    color: #eceef0;
    font-weight: 600;
    font-size: 14px;
}


/* PROFILE */

.img-profile{
    width: 42px !important;
    height: 42px !important;

    object-fit: cover;

    border: 2px solid #d8e3f0;

    transition: 0.3s;
}

.img-profile:hover{
    transform: scale(1.05);
}


/* DROPDOWN */

.custom-dropdown{
    border: none;

    border-radius: 12px;

    padding: 8px;

    min-width: 200px;

    box-shadow:
        0 8px 22px rgba(20,40,90,0.08);
}


/* DROPDOWN ITEM */

.custom-dropdown .dropdown-item{
    border-radius: 8px;
    padding: 10px 14px;
    color: #1e3a5f;
    font-weight: 500;
    transition: 0.2s;
}


/* HOVER */

.custom-dropdown .dropdown-item:hover{
    background: #f2f6fc;
}


/* ICON */
.custom-dropdown i{
    color: #1e3a5f;
}

/* TOGGLE BUTTON MOBILE */

#sidebarToggleTop{
    color: #1e3a5f !important;
}

/* HILANGKAN PANAH DEFAULT */

.dropdown-toggle::after{
    display: none;
}

</style>


<!-- SCRIPT WAJIB -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js');?>"></script>