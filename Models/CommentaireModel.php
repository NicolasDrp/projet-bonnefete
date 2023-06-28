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
}
