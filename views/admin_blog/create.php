<?php require_once ROOT. '/views/layouts/header_admin.php';?>

    <div class="container">
        <div class="row">
            <br>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/blog">Управление блогом</a></li>
                    <li class="active">Добавить запись</li>
                </ol>
            </div>



            <div class="signup-form col-sm-6 col-sm-offset-3">
                <h4>Добавить запись</h4>
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

                    <p>Заголовок</p>
                    <input type="text" name="name" value="<?php  echo $options['name']; ?>">
                    <p>Картинка</p>
                    <input type="file" name="image" value="">

                    <p>Текст записи</p>
                    <textarea name="text" id="" cols="30" rows="10"><?php echo $options['text']; ?></textarea>


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