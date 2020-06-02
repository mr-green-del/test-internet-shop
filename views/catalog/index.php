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

                    <?php require_once ROOT. '/views/layouts/last_items.php';?>

                </div><!--features_items-->

            </div>
        </div>
    </div>
</section>



<?php require_once ROOT. '/views/layouts/footer.php'?>
