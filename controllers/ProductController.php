<?php

    class ProductController
    {

        public function actionView($productId)
        {

            $categories  = Category::getCategoryList();
            $productItem = Product::getProductById($productId);


            require_once ROOT. '/views/product/view.php';

            return true;
        }
    }

?>