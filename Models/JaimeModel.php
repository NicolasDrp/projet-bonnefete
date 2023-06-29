<?php

namespace App\Models;

require_once 'Database.php';
require_once 'Models/Jaime.php';

use App\Database;

use PDO;

class JaimeModel {
    private $connection;

    public function __construct() {
        $this->connection = new Database();
    }

    public function getNbrJaime($id) {
        $query = $this->connection->getPdo()->prepare("SELECT COUNT(*) as nbrJaime FROM jaime where id_post = :id;");
        $query->execute([
            'id' => $id
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\Jaime");
        return $query->fetch();
    }

    public function getNomJaime($id) {
    }

    public function isAimer($id) {
        
    }
}
