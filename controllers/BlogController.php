<?php

    class BlogController
    {

        public function actionIndex($pageNumber = 1)
        {
            $limit = 4;

            $categories = Category::getCategoryList();
            $blogItems  = Blog::getLatestBlogItemsList($pageNumber, $limit);
            $total      = Blog::getTotalRecordsInDb();

            $Pagination = new Pagination($pageNumber, $limit, "/blog/page-",5, $total);
            $pagination = $Pagination->getHtml();

            require_once ROOT. '/views/blog/index.php';
            return true;
        }

        public function actionView($id)
        {
            $categories = Category::getCategoryList();
            $blogItem   = Blog::getBlogItemById($id);

            require_once ROOT. '/views/blog/view.php';
            return true;
        }
    }

?>