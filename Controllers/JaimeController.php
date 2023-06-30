<?php

namespace App\Controllers;

require_once 'Models/JaimeModel.php';

use App\Models\JaimeModel;

class JaimeController {
    protected $jaimeModel;

    public function __construct() {
        $this->jaimeModel = new JaimeModel();
    }

    public function getajouterJaimePost($id) {
        $this->jaimeModel->ajouterJaimePost($id);
        header('Location: ../../post/details/' . $id);
    }

    public function getretirerJaimePost($id) {
        $this->jaimeModel->retirerJaimePost($id);
        header('Location: ../../post/details/' . $id);
    }

    public function getAjouterJaimeCommentaire($id,$id_post) {
        $this->jaimeModel->ajouterJaimeCommentaire($id,$id_post);
        header('Location: ../../../post/details/' . $id_post);
    }

    public function getRetirerJaimeCommentaire($id, $id_post) {
        $this->jaimeModel->retirerJaimeCommentaire($id);
        header('Location: ../../../post/details/' . $id_post);
    }
}
