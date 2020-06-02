<?php

    /**
     * Функция автозагрузки для классов
     *
     * @param string $class_name - имя подгружаемого класса
     */
    function autoload($class_name)
    {
        // Директории для поиска подгружаемых классов
        $array_path = [
            '/models/',
            '/components/',
        ];

        foreach($array_path as $path)
        {
            $path = ROOT. $path . $class_name . '.php';
            if(is_file($path))
            {
                include_once $path;
            }
        }
    }

    spl_autoload_register('autoload');

?>