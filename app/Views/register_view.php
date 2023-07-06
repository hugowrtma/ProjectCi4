<?= $this->extend('components/layout_clear') ?>
<?= $this->section('content') ?>
<?php
$username = [
    'name' => 'username',
    'id' => 'username',
    'class' => 'form-control'
];

$password = [
    'name' => 'password',
    'id' => 'password',
    'class' => 'form-control'
];

$role = [
    'name' => 'role',
    'id' => 'role',
    'class' => 'form-control',
    'value' => 'user',
    'readonly' => true
];
?>

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                        <img src="<?php echo base_url() ?>public/NiceAdmin/assets/img/logo.png" alt="">
                        <span class="d-none d-lg-block">ShopUs</span>
                    </a>
                </div><!-- End Logo -->

                <div class="card mb-3">
                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                            <p class="text-center small">Fill in the form to register</p>
                        </div>

                        <?= form_open('register', 'class="row g-3 needs-validation"') ?>
                        <div class="col-12">
                            <label for="yourUsername" class="form-label">Username</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <?= form_input($username) ?>
                                <div class="invalid-feedback">Please enter a username.</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="yourRole" class="form-label">Role</label>
                            <?= form_input($role) ?>
                            <div class="invalid-feedback">Please enter a valid role.</div>
                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Password</label>
                            <?= form_password($password) ?>
                            <div class="invalid-feedback">Please enter a password!</div>
                        </div>

                        <div class="col-12">
                            <?= form_submit('submit', 'Register', ['class' => 'btn btn-primary w-100']) ?>
                        </div>
                        <?= form_close() ?>

                        <div class="col-12 mt-3">
                            <?= anchor('login', 'Login', ['class' => 'btn btn-secondary w-100']) ?>
                        </div>

                    </div>
                </div>

                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                    Designed by <ahref=".">ShopUs</a>
                </div>

            </div>
        </div>
    </div>

</section>
<?= $this->endSection() ?>
