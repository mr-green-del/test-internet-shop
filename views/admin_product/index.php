<?php require_once ROOT. '/views/layouts/header_admin.php';?>

    <div class="container">
        <div class="row">
            <?php if(isset($productsList)): ?>
                <br>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление товарами</li>
                    </ol>
                </div>

                <a href="/admin/product/create" class="btn btn-default add-to-cart">
                        <i class="fa fa-plus"></i>Добавить товар
                </a>
                <h4>Список товаров</h4>

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
                        <th>ID товара</th>
                        <th>Код товара</th>
                        <th>Название</th>
                        <th>Стоимость, $</th>
                        <th></th>
                        <th></th>
                        <th>Статус</th>
                        
                    </tr>
                    <?php foreach ($productsList as $number => $productItem): ?>
                        <?php if($productItem['status'] == 0) continue; ?>
                        <tr>
                            <td><?php echo $productItem['id'];?></td>
                            <td><?php echo $productItem['code'];?></td>
                            <td><?php echo $productItem['name'];?></td>
                            <td><?php echo $productItem['price'];?></td>
                            <td>
                                <a href="/admin/product/update/<?php echo $productItem['id'];?>" title="Редактировать">
                                    <li class="fa fa-pencil-square"></li>
                                </a>
                            </td>
                            <td>
                                <a href="/admin/product/delete/<?php echo $productItem['id'];?>" title="Удалить">
                                    <li class="fa fa-times"></li>
                                </a>
                            </td>
                            <td><?php echo $productItem['status'];?></td>

                        </tr>
                    <?php endforeach; ?>
                </table>
                <?php echo $pagination;?>
            <?php endif; ?>
        </div>
    </div>




<?php require_once ROOT. '/views/layouts/footer.php';?>