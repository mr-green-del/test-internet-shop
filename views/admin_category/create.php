<?php require_once ROOT. '/views/layouts/header_admin.php';?>

    <div class="container">
        <div class="row">
            <br>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li class="active">Добавить категорию</li>
                </ol>
            </div>



            <div class="signup-form col-sm-4 col-sm-offset-4">
                <h4>Добавить товар</h4>
                <br>

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

                <form action="#" method="post" enctype="multipart/form-data">
                    <!--                    <input type="hidden" name="MAX_FILE_SIZE" value="288" />-->

                    <p>Наименование категории</p>
                    <input type="text" name="name" value="<?php  echo $options['name']; ?>">
                    <p>Порядок сортировки</p>
                    <input type="text" name="sort_order" value="<?php echo $options['sort_order']; ?>">

                    <p>Статус</p>
                    <select name="status" id="">
                        <option value="1"<?php if($options['status'] == 1) echo ' selected="selected"'?>>Отображается</option>
                        <option value="0"<?php if($options['status'] == 0) echo ' selected="selected"'?>>Не отображается</option>
                    </select>

                    <br>
                    <br>
                    <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                </form>
                <br>
                <br>
            </div>
        </div>
    </div>




<?php require_once ROOT. '/views/layouts/footer.php';?>