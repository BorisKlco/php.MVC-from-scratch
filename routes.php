<?php

use Controller\Home;
use Core\App;
use Core\Database;
use Core\View;

App::get('/', [Home::class, 'index'])
    ->name('home');

App::post('/user', function () {
    $id = request()->get('id');
    $user = Database::query('SELECT * FROM users WHERE id = ?', [$id])->fetchAll();
    View::show('users', [
        'title' => 'User',
        'data' => $user
    ]);
})->only('auth')
    ->name('user');

App::get('/123', [Home::class, 'index']);
App::get('/22', [Home::class, 'index']);
App::get('/33', [Home::class, 'index']);
