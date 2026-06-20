<?php
$foto_user = !empty($user_profile->foto_profil)
    ? 'assets/img/profile/' . $user_profile->foto_profil
    : 'assets/img/profile/default.png';
?>

<div class="admin-main">

    <div class="admin-topbar">
        <div>
            <h1><?= isset($page_title) ? $page_title : 'Dashboard'; ?></h1>
            <p><?= isset($page_subtitle) ? $page_subtitle : ''; ?></p>
        </div>

        <div class="admin-top-right">

            <div class="admin-date">
                <i class="fa-regular fa-calendar"></i>
                <?= date('l, d F Y'); ?>
            </div>

            <div class="top-profile">
                <img src="<?= base_url($foto_user) . '?v=' . time(); ?>" alt="User Profile">

                <div class="top-profile-dropdown">
                    <div class="profile-info">
                        <h4><?= $this->session->userdata('nama_user'); ?></h4>
                        <small><?= ucfirst($this->session->userdata('role')); ?></small>
                    </div>

                    <a href="#" id="openProfileModal">
                        <i class="fa-regular fa-user"></i>
                        Detail Profile
                    </a>

                    <a href="#" id="openLogoutModal">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="admin-profile-modal" id="profileModal">
        <div class="admin-profile-box">

            <button class="close-admin-profile" id="closeProfileModal">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <h2>Detail Profile</h2>
            <p>Perbarui informasi akun kamu.</p>

            <form action="<?= base_url('admin/dashboard/update_profile'); ?>" method="post" enctype="multipart/form-data">
                <div class="admin-form-layout">

                    <div class="admin-photo-card">
                        <div class="admin-profile-photo">
                            <img src="<?= base_url($foto_user); ?>" alt="Profile Photo">
                        </div>

                        <label>Foto Profile</label>
                        <input type="file" name="foto_profil" accept="image/*">
                    </div>

                    <div class="admin-form-grid">

                        <div class="admin-input-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_user" value="<?= isset($user_profile->nama_user) ? $user_profile->nama_user : ''; ?>">
                        </div>

                        <div class="admin-input-group">
                            <label>No. Telepon</label>
                            <input type="text" name="no_telp" value="<?= isset($user_profile->no_telp) ? $user_profile->no_telp : ''; ?>">
                        </div>

                        <div class="admin-input-group">
                            <label>Username</label>
                            <input type="text" name="username" value="<?= isset($user_profile->username) ? $user_profile->username : ''; ?>">
                        </div>

                        <div class="admin-input-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?= isset($user_profile->email) ? $user_profile->email : ''; ?>">
                        </div>

                        <div class="admin-input-group admin-full">
                            <label>Alamat</label>
                            <textarea name="alamat"><?= isset($user_profile->alamat) ? $user_profile->alamat : ''; ?></textarea>
                        </div>

                        <div class="admin-input-group admin-full">
                            <label>Password Baru</label>
                            <input type="password" name="password" placeholder="Kosongkan jika tidak diganti">
                        </div>

                        <div class="admin-full">
                            <button type="submit" class="admin-save-btn">
                                Simpan Perubahan
                            </button>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="logout-modal" id="logoutModal">
        <div class="logout-box">
            <div class="logout-icon">
                <i class="fa-solid fa-right-from-bracket"></i>
            </div>

            <h3>Logout Account?</h3>
            <p>Kamu yakin ingin keluar dari akun PT Maju Jaya Electronic?</p>

            <div class="logout-buttons">
                <button class="cancel-logout" id="closeLogoutModal">Batal</button>

                <a href="<?= base_url('auth/logout'); ?>" class="confirm-logout">
                    Ya, Logout
                </a>
            </div>
        </div>
    </div>