<?php

namespace Core;

class View
{
    public function __construct(
        protected string $view,
        protected array $params = []
    ) {}

    public static function show(string $view, array $params = []): void
    {
        $response = new self($view, $params);
        echo $response->render();
        exit();
    }

    public static function DBException(array $e): void
    {
        $error = new self('error/db', $e);
        http_response_code(500);
        echo $error->render();
        exit();
    }
    public static function NotFound(string $errorBody = 'Page not found.'): void
    {
        $info = ['title' => 'Page not found', 'msg' => $errorBody];
        $error = new self('error/error', $info);
        http_response_code(404);
        echo $error->render();
        exit();
    }

    public static function Forbidden(): void
    {
        $info = [
            'title' => 'Access to the requested resource is forbidden',
            'msg' => 'Access to the requested resource is forbidden.'
        ];
        $error = new self('error/error', $info);
        http_response_code(403);
        echo $error->render();
        exit();
    }

    protected function render(): void
    {
        extract($this->params);
        $title = $this->params['title'] ?? "Default";
        $slot = VIEWS_PATH . "{$this->view}.php";
        if (!file_exists($slot)) {
            self::NotFound('View not found');
        }
        $layout = VIEWS_PATH . "layout.php";
        include $layout;
    }
}
