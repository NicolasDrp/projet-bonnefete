<?php

namespace App\Models;

require_once 'Database.php';
use App\Database;

class UserModel
{
  private $connection;

  public function __construct()
  {
    $this->connection = new Database();
  }

  public function createUser($user)
  {

    $password = password_hash($user['password'], PASSWORD_DEFAULT);
    try {
      $query = $this->connection->getPdo()->prepare('INSERT INTO utilisateur (email_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur,bio_utilisateur,is_moderateur) VALUES (:email, :prenom, :nom,"", :passwordUser,0)');
      $query->execute([
        'email' => $user['email'],
        'nom' => $user['nom'],
        'prenom' => $user['prenom'],
        'passwordUser' => $password,
      ]);
      return " Bien Enregistré ";
    } catch (\PDOException $e) {
      return 'Une erreur est survenue !';
    }
  }

  public function getOneByEmail($email)
  {
    $query = $this->connection->getPdo()->prepare("SELECT id_utilisateur,email_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur,bio_utilisateur,is_moderateur FROM utilisateur WHERE email_utilisateur = :email");
    $query->execute([
      'email' => $email,
    ]);
    $user = $query->fetchObject();
    return $user;
  }
}
