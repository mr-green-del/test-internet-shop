<?php

    class User
    {

        public static function register($name, $email, $password)
        {
            $valuesArray = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ];

            $sql = "INSERT INTO user(name, email, password) VALUES (:name, :email, :password)";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }

        public static function update($name, $email, $password, $userId)
        {
            $valuesArray = [
                'id'       => $userId,
                'name'     => $name,
                'email'    => $email,
                'password' => $password,
            ];

            $sql = "UPDATE user SET name= :name, email= :email, password= :password WHERE id= :id";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }

        public static function checkName($name)
        {
            if(strlen($name) >= 2)
            {
                return true;
            }

            return false;
        }

        public static function checkEmail($email)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                return true;
            }

            return false;
        }

        public static function checkPassword($password)
        {
            if(strlen($password) >= 8)
            {
                return true;
            }

            return false;
        }

        public static function checkEmailExist($email)
        {
            $valuesArray = [
                'email' => $email,
            ];

            $sql = "SELECT email FROM user WHERE email= :email";

            $result = DB::select_from($sql, $valuesArray);

            return $result;
        }

        public static function checkUserData($password, $email)
        {

            $valuesArray = [
                'email'    => $email,
                'password' => $password,
            ];

            $sql = "SELECT * FROM user WHERE email= :email AND password = :password";

            $result = DB::select_from($sql, $valuesArray);

            if($result != [])
            {
                return $result['id'];
            }

            return false;
        }

        public static function checkNumber($number)
        {
            $numberPattern = '~^[+][7][0-9]{10}$~';
            if(preg_match($numberPattern, $number))
            {
                return true;
            }

            return false;
        }

        public static function checkLogged()
        {
            if(!empty($_SESSION['user']))
            {
                return $_SESSION['user'];
            }

            $_SESSION['error'] = "Нужно войти в свой аккаунт";
            header("Location: /user/login");
            exit;
        }

        public static function getUserById($userId)
        {
            $valuesArray = [
                'id' => $userId,
            ];

            $sql = "SELECT * FROM user WHERE id= :id";

            $result = DB::select_from($sql, $valuesArray);

            return $result;
        }

        public static function auth($userId)
        {
            $_SESSION['user'] = $userId;
        }










    }

?>