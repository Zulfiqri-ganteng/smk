<div class="login-page-container">
    <div id="particles-js"></div>

    <div class="login-card">
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" class="logo">
        <h3 class="text-center mb-4 fw-bold">LOGIN AREA</h3>

        <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('auth'); ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username Anda" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-warning fw-bold">Login</button>
            </div>
        </form>
    </div>
</div>