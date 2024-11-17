<?php

use Core\Router;
use Controller\Home;

const BASE_PATH = __DIR__ . "/../";
const VIEWS_PATH = BASE_PATH . "views/";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    include BASE_PATH . "{$class}.php";
});


$route = new Router();

$route->get('/', [Home::class, 'index']);

$route->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
