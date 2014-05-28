<?= $_header ?>
    <div class="row">
        <div class="large-8 columns">
            <div class="block big" id="basic-information">
                <div class="block-title">Basic Information</div>

                <?= form_open('/register/submit', 'class="block-content form" id="register-form"') ?>
                <div class="form-group">
                    <p class="response"></p>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="large-7 columns">
                            <label><?= __('Username') ?> *</label>
                            <?= form_input('username', '', 'class="required" id="username"') ?>
                        </div>
                        <div class="large-5 columns individual-response">
                            <i class="notif-block sprites"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="large-7 columns">
                            <label><?= __('Email') ?> *</label>
                            <input type="email" class="required" name="email" id="email">
                        </div>
                        <div class="large-5 columns individual-response">
                            <i class="notif-block sprites"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="large-7 columns">
                            <label><?= __('Password') ?> *</label>
                            <?= form_password('password', '', 'id="password" class="required" onpaste="return false;" oncopy="return false"') ?>
                        </div>
                        <div class="large-5 columns">
                            <small>(8 letters, symbols, numbers, uppercase, lowercase)</small>
                            <div id="password-meter"><span></span></div>
                            <small id="password-info"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="large-7 columns">
                            <label><?= __('Confirm Password') ?> *</label>
                            <?= form_password('confirm_password', '', 'id="confirm-password" class="required" onpaste="return false;" oncopy="return false"') ?>
                        </div>
                        <div class="large-5 columns individual-response">
                            <i class="notif-block sprites sprites"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?= form_checkbox('term_condition', 1, FALSE, 'class="checkbox required" id="term-condition-cb"') ?>
                    <label
                        for="term-condition-cb"><span></span><?= __('I have read and accepted the <a href="#" class="link">terms and condition</a>.') ?>
                    </label>
                </div>
                <div class="form-group text-right">
                    <?= form_submit('', 'submit', 'class="button"') ?>
                </div>
                <?= form_close() ?>
            </div>
        </div>
        <div class="large-4 columns">
            <div class="block" id="register-promo">
                <div class="block-title">Register today and enjoy:</div>

                <div class="block-content">
                    <ul class="checkmark-list">
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Consetetur sadipscing elitr</li>
                        <li>Sed diam nonumy eirmod tempor invidunt</li>
                        <li>Sed diam nonumy eirmod tempor invidunt</li>
                    </ul>
                    <p>&nbsp;</p>

                    <p class="text-center">Already have an account?<a href="/login" class="button big fullsize">login</a></p>

                    <p class="orange text-center bold">OR</p>

                    <p class="text-center">Are you a seller too?<br>Start your <a href="#" class="link">business
                            account</a> now!<a href="/register/business" class="button big fullsize">business account</a></p>
                </div>
            </div>
        </div>
    </div>
<?= $_footer ?>