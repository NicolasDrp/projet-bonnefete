<?php

namespace App\Controllers;

require_once 'Models/UtilisateurModel.php';
require_once 'Models/PostModel.php';

use App\Models\UtilisateurModel;
use App\Models\PostModel;


class UtilisateurController
{
    protected $utilisateurModel;
    protected $postModel;

    public function __construct()
    {
        $this->utilisateurModel = new UtilisateurModel();
        $this->postModel = new PostModel();
    }

    // Affiche la page enregistrer
    public function getEnregistrer()
    {
        require_once 'Views/utilisateur/enregistrer.php';
    }

    // Traite les données à l'enregisrement d'un utilisateur
    public function postEnregistrer()
    {
        $utilisateur = $_POST;
        $message = $this->utilisateurModel->creerUtilisateur($utilisateur);
        echo $message;
        echo '<div class="container">
            <div class="row d-flex flex-row align-items-center justify-content-center">
            <a href="../utilisateur/connexion"><button class="btn btn-success btn-lg w-100"> Se connecter </button> </a>
            </div>
            </div>                ';
    }

    // Affiche la page connexion
    public function getConnexion()
    {
        require_once 'Views/utilisateur/connexion.php';
    }

    // Traitre les données à la connexion d'un utilisateur
    public function postConnexion()
    {
        $this->utilisateurModel = new UtilisateurModel();
        $utilisateur = $this->utilisateurModel->getOneByEmail($_POST['email']);
        if ($utilisateur && password_verify($_POST['password'], $utilisateur->password_utilisateur)) {
            $_SESSION['utilisateur'] = $utilisateur;
            header('Location: ../post/index');
        }
    }

    // Déconnecte l'utilisateur et le renvoie vers la page de connexion
    public function getLogout()
    {
        session_destroy();
        header('Location: ../utilisateur/connexion');
    }

    // Affiche les détails d'un utilisateur par rapport à son ID
    public function getDetails($id)
    {
        $utilisateur = $this->utilisateurModel->getUtilisateurParId($id);
        $posts = $this->postModel->getPostsUtilisateur($id);
        require_once 'Views/utilisateur/details.php';
    }

    // Affiche la page de compte utilisateur
    public function getCompteUtilisateur()
    {
        require_once 'Views/utilisateur/compteUtilisateur.php';
    }

    // Affiche la page de modification d'un utilisateur
    public function getMaj($id_utilisateur)
    {
        $utilisateur = $this->utilisateurModel->getUtilisateurParId($id_utilisateur);
        require_once 'Views/utilisateur/maj.php';
    }

    // Traite les données de modification d'un utilisateur
    public function postMaj($id)
    {
        $utilisateur = $_POST;
        var_dump($utilisateur);
        $this->utilisateurModel->majUtilisateur($utilisateur);
        header('Location: ../../utilisateur/details/' . $id);
    }

    // Affiche de la liste de tous les utilisateurs
    public function getUtilisateurIndex()
    {
        echo ($_SESSION['utilisateur']->id_utilisateur);
        $utilisateurs = $this->utilisateurModel->getAllUtilisateur();
        $utilisateur = null;
        require_once 'Views/utilisateur/index.php';
    }

    // Affiche les conditions d'utilisation
    public function getConditions()
    {
        require_once 'Views/conditions.php';
    }

    // Affiche l'envoie du mail de confirmation
    public function getMail()
    {
        require_once 'Views/utilisateur/mail.php';
    }

    // Affiche la page de vérification de l'email
    public function getEmailVerification()
    {
        require_once 'Views/utilisateur/emailVerification.php';
    }
    
    // Traite les données de vérification de l'email
    public function postEmailVerification() {
        $email = $_POST['email'];
        $utilisateur = $this->utilisateurModel->getOneByEmail($email);
        if ($utilisateur) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    
}
