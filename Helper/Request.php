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
        return App::isRoute($name);
    }

    public function has($key): bool
    {
        return array_key_exists($key, $this->data);
    }

    public function get($key): string
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }

        return '';
    }
}
