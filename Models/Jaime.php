<?php

namespace App\Models;

class Jaime {
    private $id_jaime;
    private $id_post;
    private $id_utilisateur;
    private $id_commentaire;


    public function getIdJaime() {
        return $this->id_jaime;
    }

    public function setIdJaime($id_jaime) {
        $this->id_jaime = $id_jaime;
    }

    public function getIdPost() {
        return $this->id_post;
    }

    public function setIdPost($id_post) {
        $this->id_post = $id_post;
    }

    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur($id_utilisateur) {
        $this->id_utilisateur = $id_utilisateur;
    }

    public function getIdCommentaire() {
        return $this->id_commentaire;
    }

    public function setIdCommentaire($id_commentaire) {
        $this->id_commentaire = $id_commentaire;
    }
}
