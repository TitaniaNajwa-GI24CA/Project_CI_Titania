<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi - PT Maju Jaya Electronic</title>

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/auth.css'); ?>">
</head>
<body>

    <div class="register-card">

        <img src="<?= base_url('assets/img/logo-img.png'); ?>" class="logo-img" alt="Logo">

        <h3>Registrasi Akun</h3>
        <p>Buat akun baru untuk masuk ke sistem</p>

        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('auth/proses_registrasi'); ?>" method="post" class="register-form">
            <div class="form-group-custom">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_user" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group-custom">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username" required>
            </div>

            <div class="form-group-custom">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email">
            </div>

            <div class="form-group-custom">
                <label>No. Telepon</label>
                <input type="text" name="no_telp" placeholder="Masukkan no telepon">
            </div>

            <div class="form-group-custom full">
                <label>Alamat</label>
                <textarea name="alamat" placeholder="Masukkan alamat lengkap"></textarea>
            </div>

            <div class="form-group-custom">
                <label>Hak Akses</label>
                <select name="role" required>
                    <option value="">Pilih hak akses</option>
                    <option value="admin">Admin</option>
                    <option value="sales">Sales</option>
                    <option value="manager">Manager</option>
                </select>
            </div>

            <div class="form-group-custom">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn-register">
                Daftar
            </button>

        </form>
        <div class="login-link">
            Sudah punya akun?
            <a href="<?= base_url('auth/login'); ?>">Login di sini</a>
        </div>

    </div>

</body>
</html>