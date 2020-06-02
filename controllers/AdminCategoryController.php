<?php

    class AdminCategoryController extends AdminBase
    {

        public static function actionIndex()
        {
            self::checkAdmin();

            $categories = Category::getCategoryList();

            require_once ROOT. '/views/admin_category/index.php';
            return true;
        }

        public static function actionCreate()
        {
            self::checkAdmin();

            $options['name']       = '';
            $options['sort_order'] = '';
            $options['status']     = '';

            if(isset($_POST['submit']))
            {
                $options['name']       = $_POST['name'];
                $options['sort_order'] = $_POST['sort_order'];
                $options['status']     = $_POST['status'];

                $errors = false;

                if(strlen(trim($options['name'])) < 3)
                {
                    $errors[] = 'Имя должно быть длиннее 3 символов';
                }


                if(trim($options['sort_order']) == '')
                {
                    $errors[] = 'Введите порядок сортировки';
                }
                elseif(!preg_match('~^[0-9]+$~', $options['sort_order']))
                {
                    $errors[] = 'Порядок сортировки должен быть задан числом';
                }


                if($errors == false)
                {
                    $result = Category::createCategory($options);

                    if($result != false)
                    {
                        $_SESSION['message'] = 'Категория успешно создана';
                    }
                    else
                    {
                        $_SESSION['errors'] = 'Создание не удалось';
                    }

                    header('Location: /admin/category');
                    exit;
                }
            }

            require_once ROOT. '/views/admin_category/create.php';
            return true;
        }

        public static function actionUpdate($id)
        {
            self::checkAdmin();

            $options = Category::getCategoryById($id);

            if(isset($_POST['submit']))
            {
                $options['name']       = $_POST['name'];
                $options['sort_order'] = $_POST['sort_order'];
                $options['status']     = $_POST['status'];

                $errors = false;

                if(strlen(trim($options['name'])) < 3)
                {
                    $errors[] = 'Имя должно быть длиннее 3 символов';
                }


                if(trim($options['sort_order']) == '')
                {
                    $errors[] = 'Введите порядок сортировки';
                }
                elseif(!preg_match('~^[0-9]+$~', $options['sort_order']))
                {
                    $errors[] = 'Порядок сортировки должен быть задан числом';
                }


                if($errors == false)
                {
                    $result = Category::updateCategory($options);

                    if($result != false)
                    {
                        $_SESSION['message'] = 'Категория успешно обновлена';
                    }
                    else
                    {
                        $_SESSION['errors'] = 'Обновление не удалось';
                    }

                    header('Location: /admin/category');
                    exit;
                }
            }

            require_once ROOT. '/views/admin_category/update.php';
            return true;
        }

        public static function actionDelete($id)
        {
            self::checkAdmin();

            if(isset($_POST['submit']))
            {
                $result = Category::deleteCategoryById($id);

                if($result != false)
                {
                    $_SESSION['message'] = 'Удаление успешно';
                }
                else
                {
                    $_SESSION['errors'] = 'Удаление не удалось';
                }

                header('Location: /admin/category');
                exit;
            }

            require_once ROOT. '/views/admin_category/delete.php';
            return true;
        }
    }

?>