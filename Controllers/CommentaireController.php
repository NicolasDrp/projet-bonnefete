<?php

namespace App\Controllers;

require_once 'Models/CommentaireModel.php';
require_once 'Models/LogModel.php';

use App\Models\CommentaireModel;
use App\Models\LogModel;

class CommentaireController {
    protected $commentaireModel;
    protected $logModel;

    public function __construct() {
        $this->commentaireModel = new CommentaireModel();
        $this->logModel = new LogModel();
    }

    public function postCreer($id) {
        $commentaire = $_POST;
        $this->commentaireModel->creerCommentaire($commentaire, $id);
        $this->logModel->creerLog('Viens de poster un commentaire sous le post', $id);
        header('Location: ../../post/details/' . $id);
    }

    public function postCreerSous($id, $id_com) {
        $commentaire = $_POST;
        $this->commentaireModel->creerSousCommentaire($commentaire, $id, $id_com);
        $this->logModel->creerLog('Viens de repondre à un commentaire sous le post', $id);
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
        $this->commentaireModel->modifierCommentaire($id, $commentaire);
        header('Location: ../../../projet-bonnefete/post/details/' . $id_post);
    }
}
