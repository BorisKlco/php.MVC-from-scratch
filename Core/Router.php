<?php

namespace Core;

class Router
{
    protected array $routes;

    private function register(string $method, string $route, callable|array $action): self
    {
        $this->routes[$method][$route] = $action;
        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('GET', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('POST', $route, $action);
    }

    public function list(): void
    {
        echo '<pre>';
        var_dump($this->routes);
        die();
    }

    public function resolve(string $uri, string $method): void
    {
        $route = parse_url($uri)['path'];

        $action = $this->routes[$method][$route] ?? null;
        if (!$action) {
            View::NotFound();
        }
        [$class, $fn] = $action;
        $controller = new $class();
        call_user_func([$controller, $fn]);
    }
}
