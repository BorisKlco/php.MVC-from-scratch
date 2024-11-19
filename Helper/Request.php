<?php

namespace Helper;

use Core\App;

class Request
{

    public function __construct(
        protected array $data
    ) {}

    public function isRoute($name): bool
    {
        $path = parse_url($_SERVER['REQUEST_URI'])['path'];
        return App::isRoute($path, $name);
    }

    public function has($key): bool
    {
        return array_key_exists($key, $this->data);
    }

    public function get($key): string
    {
        if (isset($this->data[$key])) {
            return htmlspecialchars(trim($this->data[$key]));
        }

        return '';
    }
}
