<?php

use Controller\Home;
use Controller\User;
use Controller\Note;
use Core\App;

App::get('/', [Home::class, 'index'])
    ->name('Dashboard');

//Note
App::get('/notes', [Note::class, 'index'])
    ->only('auth')
    ->name('Notes');

App::get('/note', [Note::class, 'show'])
    ->only('auth');

//Create a note
App::get('/create', [Home::class, 'create'])
    ->only('auth')
    ->name('Create');

App::post('/create', [Note::class, 'create'])
    ->only('auth');

//Archive a note
App::get('/archive', [Home::class, 'archive'])
    ->only('auth')
    ->name('Archive');

App::post('/archive', [Note::class, 'store'])
    ->only('auth');

//Auth section
App::get('/login', [User::class, 'login'])
    ->only('guest');

App::get('/register', [User::class, 'register'])
    ->only('guest');

App::post('/login', [User::class, 'auth'])
    ->name('post-login')
    ->only('guest');

App::post('/register', [User::class, 'create'])
    ->name('post-register')
    ->only('guest');

App::post('/logout', [User::class, 'destroy'])
    ->name('logout')
    ->only('auth');
