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

    public function getNbrJaimePost($id) {
        $query = $this->connection->getPdo()->prepare("SELECT COUNT(*) as nbrJaimePost FROM jaime where id_post = :id AND id_commentaire IS NULL;");
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

    public function estAimePost($id_post) {
        $query = $this->connection->getPdo()->prepare('SELECT COUNT(*) AS estAimePost FROM jaime WHERE id_post = :id_post AND id_utilisateur = :id AND id_commentaire IS NULL;');
        $query->execute([
            'id_post' => $id_post,
            'id' => $_SESSION['utilisateur']->id_utilisateur,
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\Jaime");
        return $query->fetch();
    }

    public function ajouterJaimePost($id_post) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO jaime (id_utilisateur, id_post) VALUES (:id_utilisateur,:id_post);');
        $query->execute([
            'id_utilisateur' => $_SESSION['utilisateur']->id_utilisateur,
            'id_post' => $id_post
        ]);
    }

    public function retirerJaimePost($id_post) {
        $query = $this->connection->getPdo()->prepare('DELETE FROM jaime WHERE id_post = :id and id_utilisateur = :id_utilisateur AND id_commentaire IS NULL');
        $query->execute([
            'id' => $id_post,
            'id_utilisateur' => $_SESSION['utilisateur']->id_utilisateur
        ]);
    }

    public function getNbrJaimeCommentaire($id) {
        $query = $this->connection->getPdo()->prepare("SELECT id_commentaire,COUNT(*) as nbrJaimeCommentaire FROM jaime where id_post = :id AND id_commentaire IS NOT NULL GROUP BY id_commentaire;");
        $query->execute([
            'id' => $id
        ]);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Jaime");
    }

    public function estAimeCommentaire($id_post) {
        $query = $this->connection->getPdo()->prepare('SELECT id_commentaire,COUNT(*) AS estAimeCommentaire FROM jaime WHERE id_post = :id_post AND id_utilisateur = :id AND id_commentaire IS NOT NULL Group BY id_commentaire;');
        $query->execute([
            'id_post' => $id_post,
            'id' => $_SESSION['utilisateur']->id_utilisateur,
        ]);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Jaime");
    }

    public function ajouterJaimeCommentaire($id_commentaire, $id_post) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO jaime (id_utilisateur, id_commentaire,id_post) VALUES (:id_utilisateur,:id_com, :id_post);');
        $query->execute([
            'id_utilisateur' => $_SESSION['utilisateur']->id_utilisateur,
            'id_com' => $id_commentaire,
            'id_post' => $id_post
        ]);
    }

    public function retirerJaimeCommentaire($id_commentaire) {
        $query = $this->connection->getPdo()->prepare('DELETE FROM jaime WHERE id_commentaire = :id and id_utilisateur = :id_utilisateur');
        $query->execute([
            'id' => $id_commentaire,
            'id_utilisateur' => $_SESSION['utilisateur']->id_utilisateur
        ]);
    }
}
