<?= $_header ?>
    <div class="row">
        <div class="large-8 columns">
            <div class="block big" id="change-password">
                <div class="block-title">Change password</div>

                <?= form_open('/user/change-password', 'class="block-content form" id="edit-profile-form"') ?>

                <div class="form-group">
                    <p class="uppercase orange static-username"><?= $user_profile->username ?></p>
                </div>
                <div class="form-group">
                    <p class="response"></p>
                </div>
                <div class="form-group row">
                    <div class="large-7 columns">
                        <label><?= __('Old password:') ?> *</label>
                        <?= form_password('old_password', '', 'class="required"') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="large-7 columns">
                        <label><?= __('New password:') ?> *</label>
                        <?= form_password('new_password', '', 'id="password" class="required" onpaste="return false;" oncopy="return false"') ?>
                    </div>
                    <div class="large-5 columns">
                        <small>(8 letters, symbols, numbers, uppercase, lowercase)</small>
                        <div id="password-meter"><span></span></div>
                        <small id="password-info"></small>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="large-7 columns">
                        <label><?= __('Confirm new password:') ?> *</label>
                        <?= form_password('confirm_new_password', '', 'id="confirm-password" class="required" onpaste="return false;" oncopy="return false"') ?>
                    </div>
                    <div class="large-5 columns">
                        <i class="notif-block sprites"></i>
                    </div>
                </div>

                <div class="form-group text-right">
                    <?= form_submit('', 'submit', 'class="button"') ?>
                </div>
                <?= form_close() ?>
            </div>
        </div>
        <?= $sidebar ?>
    </div>
<?= $_footer ?>