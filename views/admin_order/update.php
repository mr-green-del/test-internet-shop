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



            <div class="signup-form col-sm-4 col-sm-offset-4">
                <h4>Редактировать заказ #<?php echo $options['id']; ?></h4>
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

                    <p>Имя заказчика</p>
                    <input type="text" name="user_name" value="<?php  echo $options['user_name']; ?>">
                    <p>Телефон</p>
                    <input type="text" name="user_phone" value="<?php echo $options['user_phone']; ?>">
                    <p>Комментарий к заказу</p>
                    <textarea name="user_comment" id="" cols="30" rows="10"><?php echo $options['user_comment']; ?></textarea>
                    <p>Дата оформления заказа</p>
                    <input type="text" name="date" value="<?php echo $options['date']; ?>">

                    <p>Статус</p>
                    <select name="status" id="">
                        <option value="1"<?php if($options['status'] == 1) echo ' selected="selected"'?>>Новый заказ</option>
                        <option value="2"<?php if($options['status'] == 2) echo ' selected="selected"'?>>В обработке</option>
                        <option value="3"<?php if($options['status'] == 3) echo ' selected="selected"'?>>Доставляется</option>
                        <option value="4"<?php if($options['status'] == 4) echo ' selected="selected"'?>>Закрыт</option>
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