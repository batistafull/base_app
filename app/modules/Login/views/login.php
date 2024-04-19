<?= $headerContent ?>
<div class="row flex-grow">
    <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left p-5">
            <div class="brand-logo">
                <img src="<?= $base_url ?><?= $themePath ?>images/logo.svg">
            </div>
            <h4>Hello! let's get started</h4>
            <h6 class="font-weight-light">Sign in to continue.</h6>
            <form class="pt-3" action="<?= $base_url ?>login/auth" method="post">
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $footerContent ?>