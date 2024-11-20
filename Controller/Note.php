<?php

namespace Controller;

use Core\Database;
use Core\View;

class Note
{
    public function index()
    {
        View::show('note/index', ['title' => 'Notes', 'something' => 'testSomething']);
    }

    public function show()
    {
        View::show('note/show', ['title' => 'Note', 'something' => 'testSomething']);
    }

    public function create()
    {
        View::show('note/create', ['title' => 'Create', 'something' => 'testSomething']);
    }

    public function store() {}

    public function edit()
    {
        View::show('note/edit', ['title' => 'Edit', 'something' => 'testSomething']);
    }

    public function update() {}

    public function destroy() {}
}
