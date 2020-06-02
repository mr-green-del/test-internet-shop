<?php require_once ROOT. '/views/layouts/header.php';?>

<section>
    <div class="container">
        <div class="row">
            <!-- category-->
            <?php require_once ROOT. '/views/layouts/category.php';?>
            <!-- category-->
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>
                    <?php if(isset($_SESSION['errors'])): ?>
                        <div class="alert alert-danger"><?php echo $_SESSION['errors'];?></div>
                        <?php unset($_SESSION['errors']);?>
                    <?php endif;?>

                    <?php require_once ROOT. '/views/layouts/last_items.php';?>

                </div><!--features_items-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            <?php require_once ROOT. '/views/layouts/recommended_items.php';?>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>








<?php require_once ROOT. '/views/layouts/footer.php'?>
