<?php

namespace Controller;

use Core\Database;
use Core\View;

class Note
{
    public function index()
    {
        View::show('test', ['title' => 'test', 'something' => 'testSomething']);
    }
}
