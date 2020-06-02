<?php

    class SiteController
    {

        public function actionIndex()
        {

            $categories          = Category::getCategoryList();
            $products            = Product::getLatestProducts(9);
            $recommendedProducts = Product::getRecommendedProducts();

            require_once ROOT. '/views/site/index.php';

            return true;
        }

        public function actionContact()
        {
            $email   = '';
            $message = '';

            $result  = false;

            if(isset($_POST['submit']))
            {
                $email   = $_POST['email'];
                $message = $_POST['message'];

                $errors  = false;

                if(User::checkEmail($email) == false)
                {
                    $errors[] = 'Неверный почтовый адрес.';
                }

                if(trim($message) == '')
                {
                    $errors[] = 'Нельзя отправить пустое письмо.';
                }

                if($errors == false)
                {
                    $result  = true;

                    $email   = '';
                    $message = '';
                }
            }


            require_once ROOT. '/views/site/contact.php';

            return true;
        }

        public function actionAbout()
        {
            $categories = Category::getCategoryList();

            require_once ROOT. '/views/site/about.php';
            return true;
        }

    }

?>