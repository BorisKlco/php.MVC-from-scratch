<?php

namespace Middleware;

class Auth
{
    public function hande()
    {
        echo 'Hello from Auth Middleware';
        exit();
    }
}
