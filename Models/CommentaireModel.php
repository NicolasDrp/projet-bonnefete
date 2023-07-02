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

    public function getAllCommentaire($id) {
        $query = $this->connection->getPdo()->prepare("SELECT id_commentaire,contenu_commentaire,commentaire.id_utilisateur,id_post,id_com,date_commentaire,nom_utilisateur,prenom_utilisateur FROM commentaire INNER JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id_utilisateur WHERE id_post = :id AND id_com IS NULL ;");
        $query->execute([
            'id' => $id
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Commentaire");
    }

    public function getAllSousCommentaire($id) {
        $query = $this->connection->getPdo()->prepare("SELECT id_commentaire,contenu_commentaire,commentaire.id_utilisateur,id_post,id_com,date_commentaire,nom_utilisateur,prenom_utilisateur FROM commentaire INNER JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id_utilisateur WHERE id_post = :id AND id_com IS NOT NULL ;");
        $query->execute([
            'id' => $id
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Commentaire");
    }

    public function creerCommentaire($commentaire, $id) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO commentaire (contenu_commentaire,date_commentaire,id_utilisateur,id_post) VALUES (:contenu_commentaire, now(), :id, :id_post);');
        $query->execute([
            'contenu_commentaire' => $commentaire['contenu_commentaire'],
            'id' => $_SESSION['utilisateur']->id_utilisateur,
            'id_post' => $id
        ]);
    }

    public function creerSousCommentaire($commentaire, $id, $id_com) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO commentaire (contenu_commentaire,date_commentaire,id_utilisateur,id_post,id_com) VALUES (:contenu_commentaire, now(), :id, :id_post, :id_com);');
        $query->execute([
            'contenu_commentaire' => $commentaire['contenu_commentaire'],
            'id' => $_SESSION['utilisateur']->id_utilisateur,
            'id_post' => $id,
            'id_com' => $id_com
        ]);
    }

    public function supprimerCommentaire($idCommentaire) {
        $query = $this->connection->getPdo()->prepare('DELETE FROM commentaire WHERE id_commentaire = :id;');
        $query->execute([
            'id' => $idCommentaire
        ]);
    }

    public function modifierCommentaire($idCommentaire, $commentaire) {
        $query = $this->connection->getPdo()->prepare('UPDATE commentaire SET contenu_commentaire = :contenu WHERE id_commentaire = :id');
        $query->execute([
            'id' => $idCommentaire,
            'contenu' => $commentaire['contenu_commentaire']
        ]);
    }


    public function commentaireParId($id) {
        $query = $this->connection->getPdo()->prepare('SELECT id_commentaire, contenu_commentaire,id_post FROM commentaire WHERE id_commentaire = :id');
        $query->execute([
            'id' => $id
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\Commentaire");
        return $query->fetch();
    }
}
