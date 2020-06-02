<?php

    class Order
    {

        public static function save($user_name, $user_phone, $user_comment, $products, $user_id = 0)
        {
            $valuesArray = [
                'user_id'      => $user_id,
                'user_name'    => $user_name,
                'user_phone'   => $user_phone,
                'user_comment' => $user_comment,
                'products'     => json_encode($products),
            ];

            $sql = "INSERT INTO product_order (user_name, user_phone, user_comment, products, user_id) ".
                   "VALUES (:user_name, :user_phone, :user_comment, :products, :user_id)";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }

        public static function getOrderList()
        {
            $sql = "SELECT * FROM product_order";

            $result = DB::select_from($sql);

            return $result;
        }

        public static function deleteOrderById($id)
        {
            $valuesArray = [
                'id' => $id
            ];

            $sql = "DELETE FROM product_order WHERE id= :id";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }

        public static function getOrdersByUserId($user_id)
        {
            $valuesArray = [
                'user_id' => $user_id
            ];

            $sql = "SELECT * FROM product_order WHERE user_id= :user_id";

            $result = DB::select_from($sql, $valuesArray, true);

            return $result;
        }

        public static function getOrderById($id, $tableColumns = '*')
        {
            $valuesArray = [
                'id' => $id
            ];

            $sql = "SELECT $tableColumns FROM product_order WHERE id= :id";

            $result = DB::select_from($sql, $valuesArray);

            return $result;
        }

        public static function updateOrderById($id, $options)
        {
            debug($options);
            $valuesArray       = $options;
            $valuesArray['id'] = $id;

            $sql = "UPDATE product_order SET user_name= :user_name, user_phone= :user_phone, ".
                   "user_comment= :user_comment, date= :date, status= :status WHERE id= :id";

            $result = DB::insert_into($sql, $valuesArray);

            return $result;
        }

        /**
         * В зависимости от статуса возвращаем разные значения
         *
         * @param $status - номер статуса
         * @return string
         */
        public static function getStatusText($status)
        {
            switch($status)
            {
                case '1':
                    return 'Новый заказ';
                    break;
                case '2':
                    return 'В обработке';
                    break;
                case '3':
                    return 'Доставляется';
                    break;
                case '4':
                    return 'Закрыт';
                    break;
            }
        }
    }

?>