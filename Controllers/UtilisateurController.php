<?php

namespace App\Controllers;

require_once 'Models/UtilisateurModel.php';
require_once 'Models/PostModel.php';
require_once 'Models/LogModel.php';

use App\Models\UtilisateurModel;
use App\Models\PostModel;
use App\Models\LogModel;


class UtilisateurController {
    protected $utilisateurModel;
    protected $postModel;
    protected $logModel;

    public function __construct() {
        // Instanciation des modèles nécessaires
        $this->utilisateurModel = new UtilisateurModel();
        $this->postModel = new PostModel();
        $this->logModel = new LogModel();
    }

    public function getEnregistrer() {
        // Afficher la vue pour l'enregistrement d'un utilisateur
        require_once 'Views/utilisateur/enregistrer.php';
    }

    public function postEnregistrer() {
        // Récupérer les données de l'utilisateur à partir de la requête POST
        $utilisateur = $_POST;
        // Appeler la méthode pour créer un nouvel utilisateur dans le modèle UtilisateurModel
        $message = $this->utilisateurModel->creerUtilisateur($utilisateur);
        echo $message;
        echo '<a href="../utilisateur/connexion">Se connecter</a>';
        // Si l'enregistrement s'est bien passé, ajouter une entrée de log pour enregistrer l'action
        if ($message == 'Bien Enregistré') {
            $this->logModel->creerLogInscription("Un utilisateur vient de s'inscrire", NULL);
        }
    }

    public function getConnexion() {
        // Afficher la vue pour la connexion de l'utilisateur
        require_once 'Views/utilisateur/connexion.php';
    }

    public function postConnexion() {
        $this->utilisateurModel = new UtilisateurModel();
        // Récupérer l'utilisateur à partir de son adresse e-mail en utilisant le modèle UtilisateurModel
        $utilisateur = $this->utilisateurModel->getOneByEmail($_POST['email']);
        // Vérifier si le mot de passe correspond à celui enregistré dans la base de données en utilisant la fonction password_verify()
        if ($utilisateur && password_verify($_POST['password'], $utilisateur->password_utilisateur)) {
            // Stocker l'utilisateur dans la session
            $_SESSION['utilisateur'] = $utilisateur;
            // Ajouter une entrée de log pour enregistrer l'action
            $this->logModel->creerLog('Vient de se connecter', NULL);
            // Rediriger vers la page d'index des posts
            header('Location: ../post/index');
        } else {
            echo 'Mot de passe ou Identifiants incorrect';
            echo '<a href="../utilisateur/connexion">Se connecter</a>';
        }
    }

    public function getLogout() {
        // Détruire la session de l'utilisateur
        session_destroy();
        // Rediriger vers la page de connexion
        header('Location: ../utilisateur/connexion');
    }

    public function getDetails($id) {
        // Récupérer l'utilisateur par son identifiant à partir du modèle UtilisateurModel
        $utilisateur = $this->utilisateurModel->getUtilisateurParId($id);
        // Récupérer les posts de l'utilisateur à partir du modèle PostModel
        $posts = $this->postModel->getPostsUtilisateur($id);
        // Afficher la vue pour afficher les détails de l'utilisateur
        require_once 'Views/utilisateur/details.php';
    }

    public function getCompteUtilisateur() {
        // Afficher la vue pour le compte de l'utilisateur
        require_once 'Views/utilisateur/compteUtilisateur.php';
    }

    public function getMaj($id_utilisateur) {
        // Récupérer l'utilisateur par son identifiant à partir du modèle UtilisateurModel
        $utilisateur = $this->utilisateurModel->getUtilisateurParId($id_utilisateur);
        // Afficher la vue pour la mise à jour des informations de l'utilisateur
        require_once 'Views/utilisateur/maj.php';
    }

    public function postMaj($id) {
        // Récupérer les nouvelles informations de l'utilisateur à partir de la requête POST
        $utilisateur = $_POST;
        // Appeler la méthode pour mettre à jour l'utilisateur dans le modèle UtilisateurModel
        $this->utilisateurModel->majUtilisateur($utilisateur);
        // Récupérer l'utilisateur mis à jour à partir du modèle UtilisateurModel
        $utilisateurSession = $this->utilisateurModel->getOneByEmail($utilisateur['email']);
        // Mettre à jour l'utilisateur dans la session
        $_SESSION['utilisateur'] = $utilisateurSession;
        // Ajouter une entrée de log pour enregistrer l'action
        $this->logModel->creerLog('Vient de mettre son profil à jour', NULL);
        // Rediriger vers la page des détails de l'utilisateur
        header('Location: ../../utilisateur/details/' . $id);
    }

    public function getSupprimer($id) {
        // Supprimer l'utilisateur par son identifiant à partir du modèle UtilisateurModel
        $this->utilisateurModel->supprimerUtilisateur($id);
        // Ajouter une entrée de log pour enregistrer l'action
        $this->logModel->creerLog("Vient de supprimer un utilisateur", NULL);
        // Rediriger vers la page d'index des posts
        header('Location: ../../post/index');
    }

    public function getChangerModerateur($id) {
        // Changer le rôle de l'utilisateur en tant que modérateur à partir du modèle UtilisateurModel
        $this->utilisateurModel->changerModerateur($id);
        // Rediriger vers la page des détails de l'utilisateur
        header('Location: ../../utilisateur/details/' . $id);
    }

    public function getUtilisateurs() {
        // Récupérer tous les utilisateurs à partir du modèle UtilisateurModel
        $utilisateurs = $this->utilisateurModel->getAllUtilisateur();
        // Afficher la vue pour afficher la liste des utilisateurs
        require_once 'Views/utilisateur/index.php';
    }
}
