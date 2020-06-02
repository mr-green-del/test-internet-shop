<?php

    class AdminOrderController extends AdminBase
    {

        public function actionIndex()
        {
            self::checkAdmin();

            $ordersList = Order::getOrderList();

            require_once ROOT. '/views/admin_order/index.php';
            return true;
        }

        public function actionUpdate($id)
        {
            self::checkAdmin();

            $options = Order::getOrderById($id, "id, user_name, user_phone, user_comment, date, status");

            if(isset($_POST['submit']))
            {
                $options['user_name']    = $_POST['user_name'];
                $options['user_phone']   = $_POST['user_phone'];
                $options['user_comment'] = $_POST['user_comment'];
                $options['date']         = $_POST['date'];
                $options['status']       = $_POST['status'];

                $errors = false;

                if(strlen(trim($options['user_name'])) < 2)
                {
                    $errors[] = 'Имя должно быть длиннее 2 символов';
                }


                if(trim($options['user_phone']) == '')
                {
                    $errors[] = 'Введите номер';
                }
                elseif(!preg_match('~^[+][7][0-9]{10}$~', $options['user_phone']))
                {
                    $errors[] = 'Номер введен неправильно';
                }

                if(trim($options['date']) == '')
                {
                    $errors[] = 'Введите дату';
                }
                elseif(!preg_match('~^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$~', $options['date']))
                {
                    $errors[] = 'Формат даты введен неправильно, вот пример правильного формата г-м-д ч:м:с';
                }

                if($errors == false)
                {
                    $result = Order::updateOrderById($id, $options);

                    if($result != false)
                    {
                        $_SESSION['message'] = 'Заказ успешно отредактирован';
                    }
                    else
                    {
                        $_SESSION['errors'] = 'Редактирование не удалось';
                    }

                    header('Location: /admin/order');
                    exit;
                }
            }

            require_once ROOT. '/views/admin_order/update.php';
            return true;
        }

        public function actionDelete($id)
        {
            self::checkAdmin();

            if(isset($_POST['submit']))
            {
                $result = Order::deleteOrderById($id);

                if($result != false)
                {
                    $_SESSION['message'] = 'Удаление прошло успешно';
                }
                else
                {
                    $_SESSION['errors'] = 'Удаление не удалось';
                }

                header('Location: /admin/order');
                exit;
            }

            require_once ROOT. '/views/admin_order/delete.php';
            return true;
        }

        public function actionView($id)
        {
            self::checkAdmin();

            $order           = Order::getOrderById($id);
            $productQuantity = json_decode($order['products'], true);
            $productIds      = array_keys($productQuantity);
            $products        = Product::getProductsByIds($productIds);

            require_once ROOT. '/views/admin_order/view.php';
            return true;
        }
    }

?>