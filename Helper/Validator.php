<?php

namespace Helper;

class Validator
{
    public static function string(string $value, int $min = 1, int $max = INF): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function greaterThan(int $value, int $greaterThan): bool
    {
        return $value > $greaterThan;
    }

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
