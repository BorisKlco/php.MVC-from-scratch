<?php

use Core\Router;
use Core\Database;
use Controller\Home;
use Core\View;

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
$route->get('/123', [Home::class, 'index']);
$route->get('/test', function () {
    View::show('test', ['title' => 'Function test']);
})->only('auth');
$route->post('/', [Home::class, 'index']);
$route->post('/123', [Home::class, 'index']);

//Reslove user request.
session_start();
$route->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
