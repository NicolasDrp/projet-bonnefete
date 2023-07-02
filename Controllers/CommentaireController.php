<?php

namespace App\Controllers;

require_once 'Models/CommentaireModel.php';

use App\Models\Commentaire;
use App\Models\CommentaireModel;

class CommentaireController {
    protected $commentaireModel;

    public function __construct() {
        $this->commentaireModel = new CommentaireModel();
    }

    public function postCreer($id) {
        $commentaire = $_POST;
        $this->commentaireModel->creerCommentaire($commentaire, $id);
        header('Location: ../../post/details/' . $id);
    }

    public function postCreerSous($id, $id_com) {
        $commentaire = $_POST;
        $this->commentaireModel->creerSousCommentaire($commentaire, $id, $id_com);
        header('Location: ../../../post/details/' . $id);
    }

    public function getSupprimer($idCommentaire, $id_post) {
        $this->commentaireModel->supprimerCommentaire($idCommentaire);
        header('Location: ../../../post/details/' . $id_post);
    }

    public function getModifier($id_commentaire) {
        $commentaire = $this->commentaireModel->commentaireParId($id_commentaire);
        require_once 'Views/commentaires/maj.php';
    }

    public function postModifier($id) {
        $commentaire = $_POST;
        $id_post = $commentaire['id_post']; 
        $this->commentaireModel->modifierCommentaire($id,$commentaire);
        header('Location: ../../../projet-bonnefete/post/details/' . $id_post);
    }
}
