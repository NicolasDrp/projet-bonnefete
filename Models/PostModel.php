<?php

namespace App\Models;

require_once 'Database.php';
require_once 'Models/Post.php';

use App\Database;

use PDO;

class PostModel {
    private $connection;

    public function __construct() {
        $this->connection = new Database();
    }

    public function getAllPost() {
        $query = $this->connection->getPdo()->prepare("SELECT id_post,contenu_post,date_post,post.id_utilisateur,nom_utilisateur,prenom_utilisateur FROM post INNER JOIN utilisateur ON post.id_utilisateur = utilisateur.id_utilisateur;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Post");
    }


    public function creerPost($post) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO post (contenu_post,date_post,id_utilisateur) VALUES (:contenu_post, now(), :id);');
        $query->execute([
            'contenu_post' => $post['contenu_post'],
            'id' => $_SESSION['utilisateur']->id_utilisateur
        ]);
    }

    public function supprimer($id) {
        $query = $this->connection->getPdo()->prepare('DELETE FROM post WHERE id_post = :id');
        $query->execute([
            'id' => $id
        ]);
    }

    public function majPost($id, $post) {
        $query = $this->connection->getPdo()->prepare('UPDATE post SET contenu_post = :contenu WHERE id_post = :id');
        $query->execute([
            'id' => $id,
            'contenu' => $post['contenu_post']
        ]);
    }

    public function getPostParId($id) {
        $query = $this->connection->getPdo()->prepare('SELECT id_post,contenu_post,date_post,post.id_utilisateur,nom_utilisateur,prenom_utilisateur FROM post INNER JOIN utilisateur ON post.id_utilisateur = utilisateur.id_utilisateur WHERE id_post = :id');
        $query->execute([
            'id' => $id
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\Post");
        return $query->fetch();
    }

    public function getPostsUtilisateur($id) {
        $query = $this->connection->getPdo()->prepare('SELECT id_post,contenu_post,date_post,id_utilisateur FROM post WHERE id_utilisateur = :id');
        $query->execute([
            'id' => $id
        ]);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Post");
    }
}
