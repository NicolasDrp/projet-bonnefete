<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


require 'vendor/autoload.php';

// Création d'une instance ; passer `true` active les exceptions
$mail = new PHPMailer(true);

try {
    // Paramètres du serveur
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Activer la sortie de débogage détaillée
    $mail->isSMTP();                                            // Envoi via SMTP
    $mail->Host       = 'bentwitter59222@gmail.com';                     // Définir le serveur SMTP à utiliser
    $mail->SMTPAuth   = true;                                   // Activer l'authentification SMTP
    $mail->Username   = 'bonnefete@lafete.fr';                     // Nom d'utilisateur SMTP
    $mail->Password   = '??????';                               // Mot de passe SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Activer le chiffrement SSL/TLS implicite
    $mail->Port       = 465;                                    // Port TCP à utiliser ; utilisez 587 si vous avez défini `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Destinataires
    $mail->setFrom('cardosobenjamin01@gmail.com', 'Bonnefete');
    $mail->addAddress('joe@example.net', 'Joe User');     // Ajouter un destinataire
    $mail->addAddress('ellen@example.com');               // Le nom est facultatif
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Pièces jointes
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Ajouter des pièces jointes
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Nom facultatif

    // Contenu
    $mail->isHTML(true);                                  // Définir le format de l'email sur HTML
    $mail->Subject = 'Email de verification';
    $mail->Body    = 'Voici votre code de vérification :  <b> 5922222 !</b>';
    $mail->AltBody = 'Merci d\'avoir choisi bonnefête !';

    $mail->send();
    echo 'Le message a été envoyé';
} catch (Exception $e) {
    echo "Le message n'a pas pu être envoyé. Erreur du Mailer : {$mail->ErrorInfo}";
}
