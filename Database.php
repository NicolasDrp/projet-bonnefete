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
        $this->pdo = new PDO($_ENV['BDD_HOST'] . ";dbname=" . $_ENV['BDD_NOM'], $_ENV['BDD_UTILISATEUR'], $_ENV['BDD_MDP']);
    }

    public function getPdo() {
        return $this->pdo;
    }
}
