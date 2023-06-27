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

    $password = password_hash($user['password_utilisateur'], PASSWORD_DEFAULT);
    try {
      $query = $this->connection->getPdo()->prepare('INSERT INTO utilisateur (email_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur) VALUES (:email, :name, :lastName, :password)');
      $query->execute([
        'email_utilisateur' => $user['email'],
        'nom_utilisateur' => $user['lastName'],
        'prenom_utilisateur' => $user['name'],
        'password_utilisateur' => $password,
      ]);
      return " Bien Enregistré ";
    } catch (\PDOException $e) {
      return " une erreur est survenue";
    }
  }

  public function getOneByEmail($email)
  {
    $query = $this->connection->getPdo()->prepare("SELECT email_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur FROM utilisateur WHERE email_utilisateur = :email");
    $query->execute([
      'email' => $email,
    ]);
    $user = $query->fetchObject();
    return $user;
  }
}
