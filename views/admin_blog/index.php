<?php require_once ROOT. '/views/layouts/header_admin.php';?>

    <div class="container">
        <div class="row">
                <br>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление блогом</li>
                    </ol>
                </div>

                <a href="/admin/blog/create" class="btn btn-default add-to-cart">
                    <i class="fa fa-plus"></i>Добавить запись
                </a>
                <h4>Список записей</h4>

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
                        <th>ID записи</th>
                        <th>Имя</th>
                        <th>Дата</th>
                        <th>Текст</th>
                        <th>Статус</th>
                    </tr>
                    <?php foreach ($blogItems as $number => $blogItem): ?>
                        <tr>
                            <td><?php echo $blogItem['id'];?></td>
                            <td><?php echo $blogItem['name'];?></td>
                            <td><?php echo $blogItem['date'];?></td>
                            <td><?php echo substr($blogItem['text'], 0, 50)."...";?></td>
                            <td><?php echo $blogItem['status'];?></td>
                            <td>
                                <a href="/admin/blog/update/<?php echo $blogItem['id'];?>" title="Редактировать">
                                    <li class="fa fa-pencil-square"></li>
                                </a>
                            </td>
                            <td>
                                <a href="/admin/blog/delete/<?php echo $blogItem['id'];?>" title="Удалить">
                                    <li class="fa fa-times"></li>
                                </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </table>
        </div>
    </div>




<?php require_once ROOT. '/views/layouts/footer.php';?>