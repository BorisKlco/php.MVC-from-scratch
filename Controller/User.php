<?php

namespace Controller;

use Core\Database;
use Core\View;

class User
{
    public function show()
    {
        View::show('test', ['title' => 'test', 'something' => 'testSomething']);
    }
    
    public function create()
    {
        View::show('test', ['title' => 'test', 'something' => 'testSomething']);
    }

    public function destroy()
    {
        session_destroy();
        redirect('/');
    }
}
