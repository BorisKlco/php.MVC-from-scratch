<?php

use Core\Router;
use Core\Database;
use Controller\Home;

const BASE_PATH = __DIR__ . "/../";
const VIEWS_PATH = BASE_PATH . "views/";

//Autoloader
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    include BASE_PATH . "{$class}.php";
});

$route = new Router();
$db = new Database();

//Routes
$route->get('/', [Home::class, 'index']);

//Reslove user request.
$route->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
