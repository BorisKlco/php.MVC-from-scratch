<?php

namespace Controller;

use Core\View;

class Home
{
    public function index()
    {
        View::make('test');
    }
}
