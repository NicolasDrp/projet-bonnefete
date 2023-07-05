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

    /**
     * Récupère tous les logs.
     *
     * @return array Les logs récupérés.
     */
    public function recupererLogs() {
        $query = $this->connection->getPdo()->prepare("SELECT id_log,action,id_utilisateur,id_post,date_log FROM log ORDER BY date_log DESC;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Log");
    }

    /**
     * Crée un nouveau log pour une action spécifiée sur un post.
     *
     * @param string $action L'action effectuée.
     * @param int $id_post L'identifiant du post.
     */
    public function creerLog($action, $id_post) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO log (action,id_utilisateur,id_post,date_log) VALUES (:action,:id_utilisateur,:id_post, now());');
        $query->execute([
            'action' => $action,
            'id_utilisateur' => $_SESSION['utilisateur']->id_utilisateur,
            'id_post' => $id_post
        ]);
    }

    /**
     * Crée un nouveau log pour une action d'inscription.
     *
     * @param string $action L'action d'inscription.
     */
    public function creerLogInscription($action) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO log (action,date_log) VALUES (:action, now());');
        $query->execute([
            'action' => $action
        ]);
    }
}
