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

                        <?php if(isset($ordersList) && $ordersList != false): ?>
                            <table class="table-bordered table-striped table">
                                <tr>
                                    <th>ID заказа</th>
                                    <th>Имя</th>
                                    <th>Номер телефона</th>
                                    <th>Дата</th>
                                    <th>Комментарий</th>
                                    <th>Статус</th>
                                </tr>
                                <?php foreach ($ordersList as $number => $orderItem): ?>
                                    <tr>
                                        <td><?php echo $orderItem['id'];?></td>
                                        <td><?php echo $orderItem['user_name'];?></td>
                                        <td><?php echo $orderItem['user_phone'];?></td>
                                        <td><?php echo $orderItem['date'];?></td>
                                        <td><?php echo $orderItem['user_comment'];?></td>
                                        <td><?php echo Order::getStatusText($orderItem['status']);?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php else:  ?>
                            <p>Нет заказов</p>
                        <?php endif; ?>

                    </div><!--features_items-->


                </div>
            </div>
        </div>
    </section>

<?php require_once ROOT. '/views/layouts/footer.php'?>