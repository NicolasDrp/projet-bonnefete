<?php

namespace App\Models;

class Commentaire {
    private $id_commentaire;
    private $contenu_commentaire;
    private $id_utilisateur;
    private $id_post;
    private $id_com;
    private $date_commentaire;
    

    public function __construct() {
    }

    public function getIdCommentaire() {
        return $this->id_commentaire;
    }

    public function setIdCommentaire($id_commentaire) {
        $this->id_commentaire = $id_commentaire;
    }

    public function getContenuCommentaire() {
        return $this->contenu_commentaire;
    }

    public function setContenuCommentaire($contenu_commentaire) {
        $this->contenu_commentaire = $contenu_commentaire;
    }

    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur($id_utilisateur) {
        $this->id_utilisateur = $id_utilisateur;
    }

    public function getIdPost() {
        return $this->id_post;
    }

    public function setIdPost($id_post) {
        $this->id_post = $id_post;
    }

    public function getIdCom() {
        return $this->id_com;
    }

    public function setIdCom($id_com) {
        $this->id_com = $id_com;
    }

    public function getDateCommentaire(){
        return $this->date_commentaire;
    }

    public function setDateCommentaire($date_commentaire) {
        $this->date_commentaire = $date_commentaire;
    }
}
