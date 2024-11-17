<?php

namespace Core;

class View
{
    public function __construct(
        protected string $view,
        protected array $params = []
    ) {}

    public static function make(string $view, array $params = []): void
    {
        $response = new self($view, $params);
        echo $response->render();
    }

    public static function NotFound(): void
    {
        $error = new self('error/404', ['title' => 'Page not found']);
        http_response_code(404);
        echo $error->render();
        exit();
    }

    public static function Forbidden(): void
    {
        $error = new self('error/403', ['title' => 'Access to the requested resource is forbidden']);
        http_response_code(403);
        echo $error->render();
        exit();
    }

    protected function render(): void
    {
        $title = $this->params['title'] ?? "Default";
        $slot = VIEWS_PATH . "{$this->view}.php";
        if (!file_exists($slot)) {
            self::NotFound();
        }
        $layout = VIEWS_PATH . "layout.php";
        include $layout;
    }
}
