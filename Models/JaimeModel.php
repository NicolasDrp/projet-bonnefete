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

    /**
     * Obtient le nombre total de "j'aime" pour un post spécifié.
     *
     * @param int $id L'identifiant du post.
     * @return Jaime Le nombre total de "j'aime" pour le post.
     */
    public function getNbrJaimePost($id) {
        $query = $this->connection->getPdo()->prepare("SELECT COUNT(*) as nbrJaimePost FROM jaime where id_post = :id AND id_commentaire IS NULL;");
        $query->execute([
            'id' => $id
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\Jaime");
        return $query->fetch();
    }

    /**
     * Obtient les noms des utilisateurs qui ont aimé un post spécifié.
     *
     * @param int $id L'identifiant du post.
     * @return array Un tableau contenant les noms d'utilisateurs et les identifiants des utilisateurs.
     */
    public function getNomJaime($id) {
        $query = $this->connection->getPdo()->prepare("SELECT CONCAT(nom_utilisateur, ' ', prenom_utilisateur) as nom_utilisateur, jaime.id_utilisateur FROM jaime INNER JOIN utilisateur ON jaime.id_utilisateur = utilisateur.id_utilisateur WHERE id_post = :id;");
        $query->execute([
            'id' => $id
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Jaime");
    }

    /**
     * Vérifie si l'utilisateur a aimé un post spécifié.
     *
     * @param int $id_post L'identifiant du post.
     * @return Jaime|false Les informations sur le "j'aime" ou False si l'utilisateur n'a pas aimé le post.
     */
    public function estAimePost($id_post) {
        $query = $this->connection->getPdo()->prepare('SELECT COUNT(*) AS estAimePost FROM jaime WHERE id_post = :id_post AND id_utilisateur = :id AND id_commentaire IS NULL;');
        $query->execute([
            'id_post' => $id_post,
            'id' => $_SESSION['utilisateur']->id_utilisateur,
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\Jaime");
        return $query->fetch();
    }

    /**
     * Ajoute un "j'aime" à un post spécifié.
     *
     * @param int $id_post L'identifiant du post.
     */
    public function ajouterJaimePost($id_post) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO jaime (id_utilisateur, id_post) VALUES (:id_utilisateur,:id_post);');
        $query->execute([
            'id_utilisateur' => $_SESSION['utilisateur']->id_utilisateur,
            'id_post' => $id_post
        ]);
    }

    /**
     * Retire un "j'aime" d'un post spécifié.
     *
     * @param int $id_post L'identifiant du post.
     */
    public function retirerJaimePost($id_post) {
        $query = $this->connection->getPdo()->prepare('DELETE FROM jaime WHERE id_post = :id and id_utilisateur = :id_utilisateur AND id_commentaire IS NULL');
        $query->execute([
            'id' => $id_post,
            'id_utilisateur' => $_SESSION['utilisateur']->id_utilisateur
        ]);
    }

    /**
     * Obtient le nombre total de "j'aime" pour un commentaire spécifié.
     *
     * @param int $id L'identifiant du commentaire.
     * @return array Le nombre total de "j'aime" pour le commentaire.
     */
    public function getNbrJaimeCommentaire($id) {
        $query = $this->connection->getPdo()->prepare("SELECT id_commentaire,COUNT(*) as nbrJaimeCommentaire FROM jaime where id_post = :id AND id_commentaire IS NOT NULL GROUP BY id_commentaire;");
        $query->execute([
            'id' => $id
        ]);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Jaime");
    }

    /**
     * Vérifie si l'utilisateur a aimé un commentaire spécifié.
     *
     * @param int $id_post L'identifiant du commentaire.
     * @return array Les informations sur le "j'aime" pour chaque commentaire ou une liste vide si l'utilisateur n'a pas aimé les commentaires.
     */
    public function estAimeCommentaire($id_post) {
        $query = $this->connection->getPdo()->prepare('SELECT id_commentaire,COUNT(*) AS estAimeCommentaire FROM jaime WHERE id_post = :id_post AND id_utilisateur = :id AND id_commentaire IS NOT NULL Group BY id_commentaire;');
        $query->execute([
            'id_post' => $id_post,
            'id' => $_SESSION['utilisateur']->id_utilisateur,
        ]);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Jaime");
    }

    /**
     * Ajoute un "j'aime" à un commentaire spécifié.
     *
     * @param int $id_commentaire L'identifiant du commentaire.
     * @param int $id_post L'identifiant du post.
     */
    public function ajouterJaimeCommentaire($id_commentaire, $id_post) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO jaime (id_utilisateur, id_commentaire,id_post) VALUES (:id_utilisateur,:id_com, :id_post);');
        $query->execute([
            'id_utilisateur' => $_SESSION['utilisateur']->id_utilisateur,
            'id_com' => $id_commentaire,
            'id_post' => $id_post
        ]);
    }

    /**
     * Retire un "j'aime" d'un commentaire spécifié.
     *
     * @param int $id_commentaire L'identifiant du commentaire.
     */
    public function retirerJaimeCommentaire($id_commentaire) {
        $query = $this->connection->getPdo()->prepare('DELETE FROM jaime WHERE id_commentaire = :id and id_utilisateur = :id_utilisateur');
        $query->execute([
            'id' => $id_commentaire,
            'id_utilisateur' => $_SESSION['utilisateur']->id_utilisateur
        ]);
    }
}
