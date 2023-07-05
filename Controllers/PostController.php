<?php

namespace App\Controllers;

require_once 'Models/PostModel.php';
require_once 'Models/CommentaireModel.php';
require_once 'Models/JaimeModel.php';
require_once 'Models/LogModel.php';

use App\Models\PostModel;
use App\Models\CommentaireModel;
use App\Models\JaimeModel;
use App\Models\LogModel;

class PostController {
    protected $postModel;
    protected $commentaireModel;
    protected $jaimeModel;
    protected $logModel;

    public function __construct() {
        // Instanciation des modèles nécessaires
        $this->postModel = new PostModel();
        $this->commentaireModel = new CommentaireModel();
        $this->jaimeModel = new JaimeModel();
        $this->logModel = new LogModel();
    }

    public function getIndex() {
        // Récupérer tous les posts à partir du modèle PostModel
        $posts = $this->postModel->getAllPost();
        $post = null;
        // Inclure la vue pour afficher les posts
        require_once 'Views/posts/index.php';
    }

    public function postCreer() {
        // Vérifier si une image a été téléchargée avec le post
        if (!empty($_FILES['image']) && $_FILES['image']['error'] != 4) {
            $fichier = $_FILES;
            $post = $_POST;
            // Appeler la méthode pour créer un post avec une image dans le modèle PostModel
            $this->postModel->creerPostImage($fichier, $post);
        } else {
            $post = $_POST;
            // Appeler la méthode pour créer un post dans le modèle PostModel
            $this->postModel->creerPost($post);
            header('Location: ../post/index');
        }
        // Ajouter une entrée de log pour enregistrer l'action
        $this->logModel->creerLog('Viens de publier un post', NULL);
    }

    public function getSupprimer($id) {
        // Appeler la méthode pour supprimer un post dans le modèle PostModel
        $this->postModel->supprimer($id);
        // Ajouter une entrée de log pour enregistrer l'action
        $this->logModel->creerLog('Viens de supprimer un post', $id);
        // Rediriger vers la page d'index des posts
        header('Location: ../../post/index');
    }

    public function getMaj($id) {
        // Récupérer le post par son identifiant à partir du modèle PostModel
        $post = $this->postModel->getPostParId($id);
        // Inclure la vue pour afficher le formulaire de mise à jour du post
        require_once 'Views/posts/creer.php';
    }

    public function postMaj($id) {
        // Vérifier si une image a été téléchargée avec la mise à jour du post
        if (!empty($_FILES['image']) && $_FILES['image']['error'] != 4) {
            $fichier = $_FILES;
            $post = $_POST;
            // Appeler la méthode pour mettre à jour un post avec une image dans le modèle PostModel
            $this->postModel->majPostImage($id, $fichier, $post);
        } else {
            $post = $_POST;
            // Appeler la méthode pour mettre à jour un post dans le modèle PostModel
            $this->postModel->majPost($id, $post);
            header('Location: ../post/index');
        }

        // Ajouter une entrée de log pour enregistrer l'action
        $this->logModel->creerLog('Viens de mettre à jour un post', $id);
        // Rediriger vers la page d'index des posts
        header('Location: ../../post/index');
    }

    public function getDetails($id) {
        // Récupérer le post par son identifiant à partir du modèle PostModel
        $post = $this->postModel->getPostParId($id);
        // Récupérer tous les commentaires associés à ce post à partir du modèle CommentaireModel
        $commentaires = $this->commentaireModel->getAllCommentaire($id);
        // Récupérer tous les sous-commentaires associés à ce post à partir du modèle CommentaireModel
        $sousCommentaires = $this->commentaireModel->getAllSousCommentaire($id);
        // Récupérer le nombre de "j'aime" pour ce post à partir du modèle JaimeModel
        $nbrJaimePost = $this->jaimeModel->getNbrJaimePost($id);
        // Récupérer le nombre de "j'aime" pour les commentaires de ce post à partir du modèle JaimeModel
        $nbrJaimeCommentaire = $this->jaimeModel->getNbrJaimeCommentaire($id);
        // Vérifier si l'utilisateur a déjà aimé ce post à partir du modèle JaimeModel
        $estAimePost = $this->jaimeModel->estAimePost($id);
        // Vérifier si l'utilisateur a déjà aimé les commentaires de ce post à partir du modèle JaimeModel
        $estAimeCommentaires = $this->jaimeModel->estAimeCommentaire($id);
        // Récupérer les noms des utilisateurs qui ont aimé ce post à partir du modèle JaimeModel
        $nomsJaime = $this->jaimeModel->getNomJaime($id);
        // Inclure la vue pour afficher les détails du post
        require_once 'Views/posts/details.php';
    }
}
