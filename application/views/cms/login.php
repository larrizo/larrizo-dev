<?= $_header ?>
    <div class = "block large-6 large-offset-3 columns">
        <div class = "block-title">Login</div>

        <?= form_open( 'login/submit', array( 'method' => 'POST', 'id' => 'login-form', 'class' => 'form block-content' ) ) ?>
        <p class = "response"></p>

        <div class = "form-control">
            <?= form_input( 'username', '', 'placeholder="Username" class="required"' ) ?>
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
        <div class = "form-control text-right">
            <?= form_submit( '', 'Login', 'class="button"' ) ?>
        </div>
        <?= form_close() ?>
    </div>
<?= $_footer ?>