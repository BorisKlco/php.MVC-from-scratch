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
        require_once BASE_PATH . 'Helper/helpers.php';
    }

    public static function resolve(string $uri, string $method): void
    {
        self::$router->resolve($uri, $method);
    }

    public static function get(string $route, callable|array $action): Router
    {
        return self::$router->register('GET', $route, $action);
    }

    public static function post(string $route, callable|array $action): Router
    {
        return self::$router->register('POST', $route, $action);
    }

    public static function isRoute(string $path, string $name): bool
    {
        $routes = self::$router->routes;
        foreach ($routes as $route) {
            if ($route['path'] == $path && $route['routeName'] == $name) {
                return true;
            }
        }
        return false;
    }

    public static function getRoute(string $name): string
    {
        $routes = self::$router->routes;
        foreach ($routes as $route) {
            if ($route['routeName'] == $name) {
                return $route['path'];
            }
        }

        return 'RouteNameNotFound';
    }

    public static function list(): void
    {
        $routes = self::$router->routes;
        echo '<pre>';
        var_dump($routes);
        exit();
    }
}
