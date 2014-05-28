<?= $_header ?>
    <div class = "row">
        <div class = "large-8 columns">
            <div class = "row">
                <div class = "large-5 columns">
                    <div id = "product-carousel" class = "thumbnail-container">
                        <div class = "dummy"></div>
                        <div class = "thumbnail">
                            <div class = "sale">50%</div>
                            <img src = "/media/images/dummy/product3.jpg" class = "centered landscape">
                        </div>
                    </div>

                    <ul class = "bullet-pagination">

                        <li class = "pagination"><a href = "#" class = "sprites bullet active">1</a></li>
                        <li class = "pagination"><a href = "#" class = "sprites bullet">2</a></li>
                        <li class = "pagination"><a href = "#" class = "sprites bullet">3</a></li>
                        <li class = "pagination"><a href = "#" class = "sprites bullet">4</a></li>
                    </ul>

                    <div id = "product-thumbnails-container" class = "row">
                        <ul>
                            <?php for ( $i = 0; $i < 4; $i++ ): ?>
                                <li class = "large-3 columns">
                                    <div class = "thumbnail-container">
                                        <div class = "dummy"></div>
                                        <div class = "thumbnail <?= $i == 0 ? "active" : "" ?>">
                                            <img src = "/media/images/dummy/product3.jpg" class = "centered landscape">
                                        </div>
                                    </div>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>

                <div id = "product-detail" class = "large-7 columns">
                    <div class = "description">
                        <h2 class = "brand bold">L.K. Bennett</h2>

                        <h1 class = "name">Mouwloze jurk met blinde rits</h1>
                    </div>

                    <div class = "price">
                        <div class = "old">Rp <?= number_format( 180000, 2, ',', '.' ); ?></div>
                        <div class = "new">Rp <?= number_format( 90000, 2, ',', '.' ); ?></div>
                    </div>

                    <p>
                    <ul class = "colors">
                        <li class = "bold">COLOR(S):</li>
                        <li class = "color">
                            <div style = "background: #ed1c24;"></div>
                        </li>
                        <li class = "color">
                            <div style = "background: #754c24;"></div>
                        </li>
                        <li class = "color">
                            <div style = "background: #beb0a4;"></div>
                        </li>
                    </ul>
                    </p>

                    <p><span class = "bold">SIZE(S):</span> XS, S, M, L, XL, XXL</p>

                    <p><span class = "bold">DESCRIPTION:</span><br>
                        Deze mouwloze jurk van L.K. Bennett heeft een
                        geplooide a-symmetrische V-hals. Het model sluit aan
                        de achterzijde met een blinde rits en is afgewerkt met
                        een split.Combineer dit item van L.K. Bennett met
                        pumps en een korte blazer.</p>

                    <a href = "#" class = "button">BUY AT SOGO.COM</a>
                </div>
            </div>

            <?= $_blocks[ 'share' ] ?>

            <div class = "block big" id = "top-products">
                <div class = "block-title">Top products</div>
                <div class = "block-content product-container">
                    <?php for ( $i = 0; $i < 4; $i++ ): ?>
                        <?php if ( $i == 0 || $i % 4 == 0 ): ?>
                            <div class = "row">
                        <?php endif; ?>
                        <div class = "large-3 columns">
                            <?= $this->load->view( '_product-vertical', '', TRUE ) ?>
                        </div>
                        <?php if ( $i == 8 || $i % 4 == 3 ): ?>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="block">
                <img src="/media/images/dummy/promo2.jpg" class="fullsize" style="height: 100px;">
            </div>
        </div>
        <div class = "large-4 columns">
            <div class = "block">
                <div class = "block-title">Maybe you also like:</div>

                <div class = "block-content product-container horizontal">
                    <?php for ( $i = 0; $i < 3; $i++ ): ?>
                        <?= $this->load->view( '_product-horizontal', '', TRUE ) ?>
                    <?php endfor; ?>
                </div>
            </div>
            <div class = "block">
                <img src = "/media/images/dummy/promo5.jpg">
            </div>
            <?= $_blocks[ 'newsletter' ] ?>
            <?= $_blocks[ 'facebook' ] ?>
        </div>
    </div>
<?= $_footer ?>