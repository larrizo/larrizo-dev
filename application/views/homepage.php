<?= $_header ?>
    <div id="carousel" class="fullsize">
        <ul>
            <li class="carousel-item">
                <img src="/media/images/dummy/promo1.jpg">
            </li>
            <li class="carousel-item">
                <img src="/media/images/dummy/promo1.jpg">
            </li>
            <li class="carousel-item">
                <img src="/media/images/dummy/promo1.jpg">
            </li>
        </ul>
    </div>

    <div id="promotions">
        <ul class="row">
            <li class="large-4 columns"><a href="#"><img src="/media/images/dummy/promo2.jpg" class="fullsize"></a>
            </li>
            <li class="large-4 columns"><a href="#"><img src="/media/images/dummy/promo3.jpg" class="fullsize"></a>
            </li>
            <li class="large-4 columns"><a href="#"><img src="/media/images/dummy/promo4.jpg" class="fullsize"></a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="large-8 columns">
            <div class="block big" id="top-products">
                <div class="block-title">Top products</div>
                <div class="block-content product-container">
                    <?php for ($i = 0; $i < 8; $i++): ?>
                        <?php if ($i == 0 || $i % 4 == 0): ?>
                            <div class="row">
                        <?php endif; ?>
                        <div class="large-3 columns">
                            <?= $this->load->view('_product-vertical', '', TRUE) ?>
                        </div>
                        <?php if ($i == 8 || $i % 4 == 3): ?>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>

            <div class="row">
                <div class="large-6 columns block big">
                    <ul id="banner-list">
                        <li><img src="/media/images/dummy/promo5.jpg"></li>
                        <li><img src="/media/images/dummy/promo6.jpg"></li>
                        <li><img src="/media/images/dummy/promo7.jpg"></li>
                    </ul>
                </div>

                <div class="large-6 columns block big">
                    <div class="block-title">Recently viewed</div>

                    <div class="block-content product-container horizontal">
                        <?php for ($i = 0; $i < 3; $i++): ?>
                            <?= $this->load->view('_product-horizontal', '', TRUE) ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="large-4 columns">
            <?= $_blocks['todays-deal'] ?>
            <?= $_blocks['newsletter'] ?>
            <?= $_blocks['facebook'] ?>
        </div>
    </div>
<?= $_footer ?>