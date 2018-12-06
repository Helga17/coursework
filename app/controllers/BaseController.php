<?php

namespace app\controllers;

class BaseController
{
    public function checkAccessToAction(bool $canBeAdmin = false): bool
    {
        return isset($_SESSION['id']) && ($canBeAdmin ? $_SESSION['isAdmin'] : true);
    }

    public function getRequestData() {
        $data = file_get_contents('php://input');
        $requestData = json_decode($data, true);
        return is_null($requestData) ? $data : $requestData;
    }

    function render($actionName, $data = null)
    {
        if (is_array($data)) {
            extract($data);
        }

        $controller = substr(strrchr(static::class, "\\"), 1);
        $controllerName = lcfirst(substr($controller, 0, strpos($controller, 'Controller')));

        $content = './app/views/' . $controllerName . '/' . $actionName . '.php';

        include_once './app/views/partials/page.php';
    }



    function imageValidator($name): bool
    {
        $image_info = getimagesize($name);
        $width = $image_info[0];
        $height = $image_info[1];
        if ($width <= 800 && $width >= 200 && $height <= 800 && $height >= 200) {
            return true;
        }
        return false;
    }
}