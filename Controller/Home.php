<?php

namespace Controller;

use Core\Database;
use Core\View;

class Home
{
    public function index()
    {
        echo '<pre>';
        var_dump(request()->get('PHPSESSID'));
        var_dump($_REQUEST);
        View::show('test', ['title' => 'test', 'something' => 'testSomething']);
    }
}
