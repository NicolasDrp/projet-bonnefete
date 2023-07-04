<?php require_once 'Views/head.php'; ?>
<?php
// Import des classes de PHPMailer dans l'espace de nom global
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['inscription'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $mail = new PHPMailer(true);
    

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Activer la sortie de débogage détaillée

        $mail->isSMTP();                                            // Envoi via SMTP

        $mail->Host       = 'smtp.gmail.com';                     // Définir le serveur SMTP à utiliser

        $mail->SMTPAuth   = true;                                   // Activer l'authentification SMTP

        $mail->Username   = 'bentwitter59222@gmail.com';                     // Nom d'utilisateur SMTP

        $mail->Password   = 'mdpmail';                               // Mot de passe SMTP, il faut le vrai mdp de la boite mail pour que ça fonctionne 

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Activer le chiffrement SSL/TLS implicite

        $mail->Port       = 465;                                    // Port TCP à utiliser ; utilisez 587 si vous avez défini `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        $mail->setFrom('bentwitter59222@gmail.com', 'bonnefete-teuf.com');

        $mail->addAddress($email, $nom);     // Ajouter un destinataire

        $mail->isHTML(true);                                  // Définir le format de l'email sur HTML

        $codeDeVerification = substr(number_format(time() * rand(), 0, '', ''), 0, 6); // Génère un code aléatoire de 6 chiffres

        $mail->Subject = 'Email de verification';
        $mail->Body = 'Voici votre code de vérification :  <b> ' . $codeDeVerification . ' !</b>';

        $mail->send();

        echo 'Le message a été envoyé';
        // 
        $mdpCrypter = password_hash($password, PASSWORD_DEFAULT);

        $bdd = mysqli_connect('localhost:8889', 'root', 'root', 'bonnefete');

        $sql = "INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, email_utilisateur, password_utilisateur, code_de_verification) VALUES ('$nom', '$prenom', '$email', '$mdpCrypter', '$codeDeVerification')";

        mysqli_query($bdd, $sql);

        header('Location: emailVerification.php?email=' . $email);

        exit();
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur de l'expéditeur : {$mail->ErrorInfo}";
    }
}
?>

<div class="d-flex flex-row w-75 align-items-center justify-content-center m-auto">
    <div class="w-50 bg-white p-5 d-flex flex-column align-items-center justify-content-center" style="height: 75vh;">
        <form action="../utilisateur/enregistrer" method="post" style="width: 95%;">

            <div class="mb-4">
                <label for="nom" class="form-label">Nom<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nom" id="nom" required>
            </div>

            <div class="mb-4">
                <label for="prenom" class="form-label">Prénom<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="prenom" required>
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">E-mail<span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Mot de passe<span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="mb-5 w-50 m-auto">
                <input type="submit" name="inscription" value="S'inscrire" class="btn btn-success w-100 btn-lg">


            </div>
        </form>
    </div>
    <div class="w-50 d-flex flex-column align-items-end">
        <h2 style="font-size: 4rem;">Creer un compte</h2>
        <img src="../image/sapin-bonmarche.png" alt="logo bonnefete" class="w-75 m-auto">
    </div>
</div>



<?php require_once 'Views/foot.php'; ?>