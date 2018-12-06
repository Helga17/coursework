<?php

namespace app\components;

use PDO;

/**
 * Class DBConnection
 */
class DBConnection
{
    const CONFIG_PATH = './app/config/db.php';

    /** @var PDO */
    protected static $connection;
    protected static $instance;

    private function __construct()
    {
    }

    public static function getInstance(): DBConnection
    {
        if (!self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public static function getConnection(): PDO
    {
        if (self::$connection) {
            return self::$connection;
        }

        $dbConfig = self::getDBConfig();

        $dbName = $dbConfig['dbname'];
        $username = $dbConfig['username'];
        $password = $dbConfig['password'];
        $hostname = $dbConfig['hostname'] ?? 'localhost';

        self::$connection = new PDO(
            'mysql:host=' . $hostname . '; dbname=' . $dbName . '; charset=utf8;',
            $username, $password
        );

        return self::$connection;
    }

    protected static function getDBConfig(): array
    {
        return include_once self::CONFIG_PATH;
    }
}