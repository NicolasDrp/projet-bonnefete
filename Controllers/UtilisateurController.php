<?php

namespace App\Controllers;

require_once 'Models/UtilisateurModel.php';

use App\Models\UtilisateurModel;

class UtilisateurController {
    protected $utilisateurModel;

    public function __construct() {
        $this->utilisateurModel = new UtilisateurModel();
    }

    public function getRegister() {
        require_once 'Views/utilisateur/register.php';
    }

    public function postRegister() {
        $utilisateur = $_POST;
        $message = $this->utilisateurModel->creerUtilisateur($utilisateur);
        echo $message;
        echo '<a href="../utilisateur/login">Se connecter</a>';
    }


    // public function supprimerRegister()
    // {
    //     $utilisateur = $_POST;
    //     $this->utilisateurModel->supprimerUtilisateur($utilisateur);

    // }

    public function getLogin()
    {
        require_once 'Views/utilisateur/login.php';
    }

    public function postLogin()
    {
        $this->utilisateurModel = new UtilisateurModel();
        $utilisateur = $this->utilisateurModel->getOneByEmail($_POST['email']);
        if ($utilisateur && password_verify($_POST['password'], $utilisateur->password_utilisateur)) {
            $_SESSION['utilisateur'] = $utilisateur;
            header('Location: ../post/index');
        }
    }

    public function getLogout()
    {
        session_destroy();
        header('Location: ../utilisateur/login');
    }

    public function getCompteUtilisateur()
    {
        require_once 'Views/utilisateur/compteUtilisateur.php';
    }

    public function getModify($id_utilisateur)
    {
        $utilisateur = $this->utilisateurModel->getUtilisateurById($id_utilisateur);
        require_once 'Views/utilisateur/modify.php';
    }

    public function getUtilisateurIndex()
    {
        echo ($_SESSION['utilisateur']->id_utilisateur);
        $utilisateurs = $this->utilisateurModel->getAllUtilisateur();
        $utilisateur = null;
        require_once 'Views/utilisateur/index.php';
    }
}
