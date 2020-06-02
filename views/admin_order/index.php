<?php require_once ROOT. '/views/layouts/header_admin.php';?>

    <div class="container">
        <div class="row">
            <?php if(isset($ordersList)): ?>
                <br>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление заказами</li>
                    </ol>
                </div>

                <h4>Список заказов</h4>

                <?php if(isset($_SESSION['errors'])): ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['errors'];?></div>
                    <?php unset($_SESSION['errors']);?>
                <?php elseif(isset($_SESSION['message'])): ?>
                    <div class="alert alert-success"><?php echo $_SESSION['message'];?></div>
                    <?php unset($_SESSION['message']);?>
                <?php endif;?>

                <br>
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID заказа</th>
                        <th>Имя заказчика</th>
                        <th>Номер телефона</th>
                        <th>Дата</th>
                        <th>ID пользователя</th>
                        <th>Статус</th>
                    </tr>
                    <?php foreach ($ordersList as $number => $orderItem): ?>
                        <tr>
                            <td><?php echo $orderItem['id'];?></td>
                            <td><?php echo $orderItem['user_name'];?></td>
                            <td><?php echo $orderItem['user_phone'];?></td>
                            <td><?php echo $orderItem['date'];?></td>
                            <td><?php echo $orderItem['user_id'];?></td>
                            <td><?php echo $orderItem['status'];?></td>
                            <td>
                                <a href="/admin/order/view/<?php echo $orderItem['id'];?>" title="Просмотреть">
                                    <li class="fa fa-eye"></li>
                                </a>
                            </td>
                            <td>
                                <a href="/admin/order/update/<?php echo $orderItem['id'];?>" title="Редактировать">
                                    <li class="fa fa-pencil-square"></li>
                                </a>
                            </td>
                            <td>
                                <a href="/admin/order/delete/<?php echo $orderItem['id'];?>" title="Удалить">
                                    <li class="fa fa-times"></li>
                                </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
    </div>




<?php require_once ROOT. '/views/layouts/footer.php';?>