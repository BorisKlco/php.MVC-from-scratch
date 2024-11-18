<?php

use Controller\Home;
use Core\App;

App::get('/', [Home::class, 'index']);
App::get('/123', [Home::class, 'index']);
App::get('/22', [Home::class, 'index']);
App::get('/33', [Home::class, 'index']);
