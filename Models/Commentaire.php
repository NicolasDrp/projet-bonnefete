<?php

namespace App\Models;

class Commentaire {
    private $id_commentaire;
    private $contenu_commentaire;
    private $id_utilisateur;
    private $id_post;
    private $id_com;
    private $date_commentaire;

    /**
     * Constructeur de la classe Commentaire.
     */
    public function __construct() {
        // Constructeur par défaut de la classe Commentaire
    }

    /**
     * Obtient l'identifiant du commentaire.
     *
     * @return int L'identifiant du commentaire.
     */
    public function getIdCommentaire() {
        return $this->id_commentaire;
    }

    /**
     * Définit l'identifiant du commentaire.
     *
     * @param int $id_commentaire L'identifiant du commentaire.
     */
    public function setIdCommentaire($id_commentaire) {
        $this->id_commentaire = $id_commentaire;
    }

    /**
     * Obtient le contenu du commentaire.
     *
     * @return string Le contenu du commentaire.
     */
    public function getContenuCommentaire() {
        return $this->contenu_commentaire;
    }

    /**
     * Définit le contenu du commentaire.
     *
     * @param string $contenu_commentaire Le contenu du commentaire.
     */
    public function setContenuCommentaire($contenu_commentaire) {
        $this->contenu_commentaire = $contenu_commentaire;
    }

    /**
     * Obtient l'identifiant de l'utilisateur lié au commentaire.
     *
     * @return int L'identifiant de l'utilisateur.
     */
    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    /**
     * Définit l'identifiant de l'utilisateur lié au commentaire.
     *
     * @param int $id_utilisateur L'identifiant de l'utilisateur.
     */
    public function setIdUtilisateur($id_utilisateur) {
        $this->id_utilisateur = $id_utilisateur;
    }

    /**
     * Obtient l'identifiant du post lié au commentaire.
     *
     * @return int L'identifiant du post.
     */
    public function getIdPost() {
        return $this->id_post;
    }

    /**
     * Définit l'identifiant du post lié au commentaire.
     *
     * @param int $id_post L'identifiant du post.
     */
    public function setIdPost($id_post) {
        $this->id_post = $id_post;
    }

    /**
     * Obtient l'identifiant du commentaire parent.
     *
     * @return int|null L'identifiant du commentaire parent, ou null s'il n'y en a pas.
     */
    public function getIdCom() {
        return $this->id_com;
    }

    /**
     * Définit l'identifiant du commentaire parent.
     *
     * @param int|null $id_com L'identifiant du commentaire parent, ou null s'il n'y en a pas.
     */
    public function setIdCom($id_com) {
        $this->id_com = $id_com;
    }

    /**
     * Obtient la date du commentaire.
     *
     * @return string La date du commentaire.
     */
    public function getDateCommentaire() {
        return $this->date_commentaire;
    }

    /**
     * Définit la date du commentaire.
     *
     * @param string $date_commentaire La date du commentaire.
     */
    public function setDateCommentaire($date_commentaire) {
        $this->date_commentaire = $date_commentaire;
    }
}
