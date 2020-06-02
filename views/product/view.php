<?php require_once ROOT. '/views/layouts/header.php';?>

<section>
    <div class="container">
        <div class="row">
            <!--category-->
            <?php require_once ROOT. '/views/layouts/category.php';?>
            <!--/category-->

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="/upload/images/products/<?php echo $productItem['image'];?>" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <?php if($productItem['is_new'] == 1): ?>
                                    <img src="/template/images/product-details/new.jpg" class="newarrival" alt="" />
                                <?php endif; ?>
                                <h2><?php echo $productItem['name'];?></h2>
                                <p>Код товара: <?php echo $productItem['code'];?></p>
                                <span>
                                            <span>US $<?php echo $productItem['price'];?></span>
                                            <label>Количество:</label>
                                            <input type="text" value="3" />
                                            <a href="#" class="addToCart" id="<?php echo $productItem['id'];?>">
                                                <button type="button" class="btn btn-fefault cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    В корзину
                                                </button>
                                            </a>
                                        </span>
                                <p><b>Наличие:</b> <?php if($productItem['status']) echo 'На складе';
                                                         else                       echo 'Отсутствует';?></p>
                                <p><b>Состояние:</b> Новое</p>
                                <p><b>Производитель:</b> D&amp;G</p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            <p>
                                <?php echo preg_replace("~\n~", "<br>", $productItem['description']); ?>
                            </p>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>


<br/>
<br/>


<?php require_once ROOT. '/views/layouts/footer.php';?>