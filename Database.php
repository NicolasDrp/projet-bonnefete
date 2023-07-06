<?php

namespace App;


require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

use PDO;

class Database {
    protected $pdo;


    public function __construct() {
        $this->pdo = new PDO($_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    }

    public function getPdo() {
        return $this->pdo;
    }
}
