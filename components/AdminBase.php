<?php

    /**
     * Родительский класс всех контроллеров начинающихся с Admin
     *
     * @package components
     * @category Admin
     */
    abstract class AdminBase
    {

        /**
         * Метод, который проверяет есть ли у пользователя права администратора
         * @return boolean
         */
        public static function checkAdmin()
        {

            $userId = User::checkLogged();

            $user = User::getUserById($userId);

            if($user['role'] != "admin")
            {
                $_SESSION['errors'] = 'Нет прав доступа';
                header("Location: /cabinet/");
                exit;
            }

            return true;
        }
    }

?>