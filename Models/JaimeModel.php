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
        $query = $this->connection->getPdo()->prepare("SELECT CONCAT(nom_utilisateur, ' ', prenom_utilisateur) as nom_utilisateur, jaime.id_utilisateur FROM jaime INNER JOIN utilisateur ON jaime.id_utilisateur = utilisateur.id_utilisateur WHERE id_post = :id;");
        $query->execute([
            'id' => $id
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Jaime");
    }

    public function estAime($id_post) {
        $query = $this->connection->getPdo()->prepare('SELECT COUNT(*) AS estAime FROM jaime WHERE id_post = :id_post AND id_utilisateur = :id;');
        $query->execute([
            'id_post' => $id_post,
            'id' => $_SESSION['utilisateur']->id_utilisateur,
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\Jaime");
        return $query->fetch();
    }

    public function ajouterjaime($id_post) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO jaime (id_utilisateur, id_post) VALUES (:id_utilisateur,:id_post);');
        $query->execute([
            'id_utilisateur' => $_SESSION['utilisateur']->id_utilisateur,
            'id_post' =>$id_post
        ]);
    }

    public function retirerJaime($id_post) {
        $query = $this->connection->getPdo()->prepare('DELETE FROM jaime WHERE id_post = :id and id_utilisateur = :id_utilisateur');
        $query->execute([
            'id' => $id_post,
            'id_utilisateur' => $_SESSION['utilisateur']->id_utilisateur
        ]);
    }
}
