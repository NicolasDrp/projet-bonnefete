<?php

namespace App\Models;

require_once 'Models/User.php';
require_once 'Database.php';

use App\Database;

class UserModel
{
  private $connection;

  public function __construct()
  {
    $this->connection = new Database();
  }

  /**
   * Crée un nouvel utilisateur dans la base de données.
   *
   * @param array $user Les données de l'utilisateur.
   * @return string Le message de succès ou le message d'erreur.
   */
  public function createUser($user)
  {
    // Hasher le mot de passe avant de le stocker dans la base de données
    $password = password_hash($user['password'], PASSWORD_DEFAULT);

    try {
      $query = $this->connection->getPdo()->prepare('INSERT INTO utilisateur (email_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur, bio_utilisateur) VALUES (:email, :prenom, :nom, :passwordUser, " ")');
      $query->execute([
        'email' => $user['email'],
        'nom' => $user['nom'],
        'prenom' => $user['prenom'],
        'passwordUser' => $password,
      ]);
      
      return "Bien Enregistré";
    } catch (\PDOException $e) {
      return 'Une erreur est survenue !';
    }
  }

  // public function deleteUser($user)
  // {
  //   $query = $this->connection->getPdo()->prepare('DELETE FROM utilisateur WHERE id_utilisateur = :id');
  //   $query->execute([
  //     'id' => $user['id'],
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
    $query = $this->connection->getPdo()->prepare("SELECT id_utilisateur,email_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur, bio_utilisateur FROM utilisateur WHERE email_utilisateur = :email");
    $query->execute([
      'email' => $email,
    ]);
    $user = $query->fetchObject();
    
    return $user;
  }

  /**
   * Récupère un utilisateur de la base de données en fonction de son ID.
   *
   * @param int $id_utilisateur L'ID de l'utilisateur.
   * @return object L'objet utilisateur.
   */
  public function getUserById($id_utilisateur)
  {
    $query = $this->connection->getPdo()->prepare("SELECT id_utilisateur,email_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur, bio_utilisateur FROM utilisateur WHERE id_utilisateur = :id");
    $query->execute([
      'id' => $id_utilisateur,
    ]);
    $query->setFetchMode(\PDO::FETCH_CLASS, 'App\Models\User');
    
    return $query->fetch();
  }

  /**
   * Modifie les informations d'un utilisateur dans la base de données.
   *
   * @param array $user Les données mises à jour de l'utilisateur.
   * @return void
   */
  public function modifyUser($user)
  {
    $query = $this->connection->getPdo()->prepare('UPDATE utilisateur SET email_utilisateur = :email, nom_utilisateur = :nom, prenom_utilisateur = :prenom, bio_utilisateur = :bio WHERE id_utilisateur = :id');
    $query->execute([
      'email' => $user['email'],
      'nom' => $user['nom'],
      'prenom' => $user['prenom'],
      'bio' => $user['bio'],
      'id' => $_SESSION['user']->id_utilisateur,
    ]); 
  }
}