<?php require_once ROOT. '/views/layouts/header.php';?>

<section>
    <div class="container">
        <div class="row">

            <?php require_once ROOT. "/views/layouts/cabinet_sections.php";?>
            <!-- category-->
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->

                    <h2 class="title text-center">Кабинет пользователя <?php echo $user['name'];?></h2>

                    <?php if(isset($_SESSION['errors'])): ?>
                        <div class="alert alert-danger"><?php echo $_SESSION['errors'];?></div>
                        <?php unset($_SESSION['errors']);?>
                    <?php elseif(isset($_SESSION['message'])): ?>
                        <div class="alert alert-success"><?php echo $_SESSION['message'];?></div>
                        <?php unset($_SESSION['message']);?>
                    <?php endif;?>

                </div><!--features_items-->


            </div>
        </div>
    </div>
</section>

<?php require_once ROOT. '/views/layouts/footer.php'?>





















