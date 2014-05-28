<?= $_header ?>
    <div class="block row" id="page-filter">
        <div class="large-9 large-offset-3 columns">
            <a href="/category/<?=$currentProductCategory?>" class="button <?=$subpage != 'product' ? "inactive" : ""?>"><?= __('All products') ?></a>
            <a href="/category/<?=$currentProductCategory?>/stores" class="button <?=$subpage != 'stores' ? "inactive" : ""?>"><?= __('Stores') ?></a>
            <a href="/category/<?=$currentProductCategory?>/brands" class="button <?=$subpage != 'brands' ? "inactive" : ""?>"><?= __('Brands') ?></a>
        </div>
    </div>
    <div class="row">
    <div id="filters" class="large-3 columns">
        <div id="current-filters" class="filter-block block"></div>
        <div id="sale-filter" class="filter-block block">
            <p class="filter-title"><?= __('Sale') ?> <i class="sprites minus"></i></p>
            <ul class="filter-item">
                <li>
                    <?= form_checkbox('sale[]', 'all', FALSE, 'id="sale-1" class="checkbox"') ?>
                    <?= form_label('<span></span> ' . __('All items') . ' <small>(3244)</small>', 'sale-1') ?>
                </li>
                <li>
                    <?= form_checkbox('sale[]', '0-10', FALSE, 'id="sale-2" class="checkbox"') ?>
                    <?= form_label('<span></span> < 10% <small>(3244)</small>', 'sale-2') ?>
                </li>
                <li>
                    <?= form_checkbox('sale[]', '11-25', FALSE, 'id="sale-3" class="checkbox"') ?>
                    <?= form_label('<span></span> 10% - 25% <small>(3244)</small>', 'sale-3') ?>
                </li>
                <li>
                    <?= form_checkbox('sale[]', '26-50', FALSE, 'id="sale-4" class="checkbox"') ?>
                    <?= form_label('<span></span> 25% - 50% <small>(3244)</small>', 'sale-4') ?>
                </li>
                <li>
                    <?= form_checkbox('sale[]', '51-75', FALSE, 'id="sale-5" class="checkbox"') ?>
                    <?= form_label('<span></span> 50% - 75% <small>(3244)</small>', 'sale-5') ?>
                </li>
                <li>
                    <?= form_checkbox('sale[]', '76-100', FALSE, 'id="sale-6" class="checkbox"') ?>
                    <?= form_label('<span></span> > 75% <small>(3244)</small>', 'sale-6') ?>
                </li>
            </ul>
        </div>
        <div id="categories-filter" class="filter-block block">
            <p class="filter-title"><?= __('Categories') ?> <i class="sprites minus"></i></p>
            <ul class="filter-item">
                <li>
                    <?= form_checkbox('category[]', 'all', FALSE, 'id="category-1" class="checkbox"') ?>
                    <?= form_label('<span></span> Women <small>(3244)</small>', 'category-1') ?>
                </li>
                <li>
                    <?= form_checkbox('category[]', '0-10', FALSE, 'id="category-2" class="checkbox"') ?>
                    <?= form_label('<span></span> Men <small>(3244)</small>', 'category-2') ?>
                </li>
                <li>
                    <?= form_checkbox('category[]', '11-25', FALSE, 'id="category-3" class="checkbox"') ?>
                    <?= form_label('<span></span> Shoes <small>(3244)</small>', 'category-3') ?>
                </li>
                <li>
                    <?= form_checkbox('category[]', '26-50', FALSE, 'id="category-4" class="checkbox"') ?>
                    <?= form_label('<span></span> Bags <small>(3244)</small>', 'category-4') ?>
                </li>
                <li>
                    <?= form_checkbox('category[]', '51-75', FALSE, 'id="category-5" class="checkbox"') ?>
                    <?= form_label('<span></span> Accessories <small>(3244)</small>', 'category-5') ?>
                </li>
                <li>
                    <?= form_checkbox('category[]', '76-100', FALSE, 'id="category-6" class="checkbox"') ?>
                    <?= form_label('<span></span> Sports <small>(3244)</small>', 'category-6') ?>
                </li>
            </ul>
        </div>
        <div id="brands-filter" class="filter-block block">
            <p class="filter-title">Brands <i class="sprites minus"></i></p>

            <ul class="filter-item">
                <li>
                    <?= form_checkbox('brand[]', 'all', FALSE, 'id="brand-1" class="checkbox"') ?>
                    <?= form_label('<span></span> Aaiko <small>(3244)</small>', 'brand-1') ?>
                </li>
                <li>
                    <?= form_checkbox('brand[]', '0-10', FALSE, 'id="brand-2" class="checkbox"') ?>
                    <?= form_label('<span></span> Abodee <small>(3244)</small>', 'brand-2') ?>
                </li>
                <li>
                    <?= form_checkbox('brand[]', '11-25', FALSE, 'id="brand-3" class="checkbox"') ?>
                    <?= form_label('<span></span> Amco Houseworks <small>(3244)</small>', 'brand-3') ?>
                </li>
                <li>
                    <?= form_checkbox('brand[]', '26-50', FALSE, 'id="brand-4" class="checkbox"') ?>
                    <?= form_label('<span></span> Armani Jeans <small>(3244)</small>', 'brand-4') ?>
                </li>
                <li>
                    <?= form_checkbox('brand[]', '51-75', FALSE, 'id="brand-5" class="checkbox"') ?>
                    <?= form_label('<span></span> Baccarat <small>(3244)</small>', 'brand-5') ?>
                </li>
                <li>
                    <?= form_checkbox('category[]', '76-100', FALSE, 'id="brand-6" class="checkbox"') ?>
                    <?= form_label('<span></span> Balenciaga <small>(3244)</small>', 'brand-6') ?>
                </li>
            </ul>
        </div>
        <div id="price-filter" class="filter-block block">
            <p class="filter-title">Price <i class="sprites minus"></i></p>
            <ul class="filter-item">
                <li>
                    <?= form_checkbox('price[]', '0-10', FALSE, 'id="price-2" class="checkbox"') ?>
                    <?= form_label('<span></span> < 100K <small>(3244)</small>', 'price-2') ?>
                </li>
                <li>
                    <?= form_checkbox('price[]', '11-25', FALSE, 'id="price-3" class="checkbox"') ?>
                    <?= form_label('<span></span> 100K - 250K <small>(3244)</small>', 'price-3') ?>
                </li>
                <li>
                    <?= form_checkbox('price[]', '26-50', FALSE, 'id="price-4" class="checkbox"') ?>
                    <?= form_label('<span></span> 250K - 500K <small>(3244)</small>', 'price-4') ?>
                </li>
                <li>
                    <?= form_checkbox('price[]', '51-75', FALSE, 'id="price-5" class="checkbox"') ?>
                    <?= form_label('<span></span> 500K - 750K <small>(3244)</small>', 'price-5') ?>
                </li>
                <li>
                    <?= form_checkbox('price[]', '76-100', FALSE, 'id="price-6" class="checkbox"') ?>
                    <?= form_label('<span></span> 750K - 1000K <small>(3244)</small>', 'price-6') ?>
                </li>
                <li>
                    <?= form_checkbox('price[]', '76-100', FALSE, 'id="price-6" class="checkbox"') ?>
                    <?= form_label('<span></span> > 1000K <small>(3244)</small>', 'price-6') ?>
                </li>
            </ul>
        </div>
        <div id="color-filter" class="filter-block block">
            <p class="filter-title"><?= __('Colors') ?> <i class="sprites minus"></i></p>
            <ul class="filter-item">
                <li>
                    <?= form_checkbox('color[]', '0-10', FALSE, 'id="color-2" class="checkbox"') ?>
                    <?= form_label('<span></span> ' . __('Black') . ' <small>(3244)</small>', 'color-2') ?>
                </li>
                <li>
                    <?= form_checkbox('color[]', '11-25', FALSE, 'id="color-3" class="checkbox"') ?>
                    <?= form_label('<span></span> ' . __('White') . ' <small>(3244)</small>', 'color-3') ?>
                </li>
                <li>
                    <?= form_checkbox('color[]', '26-50', FALSE, 'id="color-4" class="checkbox"') ?>
                    <?= form_label('<span></span> ' . __('Red') . ' <small>(3244)</small>', 'color-4') ?>
                </li>
                <li>
                    <?= form_checkbox('color[]', '51-75', FALSE, 'id="color-5" class="checkbox"') ?>
                    <?= form_label('<span></span> ' . __('Blue') . ' <small>(3244)</small>', 'color-5') ?>
                </li>
                <li>
                    <?= form_checkbox('color[]', '76-100', FALSE, 'id="color-6" class="checkbox"') ?>
                    <?= form_label('<span></span> ' . __('Green') . ' <small>(3244)</small>', 'color-6') ?>
                </li>
                <li>
                    <?= form_checkbox('color[]', '76-100', FALSE, 'id="color-6" class="checkbox"') ?>
                    <?= form_label('<span></span> ' . __('Yellow') . ' <small>(3244)</small>', 'color-6') ?>
                </li>
            </ul>
        </div>
    </div>
    <div id="list-container" class="large-9 columns">
        <div id="sorting" class="row">
            <ul class="large-7 columns">
                <li>Sort by:</li>
                <li><a href="#" class="active">A-Z</a></li>
                <li><a href="#">Z-A</a></li>
                <li><a href="#"><?= __('Newest') ?></a></li>
                <li><a href="#"><?= __('Most popular') ?></a></li>
            </ul>
            <div id="subsearch-container" class="large-5 columns">
                <div class="form-group">
                    <?= form_input('keyword') ?>
                </div>
                <button type="submit"><i class="sprites arrow-right white"></i></button>
            </div>
        </div>
        <div class="product-container">
            <?php for ($i = 0; $i < 20; $i++): ?>
                <?php if ($i == 0 || $i % 4 == 0): ?>
                    <div class="row">
                <?php endif; ?>
                <div class="large-3 columns">
                    <?= $this->load->view('_product-vertical', '', TRUE) ?>
                </div>
                <?php if ($i == 20 || $i % 4 == 3): ?>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>

        <div class="pagination pagination-centered">
            <a href="#"><?=__('first')?></a>
            <a href="#" class="sprites arrow-left"></a>
            <?php for ($i = 0; $i < 10; $i++): ?>
                <a href="#" <?=($i==0 ? "class='current'" : "")?>><?=$i+1?></a>
            <?php endfor; ?>
            <a href="#" class="sprites arrow-right"></a>
            <a href="#"><?=__('last')?></a>
        </div>

        <div id="product-detail" class="hide row popup">
            <i class="sprites cross close"></i>

            <div class="sale">50%</div>
            <div class="thumbnail large-4 columns">
                <?php $number = rand(1, 2); ?>
                <img src="/media/images/dummy/product<?= $number ?>.jpg">
            </div>

            <div class="description large-8 columns">
                <div class="brand">Geox</div>
                <div class="name">Mocassin Monet in blauw suède</div>
                <div class="price">
                    <div class="old">Rp <?= number_format(180000, 2, ',', '.'); ?></div>
                    <div class="new">Rp <?= number_format(90000, 2, ',', '.'); ?></div>
                </div>
                <a href="#" class="button">Buy at Sogo.com</a>

                <div class="text-right italic">see details <i class="sprites arrow-right"></i></div>
            </div>
        </div>
    </div>
    </div>
<?= $_footer ?>