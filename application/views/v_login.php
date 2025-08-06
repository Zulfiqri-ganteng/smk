<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 rounded-lg text-white" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px);">
                <div class="card-body p-5 text-center">
                    
                    <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo Sekolah" width="80" class="mb-4">

                    <h3 class="fw-bold mb-4">LOGIN AREA</h3>
                    
                    <?= $this->session->flashdata('message'); ?>
                    
                    <form action="<?= base_url('auth'); ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                            <label for="username" class="text-dark">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password" class="text-dark">Password</label>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-light btn-lg text-primary fw-bold">Login</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>