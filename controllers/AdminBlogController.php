<?php

    class AdminBlogController extends AdminBase
    {

        public function actionIndex()
        {
            self::checkAdmin();

            $blogItems = Blog::getBlogItemsList();

            require_once ROOT. '/views/admin_blog/index.php';
            return true;
        }

        public function actionDelete($id)
        {
            self::checkAdmin();

            if(isset($_POST['submit']))
            {
                $result = Blog::deleteBlogItemById($id);

                if($result != false)
                {
                    $_SESSION['message'] = 'Удаление успешно';
                }
                else
                {
                    $_SESSION['errors'] = 'Удаление не удалось';
                }

                header('Location: /admin/blog');
                exit;
            }

            require_once ROOT. '/views/admin_blog/delete.php';
            return true;
        }

        public function actionCreate()
        {
            self::checkAdmin();

            $options['name']           = '';
            $options['text']           = '';
            $options['status']         = '';

            if(isset($_POST['submit']))
            {

                $options['name']           = $_POST['name'];
                $options['text']           = $_POST['text'];
                $options['status']         = $_POST['status'];

                $errors = false;

                if(strlen(trim($options['name'])) <= 5)
                {
                    $errors[] = 'Заголовок должен быть длиннее 5 символов';
                }

                if(trim($options['text']) == '')
                {
                    $errors[] = 'Введите текст записи';
                }
                elseif(strlen(trim($options['text'])) <= 50)
                {
                    $errors[] = 'Текст должен быть длинне 50 символов';
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
                        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/upload/images/blog/'. $name);
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
                    $result = Blog::createBlogItem($options);

                    if($result != false)
                    {
                        $_SESSION['message'] = 'Запись добавлена успешно';
                        header('Location: /admin/blog');
                        exit;
                    }

                    $errors[] = 'Запись в БД не удалась';
                }
            }


            require_once ROOT. '/views/admin_blog/create.php';
            return true;
        }

        public function actionUpdate($id)
        {
            self::checkAdmin();

            $options = Blog::getBlogItemById($id, "id, name, text, status, image, date");

            if($options == false)
            {
                $_SESSION['errors'] = 'Такой записи нет в таблице';
                header('Location: /admin/blog');
                exit;
            }

            if(isset($_POST['submit']))
            {

                $options['name']           = $_POST['name'];
                $options['text']           = $_POST['text'];
                $options['date']           = $_POST['date'];
                $options['status']         = $_POST['status'];

                $errors = false;

                if(strlen(trim($options['name'])) <= 5)
                {
                    $errors[] = 'Заголовок должен быть длиннее 5 символов';
                }

                if(trim($options['text']) == '')
                {
                    $errors[] = 'Введите текст записи';
                }
                elseif(strlen(trim($options['text'])) <= 50)
                {
                    $errors[] = 'Текст должен быть длинне 50 символов';
                }

                if(trim($options['date']) == '')
                {
                    $errors[] = 'Введите дату';
                }
                elseif(!preg_match('~^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$~', $options['date']))
                {
                    $errors[] = 'Формат даты введен неправильно, вот пример правильного формата г-м-д ч:м:с';
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
                        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/upload/images/blog/'. $name);
                    }
                    else
                    {
                        $errors[] = 'Ошибка загрузки';
                    }
                }


                if($errors == false)
                {
                    $result = Blog::updateBlogItemById($options);

                    if($result != false)
                    {
                        $_SESSION['message'] = 'Запись обновлена успешно';
                        header('Location: /admin/blog');
                        exit;
                    }

                    $errors[] = 'Запись в БД не удалась';
                }
            }


            require_once ROOT. '/views/admin_blog/update.php';
            return true;
        }
    }

?>