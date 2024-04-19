<?= $headerContent ?>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto text-center login_center">
                    <div class="brand-logo">
                        <img src="<?= $base_url ?><?= $themePath ?>assets/images/logo_dreamedservices_sobre_blanco.png" width="300" height="80">
                    </div>
                    <div class="auth-form-light text-left p-5">
                        <h6 class="font-weight-light font-weight-bold">Secure Client Login</h6>
                        <form class="pt-3" action="<?= $base_url ?>login/auth" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block bg-black-dreamed btn-lg font-weight-semibold auth-form-btn text-white">INICIAR SESSION</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<?= $footerContent ?>