<?php

namespace App\Controllers;

require_once 'Models/JaimeModel.php';
require_once 'Models/LogModel.php';

use App\Models\JaimeModel;
use App\Models\LogModel;

class JaimeController {
    protected $jaimeModel;
    protected $logModel;

    public function __construct() {
        // Instanciation des modèles nécessaires
        $this->jaimeModel = new JaimeModel();
        $this->logModel = new LogModel();
    }

    public function getajouterJaimePost($id) {
        // Appeler la méthode pour ajouter un j'aime au post dans le modèle JaimeModel
        $this->jaimeModel->ajouterJaimePost($id);
        // Ajouter une entrée de log pour enregistrer l'action
        $this->logModel->creerLog("Viens d'aimer le post", $id);
        // Rediriger vers la page de détails du post
        header('Location: ../../post/details/' . $id);
    }

    public function getretirerJaimePost($id) {
        // Appeler la méthode pour retirer un j'aime du post dans le modèle JaimeModel
        $this->jaimeModel->retirerJaimePost($id);
        // Ajouter une entrée de log pour enregistrer l'action
        $this->logModel->creerLog("Viens de retirer son j'aime sur le post", $id);
        // Rediriger vers la page de détails du post
        header('Location: ../../post/details/' . $id);
    }

    public function getAjouterJaimeCommentaire($id, $id_post) {
        // Appeler la méthode pour ajouter un j'aime à un commentaire dans le modèle JaimeModel
        $this->jaimeModel->ajouterJaimeCommentaire($id, $id_post);
        // Ajouter une entrée de log pour enregistrer l'action
        $this->logModel->creerLog("Viens d'aimer un commentaire sous le post", $id_post);
        // Rediriger vers la page de détails du post
        header('Location: ../../../post/details/' . $id_post);
    }

    public function getRetirerJaimeCommentaire($id, $id_post) {
        // Appeler la méthode pour retirer un j'aime d'un commentaire dans le modèle JaimeModel
        $this->jaimeModel->retirerJaimeCommentaire($id);
        // Ajouter une entrée de log pour enregistrer l'action
        $this->logModel->creerLog("Viens de retirer son j'aime d'un commentaire sur le post", $id_post);
        // Rediriger vers la page de détails du post
        header('Location: ../../../post/details/' . $id_post);
    }
}
