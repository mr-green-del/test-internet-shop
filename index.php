<?php
    @ob_start();
    session_start();


    function debug($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
    }

    ini_set('display_errors', 1);
    error_reporting(E_ALL);


    define('ROOT', dirname(__FILE__));

    require_once ROOT. '/components/Autoload.php';


    $router = new Router();
    $router->run();









?>