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

    public function getIdLog() {
        return $this->id_log;
    }

    public function setIdLog($id_log) {
        $this->id_log = $id_log;
    }

    public function getAction() {
        return $this->action;
    }

    public function setAction($action) {
        $this->action = $action;
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

    public function getDateLog() {
        return $this->date_log;
    }

    public function setDateLog($date_log) {
        $this->date_log = $date_log;
    }
}
