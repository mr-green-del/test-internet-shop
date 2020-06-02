<?php require_once ROOT. '/views/layouts/header.php';?>

    <section>
        <div class="container">
            <div class="row">
                <!-- category-->
                <?php require_once ROOT. '/views/layouts/category.php';?>
                <!-- category-->
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Блог магазина</h2>
                        <?php if(isset($_SESSION['errors'])): ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['errors'];?></div>
                            <?php unset($_SESSION['errors']);?>
                        <?php endif;?>

                        <?php require_once ROOT. '/views/layouts/blog_items.php';?>

                    </div><!--features_items-->

                    <div class="mr-auto  pr-5" style="">
                        <?php echo $pagination;?>
                    </div>
                </div>
            </div>
        </div>
    </section>








<?php require_once ROOT. '/views/layouts/footer.php'?>