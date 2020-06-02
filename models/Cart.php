<?php

    class Cart
    {

        public static function deleteProduct($id)
        {
            $id = intval($id);

            $productCart = [];

            if(isset($_SESSION['products']))
            {
                $productCart = $_SESSION['products'];
            }

            if(array_key_exists($id, $productCart))
            {
                unset($productCart[$id]);
            }

            $_SESSION['products'] = $productCart;

            return self::countItems();
        }

        public static function addProduct($id)
        {

            $id = intval($id);

            $productCart = [];

            if(isset($_SESSION['products']))
            {
                $productCart = $_SESSION['products'];
            }

            if(array_key_exists($id, $productCart))
            {
                $productCart[$id] += 1;
            }
            else
            {
                $productCart[$id]  = 1;
            }

            $_SESSION['products'] = $productCart;

            return self::countItems();
        }

        public static function getTotalPrice($products)
        {
            $productsInCart = self::getProducts();

            $totalPrice     = 0;
            foreach($products as $product)
            {
                $totalPrice += $product['price'] * $productsInCart[$product['id']];
            }


            return $totalPrice;
        }

        public static function getProducts()
        {
            if(isset($_SESSION['products']))
            {
                return $_SESSION['products'];
            }

            return false;
        }

        public static function deleteCheckedProductsFromCart($products)
        {
            $_SESSION['products'] = array_diff_key($_SESSION['products'],$products);
        }

        public static function getCheckedProductsByIds($Ids)
        {
            if(isset($_SESSION['products']))
            {
                $products = array_intersect_key($_SESSION['products'], $Ids);
                return $products;
            }

            return false;
        }

        public static function countItems($products = false)
        {
            if($products != false)
            {
                /*
                 * Если передан массив товаров, то подсчитываем кол-во товаров в нем,
                 * а не в сессии
                 */
                $count = 0;
                foreach($products as $id => $quantity)
                {
                    $count += $quantity;
                }
                return $count;
            }

            if(isset($_SESSION['products']))
            {
                $count = 0;
                foreach($_SESSION['products'] as $id => $quantity)
                {
                    $count += $quantity;
                }
                return $count;
            }
            else
            {
                return 0;
            }
        }

    }




?>