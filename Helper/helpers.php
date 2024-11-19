<?php

use Core\App;
use Helper\Request;

function request()
{
    return new Request($_REQUEST);
}

function dd(...$args)
{
    echo '<pre>';
    foreach ($args as $arg) {
        var_dump($arg);
        echo '<br>';
    }
    exit();
}

function getRoute(string $name): string
{
    return App::getRoute($name);
}

function logged()
{
    return $_SESSION['user'] ?? false;
}

function redirect(string $path, string $setUserSession = null)
{
    if ($setUserSession) {
        $_SESSION['user'] = $setUserSession;
    }
    header("Location: {$path}");
    exit();
}
