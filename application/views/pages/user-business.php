<?= $_header ?>
    <div class="row">
        <div class="large-8 columns">
            <?= form_open('/user/my-business', 'class="form" id="user-business-form"') ?>
            <div class="block big" id="business-information">
                <div class="block-title">Business Information</div>
                <div class="block-content">
                    <div class="form-group">
                        <p class="response"></p>
                    </div>
                    <?php if (empty($user_business)): ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="large-7 columns">
                                    <label><?= __('Store Name') ?> *</label>
                                    <small>
                                        (<?= __('For security reason, you <span class="bold">MUST</span> contact our support to change the name later.') ?>
                                        )
                                    </small>
                                    <?= form_input('name', '', 'class="required"') ?>
                                </div>
                                <div class="large-5 columns">
                                    <i class="notif-block"></i>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <input type="hidden" name="business_id" value="<?= $user_business->id ?>">
                        <h1 class="uppercase orange" id="business-name"><?= $user_business->name ?></h1>
                    <?php endif; ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="large-7 columns">
                                <label><?= __('Address') ?> *</label>
                                <textarea rows="3" class="required"
                                          name="address"><?= !empty($user_business->address) ? $user_business->address : '' ?></textarea>
                            </div>
                            <div class="large-5 columns">
                                <i class="notif-block"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="large-2 columns">
                                <label><?= __('Postcode') ?></label>
                                <input type="text" name="postcode" value="<?= !empty($user_business->postcode) ? $user_business->postcode : '' ?>">
                            </div>
                            <div class="large-1 columns">
                                <i class="notif-block"></i>
                            </div>

                            <div class="large-5 columns">
                                <label><?= __('City') ?> *</label>
                                <input type="text" class="required" name="city" value="<?= !empty($user_business->city) ? $user_business->city : '' ?>">
                            </div>
                            <div class="large-1 columns">
                                <i class="notif-block"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="large-7 columns">
                                <label><?= __('Province') ?> *</label>
                                <input type="text" class="required" name="province"
                                       value="<?= !empty($user_business->province) ? $user_business->province : '' ?>">
                            </div>
                            <div class="large-5 columns">
                                <i class="notif-block"></i>
                            </div>
                        </div>
                    </div>
                    <?php if (empty($user_business)): ?>
                        <div class="form-group">
                            <?= form_checkbox('term_condition', 1, FALSE, 'class="checkbox required" id="term-condition-cb"') ?>
                            <label
                                for="term-condition-cb"><span></span><?= __('I have read and accepted the <a href="#" class="link">terms and condition</a>.') ?>
                            </label>
                        </div>
                    <?php endif; ?>
                    <hr>

                    <div class="form-group" id="payment-method">
                        <p><?= __('How do you wish to receive the payment from us?') ?></p>

                        <div>
                            <?= form_radio('payment_method', 'bank', 'bank', 'class="checkbox payment-method" id="payment-bank"') ?>
                            <label
                                for="payment-bank"><span></span><?= __('Bank account') ?>
                            </label>

                            <div class="payment-method-detail block-content">
                                <div class="form-group row">
                                    <div class="large-4 columns">Account number *</div>
                                    <div class="large-8 columns"><input type="text" name="bank_number" value="<?= !empty($payment_method->account_number) ? $payment_method->account_number : '' ?>"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="large-4 columns">Account name *</div>
                                    <div class="large-8 columns"><input type="text" name="bank_name" value="<?= !empty($payment_method->account_name) ? $payment_method->account_name : ''?>"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="large-4 columns">Swift code / BIC *</div>
                                    <div class="large-8 columns"><input type="text" name="bank_bic" value="<?= !empty($payment_method->bic) ? $payment_method->bic : '' ?>"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="large-4 columns">Bank *</div>
                                    <div class="large-4 columns end">
                                        <?= form_dropdown('bank_company', $banks, !empty($payment_method->refbank) ? $payment_method->bic : '' ) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <?= form_radio('payment_method', 'credit_card', !empty($user_business->payment_method) && $user_business->payment_method == 'credit_card' ? 'credit_card' : FALSE, 'class="checkbox payment-method" id="payment-cc"') ?>
                            <label
                                for="payment-cc"><span></span><?= __('Credit card') ?>
                            </label>

                            <div class="payment-method-detail block-content">
                                <div class="form-group row">
                                    <div class="large-4 columns">Card number *</div>
                                    <div class="large-6 columns end">
                                        <input type="text" name="cc_number" onblur="validateCreditCard(this)" value="<?= !empty($payment_method->card_number) ? $payment_method->card_number : '' ?>">
                                    </div>
                                    <div class="large-2 columns">
                                        <i class="notif-block sprites"></i>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="large-4 columns">CVV *</div>
                                    <div class="large-2 columns">
                                        <input type="text" name="cc_cvv" maxlength="3" value="<?= !empty($payment_method->cvv) ? $payment_method->cvv : ''?>">
                                    </div>
                                    <div class="large-6 columns">
                                        <small><?= __('Last three digits displayed in the signature panel on the back of your card.') ?></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="large-4 columns">Expiration date *</div>
                                    <div class="large-3 columns">
                                        <?= form_dropdown('cc_expiration_date[month]', months(), !empty($payment_method->expiration_date_month) ? $payment_method->expiration_date_month-1 : date('m', time()) - 1) ?>
                                    </div>
                                    <div class="large-2 columns end">
                                        <?= form_dropdown('cc_expiration_date[year]', years(TRUE), !empty($payment_method->expiration_date_year) ? $payment_method->expiration_date_year : date('Y', time())) ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="large-4 columns">Name on card *</div>
                                    <div class="large-8 columns"><input type="text" name="cc_name" value="<?= !empty($payment_method->card_name) ? $payment_method->card_name : '' ?>"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <?= form_radio('payment_method', 'paypal', !empty($user_business->payment_method) && $user_business->payment_method == 'paypal' ? 'paypal' : FALSE, 'class="checkbox payment-method" id="payment-paypal"') ?>
                            <label
                                for="payment-paypal"><span></span>Paypal
                            </label>
                            <small><?= __('(don’t have Paypal account? Make one <a href="http://paypal.com" target="_blank">here</a>!)') ?></small>

                            <div class="payment-method-detail block-content">
                                <div class="form-group row">
                                    <div class="large-4 columns"><?= __('E-mail address') ?></div>
                                    <div class="large-8 columns"><input type="email" name="paypal_email" value="<?= !empty($payment_method->email) ? $payment_method->email : '' ?>"></div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <p>
                            Please note that this information is for payment purposes between Larrizo and you. We are
                            not going to share this information to third parties or anyone else.
                        </p>
                    </div>
                </div>
            </div>

            <div class="form-group text-right">
                <?= form_submit('', 'submit', 'class="button"') ?>
            </div>
            <?= form_close() ?>
        </div>
        <?= $sidebar ?>
    </div>
<?= $_footer ?>