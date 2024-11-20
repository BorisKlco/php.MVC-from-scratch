<?php

namespace Controller;

use Core\Database;
use Core\View;
use Helper\Validator;

class Note
{
    public function index()
    {
        $email = $_SESSION['user'];
        $notes = Database::query('SELECT title, created_at, link FROM notes WHERE email = ?', [$email])->fetchAll() ?? [];
        View::show('note/index', ['title' => 'Notes', 'notes' => $notes]);
    }

    public function show()
    {
        View::show('note/show', ['title' => 'Note', 'something' => 'testSomething']);
    }

    public function create()
    {
        View::show('note/create', ['title' => 'Create', 'something' => 'testSomething']);
    }

    public function store()
    {
        verifyCsrf(request()->get('_csrf'));
        $title = request()->get('title');
        $note = request()->get('note');

        if (!Validator::string($note, 1, 5000) || !Validator::string($title, 1, 72)) {
            $error['note'] = "Note no more than 5000 characters, Title no more than 72 characters.";
            View::show('note/create', [
                'title' => 'Create',
                'noteTitle' => $title,
                'note' => $note,
                'error' => $error
            ]);
        }

        do {
            $link = uniqid();
            $isUnique = Database::query('SELECT link FROM notes WHERE link = ?', [$link])->fetch();
        } while ($isUnique);

        $store = Database::query("
        INSERT INTO notes (link, title,note,email)
        VALUES (:link, :title, :note, :email);
        ", [
            'link' => $link,
            'title' => $title,
            'note' => $note,
            'email' => $_SESSION['user'],
        ]);
        redirect('/notes');
    }

    public function edit()
    {
        View::show('note/edit', ['title' => 'Edit', 'something' => 'testSomething']);
    }

    public function update() {}

    public function destroy() {}
}
