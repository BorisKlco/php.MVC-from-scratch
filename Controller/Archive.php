<?php

namespace Controller;

use Core\Database;
use Core\View;

class Archive
{
    public function index()
    {
        View::show('note/index', ['title' => 'Archive', 'something' => 'testSomething']);
    }

    public function store() {}
}
