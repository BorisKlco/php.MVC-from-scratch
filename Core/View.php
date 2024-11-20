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
        http_response_code(500);
        $e['code'] = http_response_code();
        $error = new self('error/error', $e);
        echo $error->render(true);
        exit();
    }

    public static function NotFound(string $errorBody = 'Page not found.'): void
    {

        http_response_code(404);
        $info = [
            'title' => 'Not found',
            'error' => $errorBody,
            'code' => http_response_code(),
        ];
        $error = new self('error/error', $info);
        echo $error->render(true);
        exit();
    }

    public static function Forbidden(): void
    {
        http_response_code(403);
        $info = [
            'title' => 'Forbidden',
            'error' => 'Access to the requested resource is forbidden.',
            'code' => http_response_code()
        ];
        $error = new self('error/error', $info);
        echo $error->render(true);
        exit();
    }

    protected function render(bool $exception = false): void
    {
        extract($this->params);
        $title = $this->params['title'] ?? "Default";
        $slot = VIEWS_PATH . "{$this->view}.php";
        // Exception 500,404,403 view doesn't use layout.
        if (!$exception) {
            if (!file_exists($slot)) {
                self::NotFound('View not found');
            }
            $layout = VIEWS_PATH . "layout.php";
            include $layout;
        }
        include $slot;
    }
}
