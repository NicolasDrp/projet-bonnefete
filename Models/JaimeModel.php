<?php
namespace App\Models;

require_once 'Database.php';
require_once 'Models/Jaime.php';

use App\Database;

use PDO;

class JaimeModel{
    private $connection;

    public function __construct(){
        $this->connection = new Database();
    }

    
}