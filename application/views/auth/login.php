<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - PT Maju Jaya Electronic</title>

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/auth.css'); ?>">
</head>
<body class="login-page">
    <div class="login-wrapper">
        <div class="login-card">
            <img src="<?= base_url('assets/img/logo-img.png'); ?>" class="logo-img-login" alt="Logo">
            <h2>Selamat Datang</h2>
            <p>Masuk untuk melanjutkan ke sistem</p>

            <?php if($this->session->flashdata('success')) : ?>
                <div class="alert-success-custom">
                    <i class="fas fa-circle-check"></i>
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php if($this->session->flashdata('error')) : ?>
                <div class="alert-error-custom">
                    <i class="fas fa-circle-xmark"></i>
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('auth/proses_login'); ?>" method="post">

                <div class="input-group-custom">
                    <i class="fa fa-user"></i>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                </div>

                <div class="input-group-custom">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <div class="input-group-custom">
                    <i class="fa fa-shield-halved"></i>
                    <select name="role" class="form-control" required>
                        <option value="">Role</option>
                        <option value="admin">Admin</option>
                        <option value="sales">Sales</option>
                        <option value="manager">Manager</option>
                    </select>
                </div>

                <div class="login-options">
                    <label>
                        <input type="checkbox"> Ingat saya
                    </label>

                    <a href="#">Lupa password?</a>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fa fa-right-to-bracket"></i> Login
                </button>

                <div class="divider">
                    <span>atau</span>
                </div>

                <a href="<?= base_url('auth/registrasi'); ?>" class="btn-register-outline">
                    <i class="fa fa-user-plus"></i> Register Akun
                </a>

            </form>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if($this->session->flashdata('success')) : ?>
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Registrasi Berhasil!',
            html: 'Akun berhasil dibuat.<br>Silakan login untuk melanjutkan.',
            confirmButtonText: 'Login Sekarang',
            background: '#fffaf5',
            color: '#7c2d12',
            confirmButtonColor: '#ea580c'
        });
        </script>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')) : ?>
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal!',
            text: '<?= $this->session->flashdata('error'); ?>',
            confirmButtonText: 'Coba Lagi',
            background: '#fffaf5',
            color: '#7c2d12',
            confirmButtonColor: '#ea580c'
        });
        </script>
    <?php endif; ?>
</body>
</html>