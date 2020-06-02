<?php

    class Category
    {

        /**
         * Функция для получения списка категорий из БД
         * категории сортируются по столбцу sort_order
         *
         * @return array
         */
        public static function getCategoryList()
        {
            $sql = "SELECT * FROM category ORDER BY sort_order ASC";

            $categoryList = DB::select_from($sql, [], true);

            return $categoryList;
        }

        /**
         * Функция для получения категории по идентификатору
         *
         * @param $id - id категории
         * @return array
         */
        public static function getCategoryById($id)
        {
            $valuesArray = [
                'id' => $id,
            ];

            $sql = "SELECT * FROM category WHERE id= :id";

            $result = DB::select_from($sql, $valuesArray);

            return $result;
        }

        /**
         * Функция для обновления информации о категории
         *
         * @param $options - массив с новыми данными для обновления,
         *                   ключи в этом массиве должны совпадать с изменяемыми столбцами в БД
         *                   и он обязательно должен содержать ключ id с идентификатором категории.
         * @return bool
         */
        public static function updateCategory($options)
        {
            $valuesArray = $options;

            $sql = "UPDATE category SET name= :name, sort_order= :sort_order, status= :status WHERE id= :id";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }

        /**
         * Функция для удаления категории
         *
         * @param $id - идентификатор категории
         * @return bool
         */
        public static function deleteCategoryById($id)
        {
            $valuesArray = [
                'id' => $id,
            ];

            $sql = "DELETE FROM category WHERE id= :id";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }

        /**
         * Функция для создания категории
         *
         * @param $options - массив с данными для создания категории,
         *                   ключи в этом массиве должны совпадать с добавляемыми столбцами в БД.
         * @return bool
         */
        public static function createCategory($options)
        {
            $valuesArray = $options;

            $sql = "INSERT INTO category (name, sort_order, status) VALUES (:name, :sort_order, :status)";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }

    }

?>