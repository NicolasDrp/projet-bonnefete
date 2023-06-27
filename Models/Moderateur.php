<?php

namespace App\Models;

class Moderateur {
    private $id_moderateur;
    private $id_utilisateur;

    public function __construct() {
    }

    public function getIdModerateur() {
        return $this->id_moderateur;
    }

    public function setIdModerateur($id) {
        $this->id_moderateur = $id;
    }
    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur($id) {
        $this->id_utilisateur = $id;
    }
}
