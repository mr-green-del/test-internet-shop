<?php

    class AdminProductController extends AdminBase
    {

        public function actionIndex($pageNumber = 1)
        {

            self::checkAdmin();

            $limit = 25;

            $productsList = Product::getProductsList($pageNumber, $limit);
            $total        = Product::getTotalRecordsInDb();

            $Pagination  = new Pagination($pageNumber, $limit, "/admin/product/page-", 15, $total);
            $pagination  = $Pagination->getHtml();

            require_once ROOT. '/views/admin_product/index.php';
            return true;
        }

        public function actionCreate()
        {
            self::checkAdmin();

            $categories = Category::getCategoryList();

            $options['name']           = '';
            $options['code']           = '';
            $options['price']          = '';
            $options['brand']          = '';
            $options['category_id']    = '';
            $options['description']    = '';
            $options['availability']   = '';
            $options['is_new']         = '';
            $options['is_recommended'] = '';
            $options['status']         = '';

            if(isset($_POST['submit']))
            {

                $options['name']           = $_POST['name'];
                $options['code']           = $_POST['code'];
                $options['price']          = $_POST['price'];
                $options['brand']          = $_POST['brand'];
                $options['category_id']    = $_POST['category'];
                $options['description']    = $_POST['description'];
                $options['availability']   = $_POST['availability'];
                $options['is_new']         = $_POST['is_new'];
                $options['is_recommended'] = $_POST['is_recommended'];
                $options['status']         = $_POST['status'];

                $errors = false;

                if(strlen(trim($options['name'])) < 5)
                {
                    $errors[] = 'Имя должно быть длиннее 4 символов';
                }

                if(trim($options['code']) == '')
                {
                    $errors[] = 'Введите код товара';
                }
                elseif(!preg_match('~[0-9]+~', $options['code']))
                {
                    $errors[] = 'Код товара должен быть числом';
                }

                if(trim($options['brand']) == '')
                {
                    $errors[] = 'Не заполнен производитель';
                }

                if($options['price'] == 0)
                {
                    $errors[] = 'Цена должна быть больше нуля';
                }
                elseif(!preg_match('~[1-9][0-9]+~', $options['price']))
                {
                    $errors[] = 'Цена должна быть числом и не должна начинаться с нуля';
                }

                if(strlen($options['description']) < 10)
                {
                    $errors[] = 'Описание товара должно быть длиннее 9 символов';
                }

                if(isset($_FILES['image']) && $_FILES['image']['error'] == 0)
                {
                    if(!preg_match('~image~', $_FILES['image']['type'] ))
                    {
                        $errors[] = 'Файл должен быть картинкой';
                    }
                    elseif(round($_FILES['image']['size'] / 1024) > 4096)
                    {
                        $errors[] = 'Файл должен быть меньше 4096 килобайт';
                    }
                    if(is_uploaded_file($_FILES['image']['tmp_name']) && $errors == false)
                    {
                        $name = basename($_FILES['image']['name']);
                        $options['image'] = $name;
                        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/upload/images/products/'. $name);
                    }
                    else
                    {
                        $errors[] = 'Ошибка загрузки';
                    }
                }
                else
                {
                    $errors[] = 'Нужно выбрать изображение товара';
                }

                if($errors == false)
                {
                    $result = Product::createProduct($options);

                    if($result != false)
                    {
                        $_SESSION['message'] = 'Товар добавлен успешно';
                        header('Location: /admin/product');
                        exit;
                    }

                    $errors[] = 'Запись в БД не удалась';
                }
            }

            require_once ROOT. '/views/admin_product/create.php';
            return true;
        }

        public function actionUpdate($id)
        {
            self::checkAdmin();

            $product = Product::getProductById($id);

            $categories = Category::getCategoryList();

            if($product == false)
            {
                $_SESSION['errors'] = 'Такого товара нет в базе данных';
                header('Location: /admin/product');
                exit;
            }

            $options = $product;

            if(isset($_POST['submit']))
            {

                $options['name']           = $_POST['name'];
                $options['code']           = $_POST['code'];
                $options['price']          = $_POST['price'];
                $options['brand']          = $_POST['brand'];
                $options['category_id']    = $_POST['category'];
                $options['description']    = $_POST['description'];
                $options['availability']   = $_POST['availability'];
                $options['is_new']         = $_POST['is_new'];
                $options['is_recommended'] = $_POST['is_recommended'];
                $options['status']         = $_POST['status'];

                $errors = false;

                if(strlen(trim($options['name'])) < 5)
                {
                    $errors[] = 'Имя должно быть длиннее 4 символов';
                }

                if(trim($options['code']) == '')
                {
                    $errors[] = 'Введите код товара';
                }
                elseif(!preg_match('~[0-9]+~', $options['code']))
                {
                    $errors[] = 'Код товара должен быть числом';
                }

                if(trim($options['brand']) == '')
                {
                    $errors[] = 'Не заполнен производитель';
                }

                if($options['price'] == 0)
                {
                    $errors[] = 'Цена должна быть больше нуля';
                }
                elseif(!preg_match('~^[1-9][0-9]+$~', $options['price']))
                {
                    $errors[] = 'Цена должна быть числом и не должна начинаться с нуля';
                }

                if(strlen($options['description']) < 10)
                {
                    $errors[] = 'Описание товара должно быть длиннее 9 символов';
                }

                if(isset($_FILES['image']) && $_FILES['image']['error'] == 0)
                {
                    if(!preg_match('~image~', $_FILES['image']['type'] ))
                    {
                        $errors[] = 'Файл должен быть картинкой';
                    }
                    elseif(round($_FILES['image']['size'] / 1024) > 4096)
                    {
                        $errors[] = 'Файл должен быть меньше 4096 килобайт';
                    }
                    elseif(is_uploaded_file($_FILES['image']['tmp_name']) && $errors == false)
                    {
                        $name = basename($_FILES['image']['name']);
                        $options['image'] = $name;
                        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/upload/images/products/'. $name);
                    }
                    else
                    {
                        $errors[] = 'Ошибка загрузки';
                    }
                }


                if($errors == false)
                {
                    $result = Product::updateProductById($options);

                    if($result != false)
                    {
                        $_SESSION['message'] = 'Товар обновлен успешно';
                        header('Location: /admin/product');
                        exit;
                    }

                    $errors[] = 'Запись в БД не удалась';
                }
            }

            require_once ROOT. '/views/admin_product/update.php';
            return true;
        }

        public function actionDelete($id)
        {
            self::checkAdmin();

            if(isset($_POST['submit']))
            {
                $result = Product::deleteProductById($id);

                if($result != false)
                {
                    $_SESSION['message'] = 'Удаление прошло успешно';
                }
                else
                {
                    $_SESSION['errors'] = 'Ошибка удаления';
                }

                header('Location: /admin/product');
                exit;
            }


            require_once ROOT. '/views/admin_product/delete.php';
            return true;
        }
    }

?>