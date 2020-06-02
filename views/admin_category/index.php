<?php require_once ROOT. '/views/layouts/header_admin.php';?>

    <div class="container">
        <div class="row">
                <br>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление категориями</li>
                    </ol>
                </div>

                <a href="/admin/category/create" class="btn btn-default add-to-cart">
                    <i class="fa fa-plus"></i>Добавить категорию
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
                        <th>ID категории</th>
                        <th>Имя</th>
                        <th>Порядок сортировки</th>
                        <th>Статус</th>
                    </tr>
                    <?php foreach ($categories as $number => $categoryItem): ?>
                        <tr>
                            <td><?php echo $categoryItem['id'];?></td>
                            <td><?php echo $categoryItem['name'];?></td>
                            <td><?php echo $categoryItem['sort_order'];?></td>
                            <td><?php echo $categoryItem['status'];?></td>
                            <td>
                                <a href="/admin/category/update/<?php echo $categoryItem['id'];?>" title="Редактировать">
                                    <li class="fa fa-pencil-square"></li>
                                </a>
                            </td>
                            <td>
                                <a href="/admin/category/delete/<?php echo $categoryItem['id'];?>" title="Удалить">
                                    <li class="fa fa-times"></li>
                                </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </table>
        </div>
    </div>




<?php require_once ROOT. '/views/layouts/footer.php';?>