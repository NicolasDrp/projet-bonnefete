<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=bonnefete;charset=utf8', 'root', 'root');
if(isset($_GET['id_utilisateur']) AND !empty($_GET['id_utilisateur'])){
    $getIdUtilisateur = $_GET['id_utilisateur'];
    $recupererUtilisateur = $bdd->prepare('SELECT id_utilisateur, nom_utilisateur, prenom_utilisateur, email_utilisateur FROM utilisateur WHERE id_utilisateur = ?');
    $recupererUtilisateur->execute(array($getIdUtilisateur));
        if($recupererUtilisateur->rowCount() > 0){
            $utilisateurInfos = $recupererUtilisateur->fetch();
            $utilisateurActif = $utilisateurInfos['utilisateurActif'];
            if($utilisateurActif == 0){
                $utilisateurActif = $bdd->prepare('UPDATE utilisateur SET utilisateurActif = 1 WHERE id_utilisateur = ?');
                                                                            // utilisateurActif n'existe pas encore en BDD 
                $utilisateurActif->execute(array(1, $getIdUtilisateur));
                $_SESSION['id_utilisateur'] = $recupererUtilisateur['id_utilisateur'];
                header('Location: index.php');
                
                echo "Votre compte a bien été activé !";
            } else {
                echo "Votre compte a déjà été activé !";
            }
        } else {
            echo "L'utilisateur n'existe pas !";
        }
}
?>
