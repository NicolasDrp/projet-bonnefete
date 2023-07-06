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

    /**
     * Récupère tous les posts.
     *
     * @return array Les posts récupérés.
     */
    public function getAllPost() {
        $query = $this->connection->getPdo()->prepare("SELECT id_post,contenu_post,date_post,post.id_utilisateur,nom_utilisateur,prenom_utilisateur,id_image FROM post INNER JOIN utilisateur ON post.id_utilisateur = utilisateur.id_utilisateur ORDER BY date_post DESC;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Post");
    }

    /**
     * Crée un nouveau post.
     *
     * @param array $post Les données du post.
     */
    public function creerPost($post) {
        $query = $this->connection->getPdo()->prepare('INSERT INTO post (contenu_post,date_post,id_utilisateur) VALUES (:contenu_post, now(), :id);');
        $query->execute([
            'contenu_post' => $post['contenu_post'],
            'id' => $_SESSION['utilisateur']->id_utilisateur
        ]);
    }

    /**
     * Crée un nouveau post avec une image.
     *
     * @param array $fichier Les données du fichier image.
     * @param array $post Les données du post.
     */
    public function creerPostImage($fichier, $post) {
        $nomFichier = $fichier['image']['name'];
        $typeFichier = $fichier['image']['type'];
        $tailleFichier = $fichier['image']['size'];
        $tmpFichier = $fichier['image']['tmp_name'];
        $errFichier = $fichier['image']['error'];

        // Extensions
        $extensions = ['png', 'jpg', 'jpeg', 'gif'];
        // Type d'image
        $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
        // On récupère
        $extension = explode('.', $nomFichier);
        // Max size
        $taille_max = 1000000;


        // On vérifie que le type est autorisés
        if (in_array($typeFichier, $type)) {
            // On vérifie que il n'y a que deux extensions
            if (count($extension) <= 2 && in_array(strtolower(end($extension)), $extensions)) {
                // On vérifie le poids de l'image
                if ($tailleFichier < $taille_max && $errFichier == 0) {
                    // On bouge l'image uploadé dans le dossier upload
                    $idImage = uniqid() . '.' . strtolower(end($extension));
                    if (move_uploaded_file($tmpFichier, './image/' . $idImage)) {
                        echo "Post Envoyé !";
                        $query = $this->connection->getPdo()->prepare('INSERT INTO post (contenu_post,date_post,id_utilisateur,id_image) VALUES (:contenu_post, now(), :id,:id_image);');
                        $query->execute([
                            'contenu_post' => $post['contenu_post'],
                            'id' => $_SESSION['utilisateur']->id_utilisateur,
                            'id_image' => $idImage
                        ]);
                        echo "<a href='../post/index' > Retour à l'accueil </a>";
                    } else {
                        echo "Une erreur est survenue";
                        echo "<a href='../post/index' > Retour à l'accueil </a>";
                    }
                } else {
                    echo "Fichier trop lourd ou format incorrect";
                    echo "<a href='../post/index' > Retour à l'accueil </a>";
                }
            } else {
                echo "Extension échoué";
                echo "<a href='../post/index' > Retour à l'accueil </a>";
            }
        } else {
            echo "Type non autorisé";
            echo "<a href='../post/index' > Retour à l'accueil </a>";
        }
    }

    /**
     * Supprime un post.
     *
     * @param int $id L'identifiant du post à supprimer.
     */
    public function supprimer($id) {
        $query = $this->connection->getPdo()->prepare('DELETE FROM post WHERE id_post = :id');
        $query->execute([
            'id' => $id
        ]);
    }

    /**
     * Met à jour un post.
     *
     * @param int $id L'identifiant du post à mettre à jour.
     * @param array $post Les données du post mis à jour.
     */
    public function majPost($id, $post) {
        $query = $this->connection->getPdo()->prepare('UPDATE post SET contenu_post = :contenu WHERE id_post = :id');
        $query->execute([
            'id' => $id,
            'contenu' => $post['contenu_post']
        ]);
    }


    /**
     * Met à jour un post avec une image.
     *
     * @param int $id_post L'identifiant du post à mettre à jour.
     * @param array $fichier Les données du fichier image.
     * @param array $post Les données du post mis à jour.
     */
    public function majPostImage($id_post, $fichier, $post) {
        $nomFichier = $fichier['image']['name'];
        $typeFichier = $fichier['image']['type'];
        $tailleFichier = $fichier['image']['size'];
        $tmpFichier = $fichier['image']['tmp_name'];
        $errFichier = $fichier['image']['error'];

        // Extensions
        $extensions = ['png', 'jpg', 'jpeg', 'gif'];
        // Type d'image
        $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
        // On récupère
        $extension = explode('.', $nomFichier);
        // Max size
        $taille_max = 1000000;


        // On vérifie que le type est autorisés
        if (in_array($typeFichier, $type)) {
            // On vérifie que il n'y a que deux extensions
            if (count($extension) <= 2 && in_array(strtolower(end($extension)), $extensions)) {
                // On vérifie le poids de l'image
                if ($tailleFichier < $taille_max && $errFichier == 0) {
                    // On bouge l'image uploadé dans le dossier upload
                    $idImage = uniqid() . '.' . strtolower(end($extension));
                    if (move_uploaded_file($tmpFichier, './image/' . $idImage)) {
                        echo "Post Envoyé !";
                        $query = $this->connection->getPdo()->prepare('UPDATE post SET contenu_post = :contenu_post,id_image = :id_image WHERE id_post = :id_post;');
                        $query->execute([
                            'contenu_post' => $post['contenu_post'],
                            'id_image' => $idImage,
                            'id_post' => $id_post
                        ]);
                        echo "<a href='../post/index' > Retour à l'accueil </a>";
                    } else {
                        echo "Une erreur est survenue";
                        echo "<a href='../post/index' > Retour à l'accueil </a>";
                    }
                } else {
                    echo "Fichier trop lourd ou format incorrect";
                    echo "<a href='../post/index' > Retour à l'accueil </a>";
                }
            } else {
                echo "Extension échoué";
                echo "<a href='../post/index' > Retour à l'accueil </a>";
            }
        } else {
            echo "Type non autorisé";
            echo "<a href='../post/index' > Retour à l'accueil </a>";
        }
    }

    /**
     * Récupère un post par son identifiant.
     *
     * @param int $id L'identifiant du post.
     * @return Post Le post récupéré.
     */
    public function getPostParId($id) {
        $query = $this->connection->getPdo()->prepare('SELECT id_post,contenu_post,date_post,post.id_utilisateur,nom_utilisateur,prenom_utilisateur,id_image FROM post INNER JOIN utilisateur ON post.id_utilisateur = utilisateur.id_utilisateur WHERE id_post = :id');
        $query->execute([
            'id' => $id
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\Post");
        return $query->fetch();
    }

    /**
     * Récupère les posts d'un utilisateur.
     *
     * @param int $id L'identifiant de l'utilisateur.
     * @return array Les posts de l'utilisateur.
     */
    public function getPostsUtilisateur($id) {
        $query = $this->connection->getPdo()->prepare('SELECT id_post,contenu_post,date_post,id_utilisateur,id_image FROM post WHERE id_utilisateur = :id ORDER BY date_post DESC');
        $query->execute([
            'id' => $id
        ]);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Post");
    }
}
