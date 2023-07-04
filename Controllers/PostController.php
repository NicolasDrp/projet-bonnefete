<?php

namespace App\Controllers;

require_once 'Models/PostModel.php';
require_once 'Models/CommentaireModel.php';
require_once 'Models/JaimeModel.php';


use App\Models\PostModel;
use App\Models\CommentaireModel;
use App\Models\JaimeModel;


class PostController {
    protected $postModel;
    protected $commentaireModel;
    protected $jaimeModel;

    public function __construct() {
        $this->postModel = new PostModel();
        $this->commentaireModel = new CommentaireModel();
        $this->jaimeModel = new JaimeModel();
    }

    public function getIndex() {
        $posts = $this->postModel->getAllPost();
        $post = null;
        require_once 'Views/posts/index.php';
    }

    public function postCreer() {
        if (!empty($_FILES['image']) && $_FILES['image']['error'] != 4) {
            $fichier = $_FILES;
            $post = $_POST;
            $this->postModel->creerPostImage($fichier, $post);
        } else {
            $post = $_POST;
            $this->postModel->creerPost($post);
            header('Location: ../post/index');
        }
    }

    public function getSupprimer($id) {
        $this->postModel->supprimer($id);
        header('Location: ../../post/index');
    }

    public function getMaj($id) {
        $post = $this->postModel->getPostParId($id);
        require_once 'Views/posts/creer.php';
    }

    public function postMaj($id) {
        $post = $_POST;
        $this->postModel->majPost($id, $post);
        header('Location: ../../post/index');
    }

    public function getDetails($id) {
        $post = $this->postModel->getPostParId($id);
        $commentaires = $this->commentaireModel->getAllCommentaire($id);
        $sousCommentaires = $this->commentaireModel->getAllSousCommentaire($id);
        $nbrJaimePost = $this->jaimeModel->getNbrJaimePost($id);
        $nbrJaimeCommentaire = $this->jaimeModel->getNbrJaimeCommentaire($id);
        $estAimePost = $this->jaimeModel->estAimePost($id);
        $estAimeCommentaires = $this->jaimeModel->estAimeCommentaire($id);
        $nomsJaime = $this->jaimeModel->getNomJaime($id);
        require_once 'Views/posts/details.php';
    }
}
