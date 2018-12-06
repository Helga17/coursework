<?php

use app\components\Router;

spl_autoload_register(function ($class) {
    $file ='./' . str_replace('\\', '/', $class).'.php';
    if (file_exists($file)) {
       require_once $file;
    }
});

$router = new Router();
$router->run();
