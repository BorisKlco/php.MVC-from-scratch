<?php

namespace Helper;

class Validator
{
    /**
     * Validates if the given string meets the specified length requirements.
     *
     * @param string $value The string value to be validated.
     * @param int $min Minimum length required (default is 1).
     * @param int $max Maximum length allowed (default is PHP_INT_MAX).
     * @return bool Returns true if the string meets the criteria, false otherwise.
     */
    public static function string(string $value, int $min = 1, int $max = INF): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }
    /**
     * Validates if the given value is a valid email address.
     *
     * @param string $value The email value to be validated.
     * @return bool Returns true if the email is valid, false otherwise.
     */
    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    /**
     * Validates a CSRF token against the session-stored token.
     *
     * @param string $token The CSRF token to be validated.
     * @return bool Returns true if the token matches and is set, false otherwise.
     */
    public static function csrf(string $token): bool
    {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
    /**
     * Checking the email(FILTER_VALIDATE_EMAIL) and password(length) for registration.
     *
     * @param string $email The email address of the user.
     * @param string $password The password provided during registration.
     * @return array Returns an associative array of validation errors, empty if no errors.
     */
    public static function registration(string $email, string $password): array
    {
        $error = [];

        if (!self::email($email)) {
            $error['email'] = 'Email is not valid.';
        }

        if (!self::string($password, 4, 21)) {
            $error['password'] = 'Min 4 characters, max 21.';
        }

        return $error;
    }
}
