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
        // Instanciation des modèles nécessaires
        $this->commentaireModel = new CommentaireModel();
        $this->logModel = new LogModel();
    }

    public function postCreer($id) {
        // Récupérer les données du formulaire
        $commentaire = $_POST;
        // Appeler la méthode pour créer un commentaire dans le modèle CommentaireModel
        $this->commentaireModel->creerCommentaire($commentaire, $id);
        // Ajouter une entrée de log pour enregistrer l'action
        $this->logModel->creerLog('Viens de poster un commentaire sous le post', $id);
        // Rediriger vers la page de détails du post
        header('Location: ../../post/details/' . $id);
    }

    public function postCreerSous($id, $id_com) {
        // Récupérer les données du formulaire
        $commentaire = $_POST;
        // Appeler la méthode pour créer un sous-commentaire dans le modèle CommentaireModel
        $this->commentaireModel->creerSousCommentaire($commentaire, $id, $id_com);
        // Ajouter une entrée de log pour enregistrer l'action
        $this->logModel->creerLog('Viens de répondre à un commentaire sous le post', $id);
        // Rediriger vers la page de détails du post
        header('Location: ../../../post/details/' . $id);
    }

    public function getSupprimer($idCommentaire, $id_post) {
        // Appeler la méthode pour supprimer un commentaire dans le modèle CommentaireModel
        $this->commentaireModel->supprimerCommentaire($idCommentaire);
        // Ajouter une entrée de log pour enregistrer l'action
        $this->logModel->creerLog('Viens de supprimer un commentaire sous le post', $id_post);
        // Rediriger vers la page de détails du post
        header('Location: ../../../post/details/' . $id_post);
    }

    public function getModifier($id_commentaire) {
        // Récupérer le commentaire par son ID à partir du modèle CommentaireModel
        $commentaire = $this->commentaireModel->commentaireParId($id_commentaire);
        // Inclure la vue pour afficher le formulaire de mise à jour du commentaire
        require_once 'Views/commentaires/maj.php';
    }

    public function postModifier($id) {
        // Récupérer les données du formulaire
        $commentaire = $_POST;
        $id_post = $commentaire['id_post'];
        // Appeler la méthode pour modifier un commentaire dans le modèle CommentaireModel
        $this->commentaireModel->modifierCommentaire($id, $commentaire);
        // Ajouter une entrée de log pour enregistrer l'action
        $this->logModel->creerLog('Viens de mettre à jour un commentaire sous le post', $id);
        // Rediriger vers la page de détails du post
        header('Location: ../../../projet-bonnefete/post/details/' . $id_post);
    }
}
