<?php

namespace App\Models;

class Log {
    private $id_log;
    private $action;
    private $id_utilisateur;
    private $id_post;
    private $date_log;

    public function __construct() {
    }

    /**
     * Obtient l'identifiant du log.
     *
     * @return int L'identifiant du log.
     */
    public function getIdLog() {
        return $this->id_log;
    }

    /**
     * Définit l'identifiant du log.
     *
     * @param int $id_log L'identifiant du log.
     */
    public function setIdLog($id_log) {
        $this->id_log = $id_log;
    }

    /**
     * Obtient l'action du log.
     *
     * @return string L'action du log.
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * Définit l'action du log.
     *
     * @param string $action L'action du log.
     */
    public function setAction($action) {
        $this->action = $action;
    }

    /**
     * Obtient l'identifiant de l'utilisateur lié au log.
     *
     * @return int L'identifiant de l'utilisateur.
     */
    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    /**
     * Définit l'identifiant de l'utilisateur lié au log.
     *
     * @param int $id_utilisateur L'identifiant de l'utilisateur.
     */
    public function setIdUtilisateur($id_utilisateur) {
        $this->id_utilisateur = $id_utilisateur;
    }

    /**
     * Obtient l'identifiant du post lié au log.
     *
     * @return int|null L'identifiant du post, ou null s'il n'y en a pas.
     */
    public function getIdPost() {
        return $this->id_post;
    }

    /**
     * Définit l'identifiant du post lié au log.
     *
     * @param int|null $id_post L'identifiant du post, ou null s'il n'y en a pas.
     */
    public function setIdPost($id_post) {
        $this->id_post = $id_post;
    }

    /**
     * Obtient la date du log.
     *
     * @return string La date du log.
     */
    public function getDateLog() {
        return $this->date_log;
    }

    /**
     * Définit la date du log.
     *
     * @param string $date_log La date du log.
     */
    public function setDateLog($date_log) {
        $this->date_log = $date_log;
    }
}
