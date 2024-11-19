<?php

namespace Controller;

use Core\Database;
use Core\View;
use Helper\Validator;

class User
{
    public function login()
    {
        View::show('user/login', ['title' => 'Login Page']);
    }

    public function register()
    {
        View::show('user/register', ['title' => 'Register']);
    }

    public function create()
    {
        $error = [];
        $email = request()->get('email');
        $password = request()->get('password');

        if (!Validator::email($email)) {
            $error['email'] = 'Email is not valid.';
        }

        if (!Validator::string($password, 4, 21)) {
            $error['password'] = 'Min 4 characters, max 21.';
        }


        if (!$error) {
            $emailExist = Database::query('SELECT id FROM users WHERE email = ?', [$email])->fetch();
            if ($emailExist) {
                $error['email'] = 'Email address is already in use';
                View::show('user/register', ['title' => 'Register', 'error' => $error]);
            }

            $createAcc = Database::query("
            INSERT INTO users (email, password)
            VALUES (:email, :password);
            ", [
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);

            redirect('/', $email);
        }

        View::show('user/register', ['title' => 'Register', 'error' => $error]);
    }

    public function destroy()
    {
        session_destroy();
        redirect('/');
    }
}
