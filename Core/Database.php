<?php

namespace Core;

use PDO;
use PDOStatement;

class Database
{
    private static \PDO $db;

    public function __construct(
        string $filename = 'sqlite'
    ) {

        self::$db = new PDO(
            'sqlite:' . BASE_PATH . "{$filename}.db",
            options: [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
    }

    public static function instance(): \PDO
    {
        return self::$db;
    }

    public static function query(string $query, array $params = []): PDOStatement
    {
        try {
            $db = self::$db;
            $statement = $db->prepare($query);
            $statement->execute($params);
        } catch (\PDOException $e) {
            $error = [
                'title' => $e->getCode(),
                'error' => $e->getMessage()

            ];
            View::DBException($error);
        }
        return $statement;
    }
}
