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
        $this->jaimeModel = new JaimeModel();
        $this->logModel = new LogModel();
    }

    public function getajouterJaimePost($id) {
        $this->jaimeModel->ajouterJaimePost($id);
        $this->logModel->creerLog("Viens d'aimer le post", $id);
        header('Location: ../../post/details/' . $id);
    }

    public function getretirerJaimePost($id) {
        $this->jaimeModel->retirerJaimePost($id);
        $this->logModel->creerLog("Viens de retirer son j'aime sur le post", $id);
        header('Location: ../../post/details/' . $id);
    }

    public function getAjouterJaimeCommentaire($id, $id_post) {
        $this->jaimeModel->ajouterJaimeCommentaire($id, $id_post);
        $this->logModel->creerLog("Viens d'aimer un commentaire sous le post", $id_post);
        header('Location: ../../../post/details/' . $id_post);
    }

    public function getRetirerJaimeCommentaire($id, $id_post) {
        $this->jaimeModel->retirerJaimeCommentaire($id);
        $this->logModel->creerLog("Viens de retirer son j'aime d'un commentaire sur le post", $id_post);
        header('Location: ../../../post/details/' . $id_post);
    }
}
