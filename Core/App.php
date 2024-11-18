<?php

namespace Core;

use Core\Router;
use Core\Database;

class App
{
    private static Database $db;
    private static Router $router;

    public function __construct()
    {
        self::$db = new Database();
        self::$router = new Router();
        require_once BASE_PATH . 'routes.php';
    }

    public static function resolve(string $uri, string $method)
    {
        self::$router->resolve($uri, $method);
    }

    public static function get(string $route, callable|array $action)
    {
        return self::$router->register('GET', $route, $action);
    }

    public static function post(string $route, callable|array $action)
    {
        return self::$router->register('POST', $route, $action);
    }

    public static function list()
    {
        $routes = self::$router->routes;
        echo '<pre>';
        var_dump($routes);
        exit();
    }
}
