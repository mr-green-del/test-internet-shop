<?php require_once ROOT. '/views/layouts/header_admin.php';?>

    <div class="container">
        <div class="row">
            <br>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li class="active">Редактировать заказ</li>
                </ol>
            </div>



            <div class="signup-form col-sm-6 col-sm-offset-1">
                <h4>Просмотр заказа #<?php echo $order['id']; ?></h4>
                <br>

                <p>Информация о заказе</p>

                <table class="table">
                    <tr><td>Номер заказа</td>        <td><?php echo $order['id'];?></td></tr>
                    <tr><td>Имя клиента</td>         <td><?php echo $order['user_name'];?></td></tr>
                    <tr><td>Телефон клиента</td>     <td><?php echo $order['user_phone'];?></td></tr>
                    <tr><td>Комментарий клиента</td> <td><?php echo $order['user_comment'];?></td></tr>
                    <tr><td>ID клиента</td>          <td><?php if($order['user_id'] != 0) echo $order['user_id'];?></td></tr>
                    <tr><td><b>Статус заказа</b></td>
                        <td><?php echo Order::getStatusText($order['status']); ?></td>
                    </tr>
                    <tr><td><b>Дата заказа</b></td>  <td><?php echo $order['date'];?></td></tr>
                </table>

                <p>Товары в заказе</p>

                    <table class="table-bordered table-striped table">
                        <tr>
                            <th>ID товара</th>
                            <th>Артикул товара</th>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Количество</th>
                        </tr>
                        <?php foreach ($products as $num => $productItem): ?>
                            <tr>
                                <td><?php echo $productItem['id'];?></td>
                                <td><?php echo $productItem['code'];?></td>
                                <td><?php echo $productItem['name'];?></td>
                                <td><?php echo $productItem['price'];?></td>
                                <td><?php echo $productQuantity[$productItem['id']];?></td>


                            </tr>
                        <?php endforeach; ?>
                    </table>

                <br>
                <br>
            </div>
        </div>
    </div>




<?php require_once ROOT. '/views/layouts/footer.php';?>