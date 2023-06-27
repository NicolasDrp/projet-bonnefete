<?php

namespace App\Models;

require_once 'Database.php';
require_once 'Models/Moderateur.php';

use App\Database;

use PDO;

class ModerateurModel {
    private $connection;

    public function __construct() {
        $this->connection = new Database();
    }

    public function create($moderateur) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO moderateur (id_utilisateur) VALUES (:id)');
        $query->execute([
            'id' => $moderateur['id_utilisateur']
        ]);
    }
}
