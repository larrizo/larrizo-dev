<?= $_header ?>
    <div class = "block row" id = "page-filter">
        <div class = "large-9 large-offset-3 columns">
            <a href = "/category/<?= $currentProductCategory ?>" class = "button <?= $subpage != 'product' ? "inactive" : "" ?>"><?= __( 'All products' ) ?></a>
            <a href = "/category/<?= $currentProductCategory ?>/stores" class = "button <?= $subpage != 'stores' ? "inactive" : "" ?>"><?= __( 'Stores' ) ?></a>
            <a href = "/category/<?= $currentProductCategory ?>/brands" class = "button <?= $subpage != 'brands' ? "inactive" : "" ?>"><?= __( 'Brands' ) ?></a>
        </div>
    </div>
    <div class = "row">
        <div id = "filters" class = "large-3 columns">
            <div id = "current-filters" class = "filter-block block"></div>
            <div id = "categories-filter" class = "filter-block block">
                <p class = "filter-title"><?= __( 'Categories' ) ?> <i class = "sprites minus"></i></p>
                <ul class = "filter-item">
                    <li>
                        <?= form_checkbox( 'category[]', 'all', FALSE, 'id="category-1" class="checkbox"' ) ?>
                        <?= form_label( '<span></span> Women <small>(3244)</small>', 'category-1' ) ?>
                    </li>
                    <li>
                        <?= form_checkbox( 'category[]', '0-10', FALSE, 'id="category-2" class="checkbox"' ) ?>
                        <?= form_label( '<span></span> Men <small>(3244)</small>', 'category-2' ) ?>
                    </li>
                    <li>
                        <?= form_checkbox( 'category[]', '11-25', FALSE, 'id="category-3" class="checkbox"' ) ?>
                        <?= form_label( '<span></span> Shoes <small>(3244)</small>', 'category-3' ) ?>
                    </li>
                    <li>
                        <?= form_checkbox( 'category[]', '26-50', FALSE, 'id="category-4" class="checkbox"' ) ?>
                        <?= form_label( '<span></span> Bags <small>(3244)</small>', 'category-4' ) ?>
                    </li>
                    <li>
                        <?= form_checkbox( 'category[]', '51-75', FALSE, 'id="category-5" class="checkbox"' ) ?>
                        <?= form_label( '<span></span> Accessories <small>(3244)</small>', 'category-5' ) ?>
                    </li>
                    <li>
                        <?= form_checkbox( 'category[]', '76-100', FALSE, 'id="category-6" class="checkbox"' ) ?>
                        <?= form_label( '<span></span> Sports <small>(3244)</small>', 'category-6' ) ?>
                    </li>
                </ul>
            </div>
        </div>
        <div id = "list-container" class = "large-9 columns">
            <div id = "sorting" class = "row">
                <ul class = "large-7 columns">
                    <li>Sort by:</li>
                    <li><a href = "#" class = "active">A-Z</a></li>
                    <li><a href = "#">Z-A</a></li>
                    <li><a href = "#"><?= __( 'Newest' ) ?></a></li>
                    <li><a href = "#"><?= __( 'Most popular' ) ?></a></li>
                </ul>
                <div id = "subsearch-container" class = "large-5 columns">
                    <div class = "form-group">
                        <?= form_input( 'keyword' ) ?>
                    </div>
                    <button type = "submit"><i class = "sprites arrow-right white"></i></button>
                </div>
            </div>
            <div class = "stores-container">
                <?php $stores = array('Sogo', 'Metro', 'Matahari'); ?>
                <?php for ( $i = 0; $i < 50; $i++ ): ?>
                    <?php if ( $i == 0 || $i % 5 == 0 ): ?>
                        <div class = "row">
                    <?php endif; ?>
                    <div class = "store columns">
                        <div class = "thumbnail-container">
                            <div class = "dummy"></div>
                            <div class = "thumbnail">
                                <?php $number = rand( 1, 3 ); ?>
                                <img src = "/media/images/dummy/store<?= $number ?>.jpg"
                                     class = "centered <?= ($number == 1 ? 'portrait' : 'landscape') ?>">
                            </div>

                            <a class="store-overlay text-center" href="#">
                                <span><?=$stores[$number-1]?></span>
                            </a>
                        </div>
                    </div>
                    <?php if ( $i == 50 || $i % 5 == 4 ): ?>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>

            <div class = "pagination pagination-centered">
                <a href = "#"><?= __( 'first' ) ?></a>
                <a href = "#" class = "sprites arrow-left"></a>
                <?php for ( $i = 0; $i < 10; $i++ ): ?>
                    <a href = "#" <?= ( $i == 0 ? "class='current'" : "" ) ?>><?= $i + 1 ?></a>
                <?php endfor; ?>
                <a href = "#" class = "sprites arrow-right"></a>
                <a href = "#"><?= __( 'last' ) ?></a>
            </div>
        </div>
    </div>
<?= $_footer ?>