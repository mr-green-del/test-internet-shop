<?php

    class CabinetController
    {

        public function actionIndex()
        {
            $userId = User::checkLogged();
            $user   = User::getUserById($userId);

            $adminButton = false;

            if($user['role'] == "admin")
            {
                $adminButton = true;
            }

            require_once ROOT. '/views/cabinet/index.php';
            return true;
        }

        public function actionEdit()
        {
            $userId = User::checkLogged();
            $user   = User::getUserById($userId);

            $adminButton = false;

            if($user['role'] == "admin")
            {
                $adminButton = true;
            }

            $name        = $user['name'];
            $email       = $user['email'];
            $oldPassword = '';
            $newPassword = '';

            $result      = false;

            if(isset($_POST['submit']))
            {
                $name         = (isset($_POST['name'])) ? $_POST['name'] : $name;
                $email        = (isset($_POST['email']))? $_POST['email']: $email;
                $newPassword  = $_POST['new_password'];
                $oldPassword  = $_POST['old_password'];

                $errors       = false;



                if($oldPassword != $user['password'])
                {
                    $errors[] = 'Старый пароль введен неверно.';
                }

                if($newPassword != '')
                {
                    if(User::checkPassword($newPassword) == false)
                    {
                        $errors[] = 'Пароль должен быть длиннее 8 символов.';
                    }
                }

                if(User::checkEmail($email) == false)
                {
                    $errors[] = 'Неверный почтовый адрес.';
                }

                if(User::checkName($name) == false)
                {
                    $errors[] = 'Имя должно быть длиннее двух символов.';
                }

                if($email != $user['email'])
                {
                    if(User::checkEmailExist($email))
                    {
                        $errors[] = 'Такой почтовый адрес уже существует.';
                    }
                }

                if($errors == false)
                {
                    $password    = ($newPassword == '')? $oldPassword: $newPassword;
                    $result      = User::update($name, $email, $password, $userId);

                    $newPassword = '';
                }

            }

            require_once ROOT. '/views/cabinet/edit.php';

            return true;
        }

        public function actionOrderHistory()
        {
            $userId      = User::checkLogged();
            $user        = User::getUserById($userId);

            $ordersList  = false;
            $ordersList  = Order::getOrdersByUserId($userId);


            $adminButton = false;

            if($user['role'] == "admin")
            {
                $adminButton = true;
            }

            require_once ROOT. '/views/cabinet/order_history.php';

            return true;
        }

    }













?>