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

    public function getAll($id) {
        $query = $this->connection->getPdo()->prepare("SELECT id_commentaire,contenu_commentaire,commentaire.id_utilisateur,id_post,id_com,date_commentaire,nom_utilisateur,prenom_utilisateur FROM commentaire INNER JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id_utilisateur WHERE id_post = :id;");
        $query->execute([
            'id' => $id
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Commentaire");
    }

    public function createCommentaire($commentaire, $id) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO commentaire (contenu_commentaire,date_commentaire,id_utilisateur,id_post) VALUES (:contenu_commentaire, now(), :id, :id_post);');
        $query->execute([
            'contenu_commentaire' => $commentaire['contenu_commentaire'],
            'id' => $_SESSION['user']->id_utilisateur,
            'id_post' => $id
        ]);
    }

    public function deleteCommentaire($idCommentaire) {
        $query = $this->connection->getPdo()->prepare('DELETE FROM commentaire WHERE id_commentaire = :id;');
        $query->execute([
            'id' => $idCommentaire
        ]);
    }
}
