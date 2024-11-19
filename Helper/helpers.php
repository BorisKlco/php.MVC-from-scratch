<?php

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

function logged()
{
    return $_SESSION['user'] ?? false;
}

function redirect(string $path)
{
    header("Location: {$path}");
    exit();
}
