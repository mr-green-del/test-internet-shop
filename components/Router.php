<?php

    /**
     * Класс маршрутизации запросов
     */
    class Router
    {
        private $routes;

        public function __construct()
        {
            $routesPath   = ROOT. '/config/routes.php';
            //Получаем существующие запросы из файла с запросами
            $this->routes = include ($routesPath);
        }


        public function run()
        {
            //получение строки запроса
            $uri = $this->getURI();

            //проверить наличие такого запроса
            $controller       = $this->checkUriRequest($uri);

            //Определить контроллер и action
            $controllerName   = $controller['name'];
            $controllerAction = $controller['action'];
            $controllerFile   = ROOT. '/controllers/'.$controllerName.'.php';


            //подключить файл контроллера
            $this->connectController($controllerFile);



            //создать обьект и вызвать метод
            $controllerObject = new $controllerName();

            $result = call_user_func_array(array($controllerObject, $controllerAction), $controller['params']);

        }

        /**
         * Функция для проверки существования файла контроллера
         *
         * @param $fileName - имя контроллера
         */
        private function connectController($fileName)
        {
            if(file_exists($fileName))
            {
                require_once $fileName;
            }
        }

        /**
         * @param $uri - запрос из адресной строки
         * @return array - массив с именем контроллера и его метода,
         * а также с параметрами для него
         */
        private function checkUriRequest($uri)
        {
            $controller = [];


            foreach($this->routes as $uriPattern => $path)
            {
                $uri = trim($uri, '/');


                //ищем совпадение с существующими запросами
                if (preg_match("~^$uriPattern$~", $uri))
                {
                    $internalRoute = trim(preg_replace("~^$uriPattern$~", $path, $uri), '/');
                    $segments      = explode('/', $internalRoute);


                    $controller['name']   = ucfirst(array_shift($segments) . 'Controller');
                    $controller['action'] = 'action' . ucfirst(array_shift($segments));
                    $controller['params'] = $segments;

                    return $controller;
                }
            }

            $controller['name']   = 'NotFoundController';
            $controller['action'] = 'actionNotFound';
            $controller['params'] = [];

            return $controller;
        }

        /**
         * Функция для получения запроса из адресной строки
         *
         * @return string - запрос из адресной строки
         */
        private function getURI()
        {
            if(!empty($_SERVER['REQUEST_URI']))
            {
                return trim($_SERVER['REQUEST_URI']);
            }
        }

    }

?>