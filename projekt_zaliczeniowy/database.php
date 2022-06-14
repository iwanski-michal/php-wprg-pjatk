<?php

final class Database
{
    private static $instance = null;
    private const DB_HOST = "localhost";
    private const DB_NAME = "forsurenotstepik";
    private const DB_USERNAME = "root";
    private const DB_PASSWORD = "";
    // private const DB_HOST = "mysql.ct8.pl";
    // private const DB_NAME = "m29333_forsurenotstepik";
    // private const DB_USERNAME = "m29333_michal";
    // private const DB_PASSWORD = "Michal123";
    public $connection;

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
