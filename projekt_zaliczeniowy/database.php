<?php

final class Database
{
    private static ?Database $instance = null;
    private const DB_HOST = "localhost";
    private const DB_NAME = "forsurenotstepik";
    private const DB_USERNAME = "root";
    private const DB_PASSWORD = "";
    public PDO $connection;

    public static function getInstance(): Database
    {
        if (Database::$instance === null) {
            Database::$instance = new Database();
        }

        return Database::$instance;
    }
    public function getConnection()
    {
        return $this->connection;
    }
    private function __construct()
    {
        $this->connection = new PDO("mysql:host=".Database::DB_HOST.";dbname=".Database::DB_NAME, Database::DB_USERNAME, Database::DB_PASSWORD);
    }
}
