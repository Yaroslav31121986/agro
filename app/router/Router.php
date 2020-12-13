<?php

namespace App\Router;

class Router
{
    public static $routes = [];

    private function __construct() {}
    private function __clone() {}

    public static function route($pattern, $callback)
    {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        self::$routes[$pattern] = $callback;
    }

    public static function execute($url)
    {
        foreach (self::$routes as $pattern => $callback)
        {
            if (preg_match($pattern, $url, $params)) {
                if ($_SERVER['REQUEST_METHOD'] == "GET") {
                    array_shift($params);
                    $obj = new $callback[0];
                    return call_user_func_array([$obj, $callback[1]], array_values($params));
                }
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $obj = new $callback[0];
                    $func = $callback[1];
                    $obj->$func($_POST);
                }
            }
        }
    }
}

