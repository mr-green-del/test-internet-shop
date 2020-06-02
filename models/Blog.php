<?php

    /**
     * Класс для взаимодействия с данными записей блога
     */
    class Blog
    {
        // Кол-во отображаемых записей по умолчанию
        const SHOW_BY_DEFAULT = 10;

        /**
         * Функция для получения определенного кол-ва последних записей
         *
         * @param $pageId - текущая страница
         * @param int $count - кол-во отображаемых записей
         * @return array
         */
        public static function getLatestBlogItemsList($pageId, $count = self::SHOW_BY_DEFAULT)
        {
            $id = ($pageId - 1) * $count;

            $valuesArray = [
                'count' => $count,
                'id'    => $id,
            ];

            $sql = "SELECT * FROM blog ORDER BY id DESC LIMIT :count OFFSET :id";

            $blogItems = DB::select_from($sql, $valuesArray, true);

            return $blogItems;
        }

        /**
         * Функция для получения записи по идентификатору
         *
         * @param $id - id записи
         * @param string $tableRows - название таблиц в БД
         * @return array
         */
        public static function getBlogItemById($id, $tableRows = '*')
        {
            $valuesArray = [
                'id' => $id,
            ];

            $sql = "SELECT $tableRows FROM blog WHERE id= :id";

            $blogItem = DB::select_from($sql, $valuesArray);

            return $blogItem;
        }

        /**
         * Функция для подсчета кол-ва записей в БД
         *
         * @return mixed
         */
        public static function getTotalRecordsInDb()
        {
            $sql = "SELECT COUNT(*) FROM blog";

            $total = DB::select_from($sql)['COUNT(*)'];

            return $total;
        }

        /**
         * Функция для получения всех записей из БД
         *
         * @return array
         */
        public static function getBlogItemsList()
        {
            $sql = "SELECT * FROM blog";

            $result = DB::select_from($sql, [], true);

            return $result;
        }

        /**
         * Функция для удаления записи из БД
         *
         * @param $id - id записи
         * @return bool
         */
        public static function deleteBlogItemById($id)
        {
            $valuesArray = [
                'id' => $id,
            ];

            $sql = "DELETE FROM blog WHERE id= :id";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }

        /**
         * Функция для обновления записи в БД
         *
         * @param $options - массив с ключами совпадающими с названиями изменяемых столбцов,
         *                   должен содержать ключ id с идентификатором записи
         * @return bool
         */
        public static function updateBlogItemById($options)
        {
            $valuesArray = $options;

            $sql = "UPDATE blog SET name= :name, image= :image, text= :text, ".
                   "status= :status, date= :date WHERE id= :id";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }

        /**
         * Функция для создания записи в БД
         *
         * @param $options - массив с ключами совпадающими с названиями столбцов в БД
         * @return bool
         */
        public static function createBlogItem($options)
        {
            $valuesArray = $options;

            $sql = "INSERT INTO blog (name, image, text, status) VALUES (:name, :image, :text, :status)";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }

    }

?>