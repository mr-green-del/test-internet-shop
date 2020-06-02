<?php

    class CatalogController
    {

        public function actionIndex()
        {

            $categories = Category::getCategoryList();
            $products   = Product::getLatestProducts(15);

            require_once ROOT. '/views/catalog/index.php';

            return true;
        }

        public function actionCategory($categoryId, $pageNumber = 1)
        {
            $pageNumber = ($pageNumber == 0)? 1: $pageNumber;

            $limit = 6;

            $categories = Category::getCategoryList();
            $products   = Product::getLatestProductsByCategory($categoryId, $pageNumber, $limit);
            $total      = Product::getTotalRecordsInDbByCategory($categoryId);


            $Pagination  = new Pagination($pageNumber, $limit, "/category/$categoryId/page-", 5, $total);
            $pagination  = $Pagination->getHtml();

            require_once ROOT. '/views/catalog/category.php';

            return true;
        }

    }

?>