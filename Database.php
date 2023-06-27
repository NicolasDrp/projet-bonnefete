<?php
namespace App;

use PDO;
class Database {
    protected $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=bonnefete","root","Oxymore59220");
    }

    public function getPdo(){
        return $this->pdo;
    }
}
