<?php


require_once __DIR__ . '/../../vendor/autoload.php';
use Dotenv\Dotenv as Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();



class Database {
    

    public function connect() {
        $conn = new mysqli( 
            $_ENV["DATABASE_HOSTNAME"],
            $_ENV["DATABASE_USERNAME"],
            $_ENV["DATABASE_PASSWORD"],
            $_ENV["DATABASE_DBNAME"],


        );

        if ($conn->connect_error) {
            die("Database Connection Failed: " . $conn->connect_error);
        }

        return $conn;
    }
}