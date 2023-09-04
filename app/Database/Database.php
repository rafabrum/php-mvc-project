<?php

namespace App\Database;

use PDO;
use PDOException;
use Exception;

class Database
{
    private static $connection = null;

    private function __construct()
    {
    }

    public static function getConnection()
    {
        list($pdoConfig, $usuario, $senha) = self::getConfig();

        try {
            if (self::$connection === null) {
                self::$connection = new PDO($pdoConfig, $usuario, $senha);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            throw new Exception("Erro de conexão com o banco de dados", 500);
        }

        return self::$connection;
    }

    /**
     * @return string[]
     */
    private static function getConfig(): array
    {
        $driver = $_ENV['DB_DRIVER'];
        $host = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];;
        $pdoConfig = $driver . ":" . "host=" . $host . ";dbname=" . $dbName . ";";
        $usuario = $_ENV['DB_USERNAME'];
        $senha = $_ENV['DB_PASSWORD'];
        return array($pdoConfig, $usuario, $senha);
    }
}