# PHP.MVC framework

A simple MVC framework inspired by Laravel. Built as a learning project in my free time.

- SQLite Database support.
- Routing: Supports both controller actions and directly rendering views with functions.
- Middleware: Easily implement middleware for request handling.
- Helper Functions:
  - Accessing $\_REQUEST data.
  - request()->isRoute('home')
  - Checking if a parameter exists with request()->has('id') or ->get('id').

```
App::get('/', [Home::class, 'index'])
    ->name('home');

App::post('/users', function () {
    $users = Database::query('SELECT * FROM users')->fetchAll();
    View::show('users', [
        'title' => 'Users',
        'data' => $users
    ]);
})->only('Auth')
    ->name('users');
```
