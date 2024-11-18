<?php

use Controller\Home;
use Core\App;
use Core\Database;
use Core\View;

App::get('/', [Home::class, 'index'])
    ->name('home');
App::post('/users', function () {
    $users = Database::query('SELECT * FROM users')->fetchAll();
    View::show('users', [
        'title' => 'Users',
        'data' => $users
    ]);
})->only('Auth')
    ->name('users');

App::get('/123', [Home::class, 'index']);
App::get('/22', [Home::class, 'index']);
App::get('/33', [Home::class, 'index']);
