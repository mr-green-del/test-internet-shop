<?php require_once ROOT. '/views/layouts/header_admin.php';?>

    <div class="container">
        <div class="row">
            <br>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Добавить товар</li>
                </ol>
            </div>



            <div class="signup-form col-sm-4 col-sm-offset-4">
                <h4>Добавить категорию</h4>
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

                    <p>Наименование товара</p>
                    <input type="text" name="name" value="<?php  echo $options['name']; ?>">
                    <p>Артикул</p>
                    <input type="text" name="code" value="<?php echo $options['code']; ?>">
                    <p>Стоимость, $</p>
                    <input type="text" name="price" value="<?php echo $options['price']; ?>">

                    <p>Категория</p>
                    <select name="category" id="" value="<?php echo $options['category']; ?>">
                        <?php foreach($categories as $num => $categoryItem): ?>
                            <option value="<?php echo $categoryItem['id'];?>">
                                <?php echo $categoryItem['name']; ?>
                            </option>
                        <?php endforeach;?>
                    </select>
                    <br>
                    <br>

                    <p>Производитель</p>
                    <input type="text" name="brand" value="<?php echo $options['brand']; ?>">

                    <p>Изображение товара</p>

                    <input type="file" name="image">

                    <p>Детальное описание</p>
                    <textarea name="description" id="" cols="30" rows="10"><?php echo $options['description']; ?></textarea>

                    <p>Наличие на складе</p>
                    <select name="availability" id="" value="">
                        <option value="1"<?php if($options['availability'] == 1) echo ' selected="selected"'?>>Да</option>
                        <option value="0"<?php if($options['availability'] == 0) echo ' selected="selected"'?>>Нет</option>
                    </select>

                    <p>Новинка</p>
                    <select name="is_new" id="">
                        <option value="1"<?php if($options['is_new'] == 1) echo ' selected="selected"'?>>Да</option>
                        <option value="0"<?php if($options['is_new'] == 0) echo ' selected="selected"'?>>Нет</option>
                    </select>

                    <p>Рекомендуемые</p>
                    <select name="is_recommended" id="">
                        <option value="1"<?php if($options['is_recommended'] == 1) echo ' selected="selected"'?>>Да</option>
                        <option value="0"<?php if($options['is_recommended'] == 0) echo ' selected="selected"'?>>Нет</option>
                    </select>

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