<?php

namespace App\Models;

require_once 'Database.php';
require_once 'Models/Commentaire.php';

use App\Database;
use PDO;

class CommentaireModel {
    private $connection;

    public function __construct() {
        $this->connection = new Database();
    }

    /**
     * Obtient tous les commentaires pour un post spécifié.
     *
     * @param int $id L'identifiant du post.
     * @return array Un tableau contenant les commentaires.
     */
    public function getAllCommentaire($id) {
        $query = $this->connection->getPdo()->prepare("SELECT id_commentaire, contenu_commentaire, commentaire.id_utilisateur, id_post, id_com, date_commentaire, nom_utilisateur, prenom_utilisateur FROM commentaire INNER JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id_utilisateur WHERE id_post = :id AND id_com IS NULL;");
        $query->execute([
            'id' => $id
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Commentaire");
    }

    /**
     * Obtient tous les sous-commentaires pour un commentaire spécifié.
     *
     * @param int $id L'identifiant du commentaire.
     * @return array Un tableau contenant les sous-commentaires.
     */
    public function getAllSousCommentaire($id) {
        $query = $this->connection->getPdo()->prepare("SELECT id_commentaire, contenu_commentaire, commentaire.id_utilisateur, id_post, id_com, date_commentaire, nom_utilisateur, prenom_utilisateur FROM commentaire INNER JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id_utilisateur WHERE id_post = :id AND id_com IS NOT NULL;");
        $query->execute([
            'id' => $id
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Commentaire");
    }

    /**
     * Crée un nouveau commentaire pour un post spécifié.
     *
     * @param array $commentaire Les données du commentaire à créer.
     * @param int $id L'identifiant du post.
     */
    public function creerCommentaire($commentaire, $id) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO commentaire (contenu_commentaire, date_commentaire, id_utilisateur, id_post) VALUES (:contenu_commentaire, now(), :id, :id_post);');
        $query->execute([
            'contenu_commentaire' => $commentaire['contenu_commentaire'],
            'id' => $_SESSION['utilisateur']->id_utilisateur,
            'id_post' => $id
        ]);
    }

    /**
     * Crée un nouveau sous-commentaire pour un commentaire spécifié.
     *
     * @param array $commentaire Les données du sous-commentaire à créer.
     * @param int $id L'identifiant du post.
     * @param int $id_com L'identifiant du commentaire parent.
     */
    public function creerSousCommentaire($commentaire, $id, $id_com) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO commentaire (contenu_commentaire, date_commentaire, id_utilisateur, id_post, id_com) VALUES (:contenu_commentaire, now(), :id, :id_post, :id_com);');
        $query->execute([
            'contenu_commentaire' => $commentaire['contenu_commentaire'],
            'id' => $_SESSION['utilisateur']->id_utilisateur,
            'id_post' => $id,
            'id_com' => $id_com
        ]);
    }

    /**
     * Supprime un commentaire spécifié.
     *
     * @param int $idCommentaire L'identifiant du commentaire à supprimer.
     */
    public function supprimerCommentaire($idCommentaire) {
        $query = $this->connection->getPdo()->prepare('DELETE FROM commentaire WHERE id_commentaire = :id;');
        $query->execute([
            'id' => $idCommentaire
        ]);
    }

    /**
     * Modifie un commentaire spécifié.
     *
     * @param int $idCommentaire L'identifiant du commentaire à modifier.
     * @param array $commentaire Les nouvelles données du commentaire.
     */
    public function modifierCommentaire($idCommentaire, $commentaire) {
        $query = $this->connection->getPdo()->prepare('UPDATE commentaire SET contenu_commentaire = :contenu WHERE id_commentaire = :id');
        $query->execute([
            'id' => $idCommentaire,
            'contenu' => $commentaire['contenu_commentaire']
        ]);
    }

    /**
     * Obtient un commentaire par son identifiant.
     *
     * @param int $id L'identifiant du commentaire.
     * @return Commentaire|false Le commentaire correspondant ou False s'il n'existe pas.
     */
    public function commentaireParId($id) {
        $query = $this->connection->getPdo()->prepare('SELECT id_commentaire, contenu_commentaire, id_post, id_utilisateur FROM commentaire WHERE id_commentaire = :id');
        $query->execute([
            'id' => $id
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\Commentaire");
        return $query->fetch();
    }
}
