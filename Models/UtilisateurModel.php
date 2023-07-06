<?php

namespace App\Models;

require_once 'Models/Utilisateur.php';
require_once 'Database.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Database;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('../projet-bonnefete');
$dotenv->load();

//Load Composer's autoloader
require 'vendor/autoload.php';

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
  public function creerUtilisateur($utilisateur) {
    // Hasher le mot de passe avant de le stocker dans la base de données
    $password = password_hash($utilisateur['password'], PASSWORD_DEFAULT);

    try {
      $query = $this->connection->getPdo()->prepare('INSERT INTO utilisateur (email_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur, bio_utilisateur, est_moderateur, est_super_admin,est_verifie) VALUES (:email, UPPER(:prenom), UPPER(:nom), :passwordUtilisateur, "", 0 ,0, 0)');
      $query->execute([
        'email' => $utilisateur['email'],
        'nom' => $utilisateur['nom'],
        'prenom' => $utilisateur['prenom'],
        'passwordUtilisateur' => $password,
      ]);

      return "Bien Enregistré";
    } catch (\PDOException $e) {
      return $e;
    }
  }

  public function verifierUtilisateur($id) {
    try {
      $query = $this->connection->getPdo()->prepare('UPDATE utilisateur SET est_verifie = 1 WHERE id_utilisateur = :id;');
      $query->execute([
        'id' => $id
      ]);
      return "Votre compte a bien été vérifié , vous pouvez maintenant vous connecter";
    } catch (\PDOException $e) {
      return $e;
    }
  }

  public function envoieMailConfirmation($utilisateurMail) {

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = $_ENV['MAIL'];                     //SMTP username
      $mail->Password   = $_ENV['MAIL_MDP'];                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom($_ENV['MAIL'], 'Bonnefete');
      $mail->addAddress($utilisateurMail->email_utilisateur, $utilisateurMail->nom_utilisateur . ' ' . $utilisateurMail->prenom_utilisateur);     //Add a recipient
      $mail->addReplyTo($_ENV['MAIL'], 'Information');

      //Attachments
      $mail->addAttachment('image\sapin-bonmarche.png', 'Logo.jpg');         //Add attachments

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Confirmation de votre adresse mail';
      $mail->Body    = 'Bonjour ' . $utilisateurMail->nom_utilisateur . ' ' . $utilisateurMail->prenom_utilisateur . ', bienvenue sur Bonefete <br>
    Veuillez <a href="http://localhost/projet-bonnefete/utilisateur/verifier/' . $utilisateurMail->id_utilisateur . '">confirmer</a> votre adresse mail';
      $mail->AltBody = 'Bonjour nom prenom, bienvenue sur Bonefete <br>
    Veuillez confirmer votre adresse mail';

      $mail->send();
      return "Un mail de confirmation a été envoyé";
    } catch (Exception $e) {
      return "Le Mail n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
    }
  }

  public function supprimerUtilisateur($id) {
    $query = $this->connection->getPdo()->prepare('DELETE FROM utilisateur WHERE id_utilisateur = :id');
    $query->execute([
      'id' => $id,
    ]);
  }

  public function changerModerateur($id) {
    $query = $this->connection->getPdo()->prepare('UPDATE utilisateur 
    SET est_moderateur = (
    CASE
    WHEN est_moderateur>0 THEN  0
    ELSE 1
    END)
    WHERE id_utilisateur = :id;');
    $query->execute([
      'id' => $id,
    ]);
  }

  /**
   * Récupère un utilisateur de la base de données en fonction de son email.
   *
   * @param string $email L'email de l'utilisateur.
   * @return object L'objet utilisateur.
   */
  public function getOneByEmail($email) {
    $query = $this->connection->getPdo()->prepare("SELECT id_utilisateur,email_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur, bio_utilisateur, est_moderateur, est_super_admin,est_verifie FROM utilisateur WHERE email_utilisateur = :email");
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
  public function getUtilisateurParId($id_utilisateur) {
    $query = $this->connection->getPdo()->prepare('SELECT id_utilisateur,email_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur, bio_utilisateur, est_moderateur, est_super_admin FROM utilisateur WHERE id_utilisateur = :id');
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
  public function majUtilisateur($utilisateur) {
    // Hasher le mot de passe avant de le stocker dans la base de données
    $password = $utilisateur['password'];
    if (!(substr($utilisateur['password'], 0, 7) == "$2y$10$")) {
      $password = password_hash($utilisateur['password'], PASSWORD_DEFAULT);
    }

    $query = $this->connection->getPdo()->prepare('UPDATE utilisateur SET  email_utilisateur = :email, nom_utilisateur = UPPER(:nom), prenom_utilisateur = UPPER(:prenom), bio_utilisateur = :bio, password_utilisateur = :password WHERE id_utilisateur = :id; ');
    $query->execute([
      'email' => $utilisateur['email'],
      'nom' => $utilisateur['nom'],
      'prenom' => $utilisateur['prenom'],
      'bio' => $utilisateur['bio'],
      'password' => $password,
      'id' => $_SESSION['utilisateur']->id_utilisateur,
    ]);
  }

  public function getAllUtilisateur() {
    $query = $this->connection->getPdo()->prepare("SELECT id_utilisateur,nom_utilisateur,prenom_utilisateur,est_moderateur,est_super_admin FROM utilisateur ORDER BY est_super_admin DESC,est_moderateur DESC");
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_CLASS, "App\Models\Utilisateur");
  }
}
