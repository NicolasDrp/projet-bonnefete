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

    /**
     * Obtient l'identifiant du post.
     *
     * @return int L'identifiant du post.
     */
    public function getIdPost() {
        return $this->id_post;
    }

    /**
     * Définit l'identifiant du post.
     *
     * @param int $idPost L'identifiant du post.
     */
    public function setIdPost($idPost) {
        $this->id_post = $idPost;
    }

    /**
     * Obtient le contenu du post.
     *
     * @return string Le contenu du post.
     */
    public function getContenuPost() {
        return $this->contenu_post;
    }

    /**
     * Définit le contenu du post.
     *
     * @param string $contenuPost Le contenu du post.
     */
    public function setContenuPost($contenuPost) {
        $this->contenu_post = $contenuPost;
    }

    /**
     * Obtient la date du post.
     *
     * @return string La date du post.
     */
    public function getDatePost() {
        return $this->date_post;
    }

    /**
     * Définit la date du post.
     *
     * @param string $datePost La date du post.
     */
    public function setDatePost($datePost) {
        $this->date_post = $datePost;
    }

    /**
     * Obtient l'identifiant de l'utilisateur associé au post.
     *
     * @return int L'identifiant de l'utilisateur.
     */
    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    /**
     * Définit l'identifiant de l'utilisateur associé au post.
     *
     * @param int $idUtilisateur L'identifiant de l'utilisateur.
     */
    public function setIdUtilisateur($idUtilisateur) {
        $this->id_utilisateur = $idUtilisateur;
    }

    /**
     * Obtient l'identifiant de l'image associée au post.
     *
     * @return int|null L'identifiant de l'image, ou null s'il n'y en a pas.
     */
    public function getIdImage() {
        return $this->id_image;
    }

    /**
     * Définit l'identifiant de l'image associée au post.
     *
     * @param int|null $idImage L'identifiant de l'image, ou null s'il n'y en a pas.
     */
    public function setIdImage($idImage) {
        $this->id_image = $idImage;
    }
}
