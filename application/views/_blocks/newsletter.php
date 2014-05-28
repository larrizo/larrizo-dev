<div class = "block" id = "newsletter">
    <div class = "block-title">Keep me updated:</div>

    <div class = "block-content">
        <p class="note">Subscribe and don't miss our great deals</p>

        <?=form_open('/newsletter/subscribe')?>
        <div class = "form-control row">
            <div class = "large-12 columns">
                <?=form_input('email', '', 'placeholder="Enter your email address"')?>
            </div>
        </div>
        <?=form_close()?>

        <div class = "text-right">
            <?=form_submit('', 'subscribe', 'class="button"')?>
        </div>
    </div>
</div>