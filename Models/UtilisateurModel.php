<?php

namespace App\Models;

require_once 'Models/Utilisateur.php';
require_once 'Database.php';

use App\Database;

class UtilisateurModel {
  private $connection;

  public function __construct() {
    $this->connection = new Database();
  }

  /**
   * Crée un nouvel utilisateur dans la base de données.
   *
   * @param array $utilisateur Les données de l'utilisateur.
   * @return string Le message de succès ou le message d'erreur.
   */
  public function creerUtilisateur($utilisateur)
  {
    // Hasher le mot de passe avant de le stocker dans la base de données
    $password = password_hash($utilisateur['password'], PASSWORD_DEFAULT);

    try {
      $query = $this->connection->getPdo()->prepare('INSERT INTO utilisateur (email_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur, bio_utilisateur, est_moderateur) VALUES (:email, :prenom, :nom, :passwordUtilisateur, "", 0)');
      $query->execute([
        'email' => $utilisateur['email'],
        'nom' => $utilisateur['nom'],
        'prenom' => $utilisateur['prenom'],
        'passwordUtilisateur' => $password,
      ]);

      return "Bien Enregistré";
    } catch (\PDOException $e) {
      return 'Une erreur est survenue !';
    }
  }

  // public function supprimerUtilisateur($utilisateur)
  // {
  //   $query = $this->connection->getPdo()->prepare('DELETE FROM utilisateur WHERE id_utilisateur = :id');
  //   $query->execute([
  //     'id' => $utilisateur['id'],
  //   ]);
  // }


  /**
   * Récupère un utilisateur de la base de données en fonction de son email.
   *
   * @param string $email L'email de l'utilisateur.
   * @return object L'objet utilisateur.
   */
  public function getOneByEmail($email)
  {
    $query = $this->connection->getPdo()->prepare("SELECT id_utilisateur,email_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur, bio_utilisateur, est_moderateur FROM utilisateur WHERE email_utilisateur = :email");
    $query->execute([
      'email' => $email,
    ]);
    $utilisateur = $query->fetchObject();

    return $utilisateur;
  }

  /**
   * Récupère un utilisateur de la base de données en fonction de son ID.
   *
   * @param int $id_utilisateur L'ID de l'utilisateur.
   * @return object L'objet utilisateur.
   */
  public function getUtilisateurById($id_utilisateur)
  {
    $query = $this->connection->getPdo()->prepare('SELECT id_utilisateur,email_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur, bio_utilisateur, est_moderateur FROM utilisateur WHERE id_utilisateur = :id');
    $query->execute([
      'id' => $id_utilisateur,
    ]);
    $query->setFetchMode(\PDO::FETCH_CLASS, 'App\Models\Utilisateur');

    return $query->fetch();
  }

  /**
   * Modifie les informations d'un utilisateur dans la base de données.
   *
   * @param array $utilisateur Les données mises à jour de l'utilisateur.
   * @return void
   */
  public function majUtilisateur($utilisateur)
  {
    $query = $this->connection->getPdo()->prepare('UPDATE utilisateur SET  email_utilisateur = :email, nom_utilisateur = :nom, prenom_utilisateur = :prenom, bio_utilisateur = :bio WHERE id_utilisateur = :id ');
    $query->execute([
      'email' => $utilisateur['email'],
      'nom' => $utilisateur['nom'],
      'prenom' => $utilisateur['prenom'],
      'bio' => $utilisateur['bio'],
      'id' => $_SESSION['utilisateur']->id_utilisateur,
    ]);
  }

  public function getAllUtilisateur()
  {
    $query = $this->connection->getPdo()->prepare("SELECT id_utilisateur,nom_utilisateur,prenom_utilisateur,bio_utilisateur FROM utlisateur");
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_CLASS, "App\Models\Utilisateur");
  }
}
