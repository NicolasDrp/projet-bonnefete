<?php

namespace App\Controllers;

require_once 'Models/JaimeModel.php';

use App\Models\JaimeModel;

class JaimeController {
    protected $jaimeModel;

    public function __construct() {
        $this->jaimeModel = new JaimeModel();
    }

    public function getAjouterjaime($id) {
        $this->jaimeModel->ajouterjaime($id);
        header('Location: ../../post/details/' . $id);
    }

    public function getRetirerJaime($id) {
        $this->jaimeModel->retirerJaime($id);
        header('Location: ../../post/details/' . $id);
    }
}
