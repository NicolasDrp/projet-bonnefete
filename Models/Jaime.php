<?php

namespace App\Models;

class Jaime {
    private $id_jaime;
    private $id_post;
    private $id_utilisateur;
    private $id_commentaire;

    /**
     * Obtient l'identifiant du j'aime.
     *
     * @return int L'identifiant du j'aime.
     */
    public function getIdJaime() {
        return $this->id_jaime;
    }

    /**
     * Définit l'identifiant du j'aime.
     *
     * @param int $id_jaime L'identifiant du j'aime.
     */
    public function setIdJaime($id_jaime) {
        $this->id_jaime = $id_jaime;
    }

    /**
     * Obtient l'identifiant du post lié au j'aime.
     *
     * @return int L'identifiant du post.
     */
    public function getIdPost() {
        return $this->id_post;
    }

    /**
     * Définit l'identifiant du post lié au j'aime.
     *
     * @param int $id_post L'identifiant du post.
     */
    public function setIdPost($id_post) {
        $this->id_post = $id_post;
    }

    /**
     * Obtient l'identifiant de l'utilisateur lié au j'aime.
     *
     * @return int L'identifiant de l'utilisateur.
     */
    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    /**
     * Définit l'identifiant de l'utilisateur lié au j'aime.
     *
     * @param int $id_utilisateur L'identifiant de l'utilisateur.
     */
    public function setIdUtilisateur($id_utilisateur) {
        $this->id_utilisateur = $id_utilisateur;
    }

    /**
     * Obtient l'identifiant du commentaire lié au j'aime.
     *
     * @return int|null L'identifiant du commentaire, ou null s'il n'y en a pas.
     */
    public function getIdCommentaire() {
        return $this->id_commentaire;
    }

    /**
     * Définit l'identifiant du commentaire lié au j'aime.
     *
     * @param int|null $id_commentaire L'identifiant du commentaire, ou null s'il n'y en a pas.
     */
    public function setIdCommentaire($id_commentaire) {
        $this->id_commentaire = $id_commentaire;
    }
}
