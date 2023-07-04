<?php

namespace App\Models;

class Post {

    private $id_post;
    private $contenu_post;
    private $date_post;
    private $id_utilisateur;
    private $id_image;

    public function __construct() {
    }

    public function getIdPost() {
        return $this->id_post;
    }

    public function setIdPost($idPost) {
        $this->id_post = $idPost;
    }

    public function getContenuPost() {
        return $this->contenu_post;
    }

    public function setContenuPost($contenuPost) {
        $this->contenu_post = $contenuPost;
    }

    public function getDatePost() {
        return $this->date_post;
    }

    public function setDatePost($datePost) {
        $this->date_post = $datePost;
    }

    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur($idUtilisateur) {
        $this->id_utilisateur = $idUtilisateur;
    }

    public function getIdImage(){
        return $this->id_image;
    }

    public function setIdImage($idImage){
        $this->id_image = $idImage;
    }
}
