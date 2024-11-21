<?php

namespace Controller;

use Core\Database;
use Core\View;

class Archive
{
    public function index()
    {
        $email = $_SESSION['user'];
        $notes = Database::query('SELECT title, created_at, link 
        FROM notes 
        WHERE email = ? AND archived = 1;', [$email])->fetchAll() ?? [];
        View::show('archive/index', ['title' => 'Archive', 'notes' => $notes]);
    }

    public function store()
    {
        verifyCsrf(request()->get('_csrf'));
        $link = request()->get('id');
        $email = $_SESSION['user'];

        $findNote = Database::query('SELECT email FROM notes WHERE link = ?;', [$link])->fetch();

        if ($findNote) {
            $isUserNote = $findNote['email'] == $email;

            if ($isUserNote) {
                $title = request()->get('title');
                $note = request()->get('note');

                $update = Database::query(
                    "
                UPDATE notes 
                SET archived = true 
                WHERE link = :link;",
                    ['link' => $link,]
                );
                redirect('/notes');
            }
        }

        View::Forbidden();
    }
}
