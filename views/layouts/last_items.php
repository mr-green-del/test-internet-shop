
<?php $i = 0;?>
    <?php foreach($products as $num => $productItem): ?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <div style="height: 240px; position: relative;">
                            <img src="/upload/images/products/<?php echo $productItem['image'];?>" alt=""
                                 style="position: absolute; margin: auto; left: 0; top: 0; bottom: 0; right: 0;"/>
                        </div>
                        <h2>
                                $ <?php echo $productItem['price'];?>
                        </h2>
                        <p>
                            <a href="/product/<?php echo $productItem['id'];?>">
                                <?php echo $productItem['name'];?>
                            </a>
                        </p>
                        <?php if($num % 3 == 0) $i++;

                              $bookmarkName = $i;
                              $bookmarkLink = $i - 1;
                        ?>
                        <a href="#<?php echo $bookmarkLink;?>" name="<?php echo $bookmarkName;?>"
                           class="btn btn-default add-to-cart addToCart"
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
    <?php endforeach; ?>