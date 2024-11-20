<?php

use Core\App;
use Core\View;
use Helper\Request;

function request()
{
    return new Request($_REQUEST);
}

/**
 * Generates a hidden input element with a CSRF token.
 *
 * This function checks if a CSRF token exists in the session.
 * If not, it generates a new token and stores it in the session.
 * The token is then included as the value of a hidden input element,
 * with the name '_csrf'.
 *
 * @return string The HTML input element containing the CSRF token.
 */
function csrf(): string
{
    $csrf = generateCsrf();
    $inputElement = "<input type='hidden' name='_csrf' value='{$csrf}'>";

    return $inputElement;
}

/**
 * Generates and retrieves the CSRF token for the session.
 *
 * If no CSRF token exists in the session, a new one is generated
 * and stored in the session. The token is then returned.
 *
 * @return string The CSRF token stored in the session.
 */
function generateCsrf(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verifies the CSRF token. True or render Forbidden.
 *
 * This function checks if the provided token matches the CSRF token
 * stored in the session. If the tokens do not match, it renders
 * a "Forbidden" view and halts execution.
 *
 * @param string $token The CSRF token to verify.
 */

function verifyCsrf($token): true|View
{
    $verify = isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);

    if ($verify) {
        return $verify;
    }

    View::Forbidden();
}

/**
 * Return string value of path for named route.
 */
function getRoute(string $name): string
{
    return App::getRoute($name);
}

/**
 * Return session['user'] or false
 */
function logged()
{
    return $_SESSION['user'] ?? false;
}

/**
 * Redirects to the specified path, optionally setting a session user value.
 *
 * This function sets the session `user` value if provided, then performs
 * an HTTP redirect to the specified path and terminates execution.
 *
 * @param string $path The URL or path to redirect to.
 * @param string|null $setUserSession Optional. The value to set for the session 'user'.
 * @return void
 */
function redirect(string $path, string $setUserSession = null)
{
    if ($setUserSession) {
        $_SESSION['user'] = $setUserSession;
    }
    header("Location: {$path}");
    exit();
}

/**
 * Dump and die, var_dump for every arg.
 */
function dd(...$args)
{
    echo '<pre>';
    foreach ($args as $arg) {
        var_dump($arg);
        echo '<br>';
    }
    exit();
}
