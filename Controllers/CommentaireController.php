<?php

namespace App\Controllers;

require_once 'Models/CommentaireModel.php';

use App\Models\CommentaireModel;

class CommentaireController {
    protected $commentaireModel;

    public function __construct() {
        $this->commentaireModel = new CommentaireModel();
    }

    public function postCreate($id) {
        $commentaire = $_POST;
        $this->commentaireModel->createCommentaire($commentaire, $id);
        header('Location: ../../post/details/' . $id);
    }

    public function postCreateSous($id,$id_com) {
        $commentaire = $_POST;
        $this->commentaireModel->createSousCommentaire($commentaire, $id,$id_com);
        header('Location: ../../../post/details/' . $id);
    }

    public function getDelete($idCommentaire, $idPost) {
        $this->commentaireModel->deleteCommentaire($idCommentaire);
        header('Location: ../../../post/details/' . $idPost);
    }
}
