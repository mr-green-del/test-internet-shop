<?php

    class CartController
    {

        public function actionIndex()
        {
            $categories     = Category::getCategoryList();

            $productsInCart = false;
            $productsInCart = Cart::getProducts();
            $totalPrice     = 0;

            if($productsInCart != false)
            {
                $productIds      = array_keys($productsInCart);
                $products        = Product::getProductsByIds($productIds);

                $totalPrice      = Cart::getTotalPrice($products);
                $productQuantity = Cart::countItems();
            }

            require_once ROOT. '/views/cart/index.php';
            return true;
        }

        public function actionDeleteAjax($productId)
        {
            $requestAnswersArray['cart-count'] = Cart::deleteProduct($productId);
            $categories                        = Category::getCategoryList();

            $productsInCart                    = false;
            $productsInCart                    = Cart::getProducts();
            $totalPrice                        = 0;

            if($productsInCart != false)
            {
                $productIds = array_keys($productsInCart);
                $products   = Product::getProductsByIds($productIds);

                $totalPrice = Cart::getTotalPrice($products);
            }
            else
            {
                $requestAnswersArray['tableWithProducts'] = "Корзина пуста";
            }

            $requestAnswersArray['totalPrice'] = $totalPrice;

            echo json_encode($requestAnswersArray);
            return true;
        }

        public function actionAddAjax($productId)
        {
            $requestAnswersArray['cart-count'] = Cart::addProduct($productId);

            echo json_encode($requestAnswersArray);
            return true;
        }

        public function actionCheckout()
        {
            if(!isset($_POST['checked']) && !isset($_POST['submit']))
            {
                $_SESSION['errors'] = 'Вы не выбрали ни одного товара';
                header("Location: /cart/");
                exit;
            }


            $categories = Category::getCategoryList();

            $productsInCart = false;
            $productsInCart = Cart::getProducts();
            $totalPrice     = 0;

            if($productsInCart != false)
            {
                $productIds       = array_keys(array_flip($_POST['checked']));
                $products         = Product::getProductsByIds($productIds);

                $totalPrice       = Cart::getTotalPrice($products);
                $checkedProducts  = Cart::getCheckedProductsByIds(array_flip($_POST['checked']));
                $productsQuantity = Cart::countItems($checkedProducts);

            }
            else
            {
                $_SESSION['errors'] = 'Вы не можете оформить заказ т.к корзина пуста';
                header("Location: /");
                exit;
            }


            $result  = false;

            $user_id = (isset($_SESSION['user']))? $_SESSION['user']: 0;
            $name    = (isset($_SESSION['user']))? User::getUserById($_SESSION['user'])['name']: '';
            $number  = '';
            $message = '';

            if(isset($_POST['submit']))
            {
                $name    = $_POST['name'];
                $number  = $_POST['number'];
                $message = $_POST['message'];

                $errors  = false;

                if(User::checkName($name) == false)
                {
                    $errors[] = 'Имя должно быть длиннее двух символов';
                }

                if(trim($number) != '')
                {
                    if(User::checkNumber($number) == false)
                    {
                        $errors[] = 'Номер введен неправильно';
                    }
                }
                else
                {
                    $errors[] = 'Введите номер';
                }

                if($errors == false)
                {
                    $result = Order::save($name, $number, $message, $checkedProducts, $user_id);
                    Cart::deleteCheckedProductsFromCart($checkedProducts);
                    $_SESSION['message'] = 'Заказ оформлен, мы с вами свяжемся';
                    header("Location: /cart/");
                    exit;
                }
            }

            require_once ROOT. '/views/cart/checkout.php';
            return true;
        }

    }

?>