<?php

namespace app\components;

class Router
{
    private $routes;
    const BASE_URL = 'http://zombie.loc/';

    public function __construct()
    {
        $routesPath = './app/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        return null;
    }

    public static function redirect(string $controller = null, $action = null, array $params = [])
    {
        $url = self::BASE_URL;

        if ($controller) {
            $url .= $controller;
        }
        if ($action) {
            $url .= '/' . $action;
        }

        header("Location:" . $url);
    }

    public static function getUrl(string $controller = null, $action = null, array $params = [])
    {
        $url = self::BASE_URL;

        if (isset($controller)) {
            $url .= $controller;
        }

        if (isset($action)) {
            $url .= '/' . $action;
        }

        if (isset($params)) {
            foreach ($params as $key => $value) {
                $url .= '/' . $value;
            }
        }

        return $url;
    }

    public function run()
    {
        $uri = $this->getUri();

        $_SERVER['uri'] = $uri;

        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                $segments = explode('/', $path);
                $controllerName = 'app\controllers\\' . ucfirst($segments[0] . 'Controller');
                $actionName = 'action' . ucfirst($segments[1]);
                $controllerFile = './app/controllers/' . $controllerName . '.php';

                $internalRoute = explode('/', preg_replace("~$uriPattern~", $path, $uri));

                $controllerObject = new $controllerName;

                $parameters = array_slice($internalRoute, 2);
                $result = call_user_func_array(
                    [$controllerObject, $actionName],
                    $parameters
                );

                if ($result != null) {
                    break;
                }

                return;
            }
        }
    }


}