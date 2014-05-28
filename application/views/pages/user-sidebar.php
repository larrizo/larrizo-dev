<div class="large-4 columns">
    <div class="block" id="activity">
        <div class="block-title">Activity</div>

        <div class="block-content">
            <ul class="row">
                <li class="<?= ($tabActive == 'profile' ? 'active' : '') ?>"><a href="/user">Profile</a></li>
                <li class="<?= ($tabActive == 'change-password' ? 'active' : '') ?>"><a href="/user/change-password">Change
                        password</a></li>
                <li class="<?= ($tabActive == 'my-business' ? 'active' : '') ?>"><a href="/user/my-business">My
                        business</a></li>
                <li class="<?= ($tabActive == 'wishlist' ? 'active' : '') ?>"><a href="/user/wishlist">Wishlist</a></li>
                <li class="<?= ($tabActive == 'purchase-history' ? 'active' : '') ?>"><a href="/user/purchase-history">Purchase
                        history</a></li>
                <li class="<?= ($tabActive == 'recently-viewed' ? 'active' : '') ?>"><a href="/user/recently-viewed">Recently
                        viewed</a></li>
                <li><a href="#" class="error">Deactivate</a></li>
            </ul>
        </div>
    </div>
</div>