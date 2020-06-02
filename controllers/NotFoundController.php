<?php

    require_once ROOT. "/models/Category.php";

    class NotFoundController
    {
        public  function actionNotFound()
        {
            $categories = Category::getCategoryList();

            require_once ROOT. "/views/404/index.php";

            return true;
        }
    }

?>