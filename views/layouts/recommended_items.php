

<?php $sliderBlocksQuantity = ceil(count($recommendedProducts) / 3); ?>
<?php for($i = 1; $i <= $sliderBlocksQuantity; $i++): ?>

    <?php if($i == 1): ?>
    <div class="item active">
    <?php else: ?>
    <div class="item">
    <?php endif; ?>

    <?php foreach($recommendedProducts as $num => $productItem): ?>
        <?php if($num < $i * 3 && $num >= ($i - 1) * 3): ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <div style="height: 240px; position: relative;">
                                <img src="/upload/images/products/<?php echo $productItem['image'];?>" alt=""
                                     style="position: absolute; margin: auto; left: 0; top: 0; bottom: 0; right: 0;"/>
                            </div>

                            <h2>$ <?php echo $productItem['price'];?></h2>
                            <p>
                                <a href="/product/<?php echo $productItem['id'];?>">
                                    <?php echo $productItem['name'];?>
                                </a>
                            </p>
                            <a href="#recommended-item-carousel" class="btn btn-default add-to-cart addToCart"
                               id="<?php echo $productItem['id'];?>">
                                <i class="fa fa-shopping-cart"></i>В корзину
                            </a>
                        </div>
                        <?php if($productItem['is_new'] == 1):?>
                            <img src="/template/images/home/new.png" class="new" alt="" />
                        <?php endif;?>
                    </div>
                </div>
            </div>
        <?php else:
                continue;
              endif; ?>
    <?php endforeach; ?>

    </div>
<?php endfor; ?>




