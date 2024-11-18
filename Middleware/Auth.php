<?php

namespace Middleware;

class Auth
{
    public function handle()
    {
        echo 'Hello from Auth Middleware';
        exit();
    }
}
