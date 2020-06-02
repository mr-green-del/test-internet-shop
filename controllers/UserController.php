<?php

    class UserController
    {

        public function actionLogout()
        {
            unset($_SESSION['user']);
            header("Location: /user/login/");
            exit;
        }

        public function actionLogin()
        {
            $email    = '';
            $password = '';
            $errors   = false;

            if(!empty($_SESSION['error']))
            {
                $errors [] = $_SESSION['error'];
                unset($_SESSION['error']);
            }

            if(isset($_POST['submit']))
            {
                $email    = $_POST['email'];
                $password = $_POST['password'];

                $userId   = User::checkUserData($password, $email);


                if($userId == false)
                {
                    $errors[] = 'Неверный логин или пароль';
                }

                if($errors == false)
                {
                    User::auth($userId);
                    header("Location: /cabinet/");
                    unset($_SESSION['error']);
                    exit;
                }
            }

            require_once ROOT. '/views/user/login.php';

            return true;
        }

        public function actionRegister()
        {
            $name        = '';
            $email       = '';
            $password    = '';

            $result      = false;

            if(isset($_POST['submit']))
            {
                $name     = $_POST['name'];
                $email    = $_POST['email'];
                $password = $_POST['password'];

                $errors   = false;

                if(!User::checkName($name))
                {
                    $errors[] = 'Имя должно быть длиннее двух символов.';
                }

                if(!User::checkEmail($email))
                {
                    $errors[] = 'Неверный почтовый адрес.';
                }

                if(!User::checkPassword($password))
                {
                    $errors[] = 'Пароль должен быть длинне 8 символов.';
                }

                if(User::checkEmailExist($email))
                {
                    $errors[] = 'Такой почтовый адрес уже существует.';
                }

                if($errors == false)
                {
                    $result   = User::register($name, $email, $password);

                    $name     = '';
                    $email    = '';
                    $password = '';
                }
            }

            require_once ROOT. '/views/user/register.php';

            return true;
        }

    }

?>