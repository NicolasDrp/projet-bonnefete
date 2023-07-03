<?php require_once 'Views/head.php'; ?>
<?php require "PHPMailer/PHPMailerAutoload.php"; ?>
<?php
use PDO;
session_start();
require_once 'Models/Database.php';
if(isset($_POST['valider'])){
    if(!empty($_POST['email_utilisateur'])){
        $cle = rand(100000,900000);
        $email = $_POST['email_utilisateur'];
        $insererUtilisateur = $bdd->prepare('INSERT INTO utilisateur(email_utilisateur, cle_utilisateur) VALUES(?,?)');
        $insererUtilisateur->execute(array($email, $cle));

        $recupererUtilisateur = $bdd->prepare('SELECT id_utilisateur, nom_utilisateur, prenom_utilisateur, email_utilisateur FROM utilisateur WHERE email_utilisateur = ?');
        $recupererUtilisateur->execute(array($email));
        if($recupererUtilisateur->rowCount() > 0){
            $utilisateurInfos = $recupererUtilisateur->fetch();
            $_SESSION['id_utilisateur'] = $utilisateurInfos['id_utilisateur'];
            


function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;  
        $mail->Username = 'bentwitter59222@gmail.com';
        $mail->Password = 'ENTER YOUR EMAIL PASSWORD';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From="bentwitter59222@gmail.com";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            $error ="Please try Later, Error Occured while Processing...";
            return $error; 
        }
        else 
        {
            $error = "Thanks You !! Your email is sent.";  
            return $error;
        }
    }
    
    $to   = $email;
    $from = 'bentwitter59222@gmail.com';
    $name = 'BONNEFÊTE';
    $subj = 'Email de confirmation de compte';
    // $msg = 'Mettre lien vers fichier de vérification php';
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg);
    
      
        }else{
            echo 'Veuillez mettre un email valide';
        }
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
                <button class="btn btn-success w-100 btn-lg">
                    S'inscrire
                </button>
            </div>
        </form>
    </div>
    <div class="w-50 d-flex flex-column align-items-end">
        <h2 style="font-size: 4rem;">Creer un compte</h2>
        <img src="../image/sapin-bonmarche.png" alt="logo bonnefete" class="w-75 m-auto">
    </div>
</div>















<?php require_once 'Views/foot.php'; ?>