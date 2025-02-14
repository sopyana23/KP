<div id="app" class="login-card">
    <section class="section">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login Siswa</h4>
                        </div>

                        <div class="card-body">
                            <?php echo $this->session->flashdata('message'); ?>
                            <?php unset($_SESSION['message']); ?>
                            <form method="POST" action="<?= base_url('auth'); ?>">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control" name="email" tabindex="1" value="<?php echo set_value('email'); ?>">
                                    <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                        <div class="float-right">
                                            <a href="auth-forgot-password.html" class="text-small">
                                                Lupa Password?
                                            </a>
                                        </div>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2">
                                    <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-3 mb-3 text-muted text-center">
                        Belum Punya Akun? <a href="<?= base_url(); ?>auth/registration">Buat Baru</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <a href="<?= base_url('auth/indexGuru')?>" class="btn btn-outline-primary col">Login sebagai Guru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>