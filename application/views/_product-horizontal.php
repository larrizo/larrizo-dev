<div class="product row">
    <div class="thumbnail-container large-5 columns">
        <div class="dummy"></div>
        <div class="thumbnail">
            <div class="sale">50%</div>
            <?php $number = rand(1,2); ?>
            <a href = "/product/coba">
                <img src="/media/images/dummy/product<?=$number?>.jpg" class="centered <?=($number%2==0 ? 'portrait' : 'landscape')?>">
            </a>
        </div>
    </div>

    <div class="description large-7 columns">
        <a class="brand" href="#">Geox</a>
        <a class="name" href="#">Mocassin Monet in blauw suède</a>

        <div class = "price">
            <?php if($number == 1):?>
                <div class = "old">Rp <?= number_format( 180000, 2, ',', '.' ); ?></div>
                <div class = "new">Rp <?= number_format( 90000, 2, ',', '.' ); ?></div>
            <?php else:?>
                Rp <?= number_format( 180000, 2, ',', '.' ); ?>
            <?php endif; ?>
        </div>
    </div>
</div>