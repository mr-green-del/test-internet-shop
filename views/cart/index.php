<?php require_once ROOT. '/views/layouts/header.php';?>



    <section>
        <div class="container">
            <div class="row">
                <!-- category-->
                <?php require_once ROOT. '/views/layouts/category.php';?>
                <!-- category-->
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Корзина</h2>

                        <div id="tableWithProducts">

                        <?php if(isset($_SESSION['errors'])): ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['errors'];?></div>
                            <?php unset($_SESSION['errors']);?>
                        <?php elseif(isset($_SESSION['message'])): ?>
                            <div class="alert alert-success"><?php echo $_SESSION['message'];?></div>
                            <?php unset($_SESSION['message']);?>
                        <?php endif;?>

                        <?php if($productsInCart): ?>


                        <form action="/cart/checkout" method="post">
                            <p>Вы выбрали такие товары: </p>
                            <table class="table-bordered table-striped table">
                                <tr>
                                    <th>Код товара</th>
                                    <th>Название</th>
                                    <th>Стоимость, $</th>
                                    <th>Количество</th>
                                    <th>Удалить</th>
                                    <th>Выбрать</th>
                                </tr>

                                <?php foreach($products as $product): ?>
                                    <tr id="productTableId-<?php echo $product['id'];?>">
                                        <td><?php echo $product['code'];?></td>
                                        <td>
                                            <a href="/product/<?php echo $product['id'];?>">
                                                <?php echo $product['name'];?>
                                            </a>
                                        </td>
                                        <td>$ <?php echo $product['price'];?></td>
                                        <td><?php echo $productsInCart[$product['id']];?></td>
                                        <td>
                                            <a href="#" class="deleteFromCart" id="<?php echo $product['id'];?>" title="Удалить">&#10008;</a>
                                        </td>
                                        <td><input type="checkbox" name="checked[]" value="<?php echo $product['id'];?>" class="checkbox" ></td>
                                    </tr>
                                <?php endforeach; ?>

                                    <tr>
                                        <td colspan="2">Общая стоимость: </td>
                                        <td id="totalPrice"><?php echo $totalPrice; ?></td>
                                        <td><?php echo $productQuantity; ?></td>
                                        <td></td>
                                        <td><input id="checkAll" type="checkbox" title="Выбрать все" style="cursor: pointer;"></td>
                                    </tr>
                            </table>

                                <button type="submit" name="label" class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>Оформить заказ
                                </button>

                        </form>
                        <script>

                            checkedAll         = document.getElementById('checkAll');
                            checkOne           = document.getElementsByClassName("checkbox");

                            for(let i = 0; i < checkOne.length; i++)
                            {
                                checkOne[i].onclick = function()
                                {
                                    is_checked = true;

                                    for(let k = 0; k < checkOne.length; k++)
                                    {
                                        if(!checkOne[k].checked)
                                        {
                                            is_checked = false;
                                            break;
                                        }

                                        continue;
                                    }

                                    checkedAll.checked = (is_checked)? true: false;
                                    return 0;
                                }
                            }

                            checkedAll.onclick = function()
                            {
                                checkAll("checkbox");
                            };

                            function checkAll(className)
                            {
                                let checkbox = document.getElementsByClassName(className),
                                    checkAll = document.getElementById('checkAll');

                                for(let i = 0; i < checkbox.length; i++)
                                {
                                    checkbox[i].checked = (checkAll.checked)? true: false;
                                }
                            }

                        </script>

                        <?php else: ?>
                            <p>Корзина пуста</p>
                        <?php endif; ?>
                        </div>
                    </div><!--features_items-->

                </div>
            </div>
        </div>
    </section>



<?php require_once ROOT. '/views/layouts/footer.php'?>