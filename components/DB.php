<?php

    /**
     * Класс для работы с базой данных
     */
    class DB
    {
        private static $connectDB;


        /**
         * Функция для подключения к БД,
         * все параметры подключения указаны в файле db-params.php в директории config
         */
        public static function getConnection()
        {
            // Файл с параметрами подключения
            $db = include(ROOT.'/config/db-params.php');

            $host    = $db['host'];
            $user    = $db['user'];
            $pass    = $db['pass'];
            $dbName  = $db['dbName'];
            $charset = $db['charset'];


            // Запрос для подключения к БД с помощью PDO
            $dsn = "mysql:host=$host;dbname=$dbName;charset=$charset";

            // Настройки для PDO
            $opt =
            [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            //Проверка на существующее подключение
            if(self::$connectDB == false)
            {
                //Если не подключено, то пробуем подключить и ловим возможные ошибки
                try
                {
                    // Записываем в переменную класса ссылку на обьект PDO
                    self::$connectDB = new PDO($dsn, $user, $pass, $opt);
                }
                catch (PDOException $e)
                {
                    // Если подключение не удалось, выводим ошибку и останавливаем программу
                    echo "<br> <b>Error: $e->getMessage()</b> <br>";
                    die();
                }
            }

            // Возвращаем результат подключения
            return self::$connectDB;
        }

        /**
         * функция для операций INSERT, UPDATE, DELETE
         * создана что бы спрятать весь код связанный с работой PDO
         *
         * @param string $sql - SQL запрос к базе данных
         *        array  $valuesArray - параметры для вставки в SQL код
         * @return bool true в случае успеха
         */
        public static function insert_into($sql, $valuesArray = [])
        {
            $db = self::getConnection();

            $result         = $db->prepare($sql);
            $request_result = $result->execute($valuesArray);

            return $request_result;
        }

        /**
         * функция для операции SELECT
         * создана что бы спрятать весь код связанный с работой PDO
         *
         * @param string $sql - SQL запрос к базе данных
         *        array  $valuesArray - параметры для вставки в SQL код
         *        bool   $list - параметр влияющий на тип возвращаемого массива
         *               когда возвращается одна строка из БД,
         *               если $list = true, то $array[0] = array($key => $value)
         *               иначе $array = array($key => $value).
         *               по умолчанию $list = false
         *
         * @return array в случае успеха
         */
        public static function select_from($sql, $valuesArray = [], $list = false)
        {
            $resultArray = [];

            $db = self::getConnection();

            $result = $db->prepare($sql);
            $result->execute($valuesArray);

            $i = 0;
            foreach ($result as $row)
            {
                foreach ($row as $key => $item)
                {
                    $resultArray[$i][$key] = $item;
                }
                $i++;
            }

            if(count($resultArray) == 1 && $list == false)
            {
                return $resultArray[0];
            }

            return $resultArray;
        }

    }














?>