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

    public function auth()
    {
        $email = request()->get('email');
        $password = request()->get('password');
        $error = [];

        if (Validator::email($email)) {
            $account = Database::query('SELECT email, password FROM users WHERE email = ?', [$email])->fetch();

            if (password_verify($password, $account['password'])) {
                redirect('/', $email);
            }
        }

        $error['password'] = "Email or password is not correct.";
        View::show('user/login', ['title' => 'Login Page', 'error' => $error]);
    }

    public function create()
    {
        $email = request()->get('email');
        $password = request()->get('password');
        $error = Validator::registration($email, $password);

        if ($error) {
            View::show('user/register', ['title' => 'Register', 'error' => $error]);
        }

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

    public function destroy()
    {
        session_destroy();
        redirect('/');
    }
}
