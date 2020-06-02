<?php require_once ROOT. '/views/layouts/header.php';?>

    <section>
        <div class="container">
            <div class="row">
                <!-- category-->
                <?php require_once ROOT. '/views/layouts/category.php';?>
                <!-- category-->
                <div class="col-sm-4 col-sm-offset-2 padding right">

                    <!--sign up form-->


                    <div class="signup-form">
                        <h2>Оформить заказ</h2>
                        <!-- <div class="alert alert-success"></div> -->

                        <div class="alert alert-warning">
                            <p>Вы выбрали товаров: <?php echo $productsQuantity; ?></p>
                            <p>Общая стоимость: <?php echo $totalPrice; ?></p>
                        </div>
                        <?php if(isset($errors) && $errors): ?>
                            <div class="alert alert-danger">
                                <?php
                                    foreach($errors as $key => $errorMsg)
                                    {
                                        echo $errorMsg. "<br/>";
                                    }
                                ?>
                            </div>
                        <?php endif;?>


                        <form action="#" method="post">
                            <input type="text" name="name"   placeholder="Name" value="<?php echo $name;?>"
                                   required/>
                            <input type="text" name="number" placeholder="Phone number" value="<?php echo $number;?>"
                                   required/>
                            <?php foreach ($_POST['checked'] as $key => $value):?>
                                <input type="hidden" name="checked[]" value="<?php echo $value;?>">
                            <?php endforeach;?>
                            <textarea name="message" placeholder="Your comment" cols="30" rows="4"><?php echo $message;?></textarea>
                            <br>
                            <br>
                            <input type="submit" name="submit" class="btn btn-default" value="Оформить заказ"/>
                        </form>
                    </div>
                    <!--/sign up form-->

                    <br/>
                    <br/>
                </div>

             </div>
        </div>
    </section>


<?php require_once ROOT. '/views/layouts/footer.php'?>