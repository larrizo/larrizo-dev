<?= $_header ?>
    <div class="row">
        <div class="large-8 columns">
            <div class="block big" id="profile">
                <div class="block-title">Profile</div>

                <?= form_open('/user/edit', 'class="block-content form" id="edit-profile-form"') ?>

                <div class="row">
                    <div class="large-4 columns">
                        <div class="thumbnail-container" id="profile-picture">
                            <div class="dummy"></div>
                            <div class="thumbnail">
                                <?php if (!empty($user_profile->thumbnail)): ?>
                                    <img
                                        src="<?= $user_profile->thumbpath . $user_profile->rawname . '_big' . $user_profile->extension ?>"
                                        class="centered <?= $user_profile->orientation ?>">
                                <?php else: ?>
                                    <img src="/media/images/dummy/product1.jpg" class="centered portrait">
                                <?php endif; ?>
                            </div>
                        </div>
                        <br>

                        <p class="text-center">
                            <button class="button" type="button"><input type="file" class="file-browser"
                                                                        onchange="previewImage(this, [200,200])">change
                                picture<input type="hidden" name="user[thumbnail]" class="uploaded-id" value="<?=!empty($user_profile->thumbnail) ? $user_profile->thumbnail : ''?>"></button>
                        </p>
                    </div>
                    <div class="large-8 columns">
                        <div class="form-group">
                            <p class="uppercase orange static-username"><?= $user_profile->username ?></p>
                        </div>
                        <div class="form-group">
                            <p class="response"></p>
                        </div>
                        <div class="form-group row">
                            <div class="large-3 columns">
                                <label class="left inline"><?= __('Email') ?> *</label>
                            </div>
                            <div class="large-9 columns">
                                <?= form_input('user[email]', $user_profile->email, 'class="required"') ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="large-3 columns">
                                <label class="left inline"><?= __('First name') ?> *</label>
                            </div>
                            <div class="large-9 columns">
                                <?= form_input('user[first_name]', $user_profile->first_name, 'class="required"') ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="large-3 columns">
                                <label class="left inline"><?= __('Last name') ?> *</label>
                            </div>
                            <div class="large-9 columns">
                                <?= form_input('user[last_name]', $user_profile->last_name, 'class="required"') ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="large-3 columns">
                                <label class="left inline"><?= __('Birth date') ?> *</label>
                            </div>
                            <div class="large-2 columns">
                                <?= form_dropdown('birthday[day]', days(), date('d', !empty($user_profile->birthday) ? $user_profile->birthday : time()) - 1) ?>
                            </div>
                            <div class="large-4 columns">
                                <?= form_dropdown('birthday[month]', months(), date('m', !empty($user_profile->birthday) ? $user_profile->birthday : time()) - 1) ?>
                            </div>
                            <div class="large-3 columns">
                                <?= form_dropdown('birthday[year]', years(), !empty($user_profile->birthday) ? date('Y', $user_profile->birthday) : '1990') ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="large-3 columns">
                                <label class="left inline"><?= __('Gender') ?></label>
                            </div>
                            <div class="large-9 columns">
                                <div class="form-checkbox">
                                    <?= form_radio('user[gender', 'male', !empty($user_profile->gender) && $user_profile->gender == 'male' ? TRUE : FALSE, 'id="gender-male" class="checkbox"') ?>
                                    <label for="gender-male"><span></span> Male</label>
                                </div>
                                <div class="form-checkbox">
                                    <?= form_radio('user[gender]', 'female', !empty($user_profile->gender) && $user_profile->gender == 'female' ? TRUE : FALSE, 'id="gender-female" class="checkbox"') ?>
                                    <label for="gender-female"><span></span> Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="large-3 columns">
                                <label class="left inline"><?= __('Phone 1') ?></label>
                            </div>
                            <div class="large-9 columns">
                                <?= form_input('user[phone1]', $user_profile->phone1) ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="large-3 columns">
                                <label class="left inline"><?= __('Phone 2') ?></label>
                            </div>
                            <div class="large-9 columns">
                                <?= form_input('user[phone2]', $user_profile->phone2) ?>
                            </div>
                        </div>
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