<?php
namespace App\Models;

require_once 'Database.php';
require_once 'Models/Post.php';

use App\Database;

use PDO;

class PostModel{
    private $connection;
    
    public function __construct(){
        $this->connection = new Database();
    }

    public function getAllPost(){
        $query = $this->connection->getPdo()->prepare("SELECT id_post,contenu_post,date_post,id_utilisateur FROM post");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Post");
    }


    public function createPost($post){
        $query = $this->connection->getPdo()->prepare('INSERT INTO post (contenu_post,date_post,id_utilisateur) VALUES (:contenu_post, now(), 1);');
        $query->execute([
            'contenu_post' => $post['contenu_post']
        ]);
    }

    public function delete($id){
        $query = $this->connection->getPdo()->prepare('DELETE FROM post WHERE id_post = :id');
        $query->execute([
            'id' => $id
        ]);
    }
    
}