<?php

    class Product
    {

        const SHOW_BY_DEFAULT = 10;

        public static function getRecommendedProducts()
        {

            $sql = "SELECT id, name, price, image, is_new FROM product WHERE is_recommended='1'";

            $productsList = DB::select_from($sql, [], true);

            return $productsList;
        }

        public static function getProductsByIds($productIds)
        {
            $products = [];

            foreach($productIds as $num => $id)
            {
                $products[] = self::getProductById($id, "id, name, code, price");
            }

            return $products;
        }

        public static function getProductById($productId, $tableColumns = '*')
        {
            $valuesArray = [
                'productId' => $productId,
            ];

            $sql = "SELECT $tableColumns FROM product WHERE id= :productId";

            $productsList = DB::select_from($sql, $valuesArray);

            return $productsList;
        }

        public static function getProductsList($pageId, $count = self::SHOW_BY_DEFAULT)
        {
            $id = ($pageId - 1) * $count;

            $valuesArray = [
                'count'       => $count,
                'id'          => $id,
            ];

            $sql = "SELECT * FROM product ORDER BY id DESC LIMIT :count OFFSET :id";

            $productsList = DB::select_from($sql, $valuesArray, true);

            return $productsList;
        }

        public static function getTotalRecordsInDb()
        {
            $sql = "SELECT COUNT(*) FROM product";

            $total = DB::select_from($sql)['COUNT(*)'];

            return $total;
        }

        public static function getTotalRecordsInDbByCategory($categoryId)
        {
            $valuesArray = [
                'category_id' => $categoryId,
            ];

            $sql = "SELECT COUNT(*) FROM product WHERE category_id= :category_id";

            $total = DB::select_from($sql, $valuesArray)['COUNT(*)'];

            return $total;
        }

        public static function getLatestProductsByCategory($categoryId, $pageId, $count = self::SHOW_BY_DEFAULT)
        {
            $id = ($pageId - 1) * $count;

            $valuesArray = [
                'category_id' => $categoryId,
                'count'       => $count,
                'id'          => $id,
            ];

            $sql = "SELECT id, name, price, image, is_new FROM product ".
                   "WHERE category_id= :category_id ORDER BY id DESC LIMIT :count OFFSET :id";

            $productsList = DB::select_from($sql, $valuesArray, true);

            return $productsList;
        }

        public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
        {

            $sql = "SELECT id, name, price, image, is_new FROM product ORDER BY id DESC LIMIT $count";

            $productsList = DB::select_from($sql, [], true);

            return $productsList;
        }

        public static function deleteProductById($id)
        {
            $valuesArray = [
                'id' => $id,
            ];

            $sql = "DELETE FROM product WHERE id= :id";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }

        public static function createProduct($options)
        {
            $valuesArray = $options;

            $sql  = "INSERT INTO product (name, code, price, image, category_id, brand, availability, ".
                   "description, is_new, is_recommended, status) ".
                   "VALUES (:name, :code, :price, :image, :category_id, :brand, :availability, ".
                   ":description, :is_new, :is_recommended, :status)";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }

        public static function updateProductById($options)
        {
            $valuesArray = $options;

            $sql = "UPDATE product SET name= :name, code= :code, price= :price, image= :image, ".
                   "category_id= :category_id, brand= :brand, availability= :availability, ".
                   "description= :description, is_new= :is_new, is_recommended= :is_recommended, status= :status ".
                   "WHERE id= :id";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }
    }

?>