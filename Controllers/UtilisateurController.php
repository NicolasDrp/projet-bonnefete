<?php

namespace App\Controllers;

require_once 'Models/UtilisateurModel.php';
require_once 'Models/PostModel.php';

use App\Models\UtilisateurModel;
use App\Models\PostModel;


class UtilisateurController {
    protected $utilisateurModel;
    protected $postModel;

    public function __construct() {
        $this->utilisateurModel = new UtilisateurModel();
        $this->postModel = new PostModel();
    }

    public function getEnregistrer() {
        require_once 'Views/utilisateur/enregistrer.php';
    }

    public function postEnregistrer() {
        $utilisateur = $_POST;
        $message = $this->utilisateurModel->creerUtilisateur($utilisateur);
        echo $message;
        echo '<a href="../utilisateur/connexion">Se connecter</a>';
    }

    public function getConnexion() {
        require_once 'Views/utilisateur/connexion.php';
    }

    public function postConnexion() {
        $this->utilisateurModel = new UtilisateurModel();
        $utilisateur = $this->utilisateurModel->getOneByEmail($_POST['email']);
        if ($utilisateur && password_verify($_POST['password'], $utilisateur->password_utilisateur)) {
            $_SESSION['utilisateur'] = $utilisateur;
            header('Location: ../post/index');
        }
    }

    public function getLogout() {
        session_destroy();
        header('Location: ../utilisateur/connexion');
    }

    public function getDetails($id) {
        $utilisateur = $this->utilisateurModel->getUtilisateurParId($id);
        $posts = $this->postModel->getPostsUtilisateur($id);
        require_once 'Views/utilisateur/details.php';
    }

    public function getCompteUtilisateur() {
        require_once 'Views/utilisateur/compteUtilisateur.php';
    }

    public function getMaj($id_utilisateur) {
        $utilisateur = $this->utilisateurModel->getUtilisateurParId($id_utilisateur);
        require_once 'Views/utilisateur/maj.php';
    }

    public function postMaj($id) {
        $utilisateur = $_POST;
        // var_dump($utilisateur);
        $this->utilisateurModel->majUtilisateur($utilisateur);
        header('Location: ../../utilisateur/details/' . $id);
    }

    public function getSupprimer($id) {
        $this->utilisateurModel->supprimerUtilisateur($id);
        header('Location: ../../post/index');
    }

    public function getChangerModerateur($id) {
        $this->utilisateurModel->changerModerateur($id);
        header('Location: ../../utilisateur/details/' . $id);
    }

    public function getUtilisateurIndex() {
        echo ($_SESSION['utilisateur']->id_utilisateur);
        $utilisateurs = $this->utilisateurModel->getAllUtilisateur();
        $utilisateur = null;
        require_once 'Views/utilisateur/index.php';
    }
}
