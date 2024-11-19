<?php

namespace Controller;

use Core\Database;
use Core\View;

class Home
{
    public function index()
    {
        View::show('home/index');
    }
}
