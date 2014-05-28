<?= $_header ?>
    <div class = "row">
        <div class = "large-6 columns">
            <div class = "block big" id = "login-block">
                <div class = "block-title">Are you a member?</div>
                <div class = "block-content">
                    <?= form_open( '/login/submit', array( 'method' => 'POST', 'class' => 'form' ) ) ?>
                    <p class = "response"></p>

                    <div class = "form-control">
                        <?= form_input( 'username', '', 'placeholder="Email or Username" class="required"' ) ?>
                    </div>
                    <div class = "form-control">
                        <?= form_password( 'password', '', 'placeholder="Password" class="required"' ) ?>
                    </div>
                    <div class = "form-control">
                        <label>
                            <?= form_checkbox( 'remember', '1', FALSE ) ?>
                            Remember me
                        </label>
                    </div>
                    <div class = "form-control">
                        <a href = "#">Forgot password?</a>
                    </div>
                    <div class = "form-control text-right">
                        <?= form_submit( '', 'Login', 'class="button"' ) ?>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
        <div class = "large-6 columns">
            <div class = "block big text-center" id = "register-block">
                <div class = "block-title">New to Larrizo?</div>
                <div class = "block-content">
                    <p></p>
                    <p>
                        <a href = "/register" class = "button big fullsize">private account</a>
                    </p>

                    <p class = "orange" style="font-size: 17px;">OR</p>

                    <p>Are you a seller too? Start your business account now!
                        <a href = "/register/business" class = "button big fullsize">business account</a></p>
                </div>
            </div>
        </div>
    </div>
<?= $_footer ?>