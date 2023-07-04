<?php

namespace App\Models;

require_once 'Database.php';
require_once 'Models/Log.php';

use App\Database;

use PDO;

class LogModel {
    private $connection;

    public function __construct() {
        $this->connection = new Database();
    }

    public function recupererLogs() {
        $query = $this->connection->getPdo()->prepare("SELECT id_log,action,id_utilisateur,id_post,date_log FROM log;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Log");
    }

    public function creerLog($action, $id_post) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO log (action,id_utilisateur,id_post,date_log) VALUES (:action,:id_utilisateur,:id_post, now());');
        $query->execute([
            'action' => $action,
            'id_utilisateur' => $_SESSION['utilisateur']->id_utilisateur,
            'id_post' => $id_post
        ]);
    }
}
