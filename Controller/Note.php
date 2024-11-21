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
        $notes = Database::query('SELECT title, created_at, link, archived FROM notes WHERE email = ?', [$email])->fetchAll() ?? [];
        View::show('note/index', ['title' => 'Notes', 'notes' => $notes]);
    }

    public function show()
    {
        $email = $_SESSION['user'];
        $noteLink = request()->get('id');
        $note = Database::query('SELECT title, created_at, note, email, public FROM notes WHERE link = ?', [$noteLink])->fetch();

        if ($note) {
            $isPublic = $note['public'];

            if ($isPublic) {
                View::show('note/show', ['title' => $note['title'], 'date' => $note['created_at'], 'note' => $note['note']]);
            }

            if ($note['email'] == $email) {
                View::show('note/show', ['title' => $note['title'], 'date' => $note['created_at'], 'note' => $note['note']]);
            }
        }

        redirect('/notes');
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
        $email = $_SESSION['user'];
        $link = request()->get('id');
        $note = Database::query('SELECT title, note, email FROM notes WHERE link = ?', [$link])->fetch();

        if ($note && $note['email'] == $email) {
            View::show('note/edit', ['title' => $note['title'], 'note' => $note['note'], 'id' => $link]);
        }

        redirect('/notes');
    }

    public function update()
    {
        verifyCsrf(request()->get('_csrf'));
        $link = request()->get('_id');
        $email = $_SESSION['user'];

        $findNote = Database::query('SELECT email FROM notes WHERE link = ?', [$link])->fetch();

        if ($findNote) {
            $isUserNote = $findNote['email'] == $email;

            if ($isUserNote) {
                $title = request()->get('title');
                $note = request()->get('note');

                if (!Validator::string($note, 1, 5000) || !Validator::string($title, 1, 72)) {
                    $error['note'] = "Note no more than 5000 characters, Title no more than 72 characters.";
                    View::show('note/edit', [
                        'title' => $title,
                        'note' => $note,
                        'id' => $link,
                        'error' => $error
                    ]);
                }

                $update = Database::query(
                    "
                UPDATE notes 
                SET title = :title, 
                    note = :note, 
                    created_at = CURRENT_TIMESTAMP 
                WHERE link = :link;",
                    [
                        'link' => $link,
                        'title' => $title,
                        'note' => $note,
                    ]
                );
                redirect('/notes');
            }
        }

        View::Forbidden();
    }

    public function destroy()
    {
        dd(request());
    }
}
