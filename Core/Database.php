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
    /**
     * Executes a SQL query with optional parameters and returns the prepared statement.
     *
     * @param string $query The SQL query to be executed.
     * @param array $params An associative array of parameters to bind to the query (default is an empty array).
     * @return PDOStatement Returns the prepared statement object.
     */
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
