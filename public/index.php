<?php

use Core\App;

const BASE_PATH = __DIR__ . "/../";
const VIEWS_PATH = BASE_PATH . "views/";

//Autoloader
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    include BASE_PATH . "{$class}.php";
});

new App();

//Resolve user request.
session_start();
App::resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
